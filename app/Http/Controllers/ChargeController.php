<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charge;
use Illuminate\Support\Str;

class ChargeController extends Controller
{
    public function index()
    {
        $charge=Charge::orderBy('id','DESC')->paginate();
        return view('backend.charge.index')->with('charges',$charge);
    }
    public function create()
    {
        return view('backend.charge.create');
    }


    public function edit($id){
        $charge=Charge::find($id);
        if(!$charge){
            request()->session()->flash('error','Charge introuvable');
        }
        return view('backend.charge.edit')->with('charge',$charge);
    }
    public function update(Request $request, $id)
    {
        $charge=Charge::find($id);
        $this->validate($request,
        [
            'montant'=>'required|numeric',
        ]);
        $data=$request->all();
        if ($request->doccument == null){
            
            $request['doccument'] = $charge->doccument;
         
        }
        elseif($request->image != null){
        //enregister le documment
        $file_extension_img=$request -> doccument -> getClientOriginalExtension();
        if($file_extension_img!="png" && $file_extension_img!="jpg" && $file_extension_img!="jpeg" && $file_extension_img!="pdf" && $file_extension_img!="xlsx" ){
            request()->session()->flash('erreur','Erreur, le fichier doit etre une image ou un pdf ou en excel ');
            return redirect()->route('charge.create');
        }     
        $file_name = time().".".$file_extension_img;
        $path='images/doccument';
        $request->doccument -> move($path,$file_name);
              $data=$request->all();
              $data['doccument']=$file_name;


      }
             
      if($request->titre=="Autre"){
          $data['titre']=$data['titre2'];
      
      }
      

       
      
        //return $data;
       //return $data;
        $status=$charge->fill($data)->save();
      
        if($status){
            request()->session()->flash('Succès','charge modifié avec Succès');
        }
        else{
            request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('charge.index');
    }


 

    public function store(Request $request)
    {
        $this->validate($request,
        [
            'montant'=>'required|numeric',
        ]);

        //enregister le documment
  $file_extension_img=$request -> doccument -> getClientOriginalExtension();
  if($file_extension_img!="png" && $file_extension_img!="jpg" && $file_extension_img!="jpeg" && $file_extension_img!="pdf" && $file_extension_img!="xlsx" ){
      request()->session()->flash('erreur','Erreur, le fichier doit etre une image ou un pdf ');
      return redirect()->route('charge.create');
  }     
  $file_name = time().".".$file_extension_img;
  $path='images/doccument';
  $request->doccument -> move($path,$file_name);
        $data=$request->all();
        $data['doccument']=$file_name;

       
if($request->titre=="Autre"){
    $data['titre']=$data['titre2'];

}

        //return $data;
        $status=Charge::create($data);  

        if($status){
            request()->session()->flash('Succès','Charge ajouté avec succès');
        }
        else{
            request()->session()->flash('erreur','Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('charge.create');

    }
    public function destroy($id)
    {
        $charge=Charge::find($id);
        if($charge){
            $status=$charge->delete();
            if($status){
                request()->session()->flash('Succès','charge supprimé avec Succès');
            }
            else{
                request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
            }
            return redirect()->route('charge.index');
        }
        else{
            request()->session()->flash('erreur','charge introuvable');
            return redirect()->back();
        }
    }
}
