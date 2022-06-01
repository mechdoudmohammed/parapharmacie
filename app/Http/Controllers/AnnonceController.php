<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Str;

class AnnonceController extends Controller
{
    public function index()
    {
        $annonce=Annonce::orderBy('id','DESC')->paginate();
        return view('frontend.annonce.index')->with('annonces',$annonce);
    }
    public function create()
    {
        return view('frontend.annonce.create');
    }
    public function show()
    {
        return view('frontend.annonce.create');
    }
    public function edit($id){
        $annonce=Annonce::find($id);
        if(!$annonce){
            request()->session()->flash('error','annonce introuvable');
        }
        return view('frontend.annonce.edit')->with('annonce',$annonce);
    }
    public function update(Request $request, $id)
    {
        $annonce=Annonce::find($id);
        $this->validate($request,[
             'titre'=>'string|required|max:30',
              'description'=>'string|required|max:755',
            'date'=>'string|required',
           
        ]);
        $data=$request->all();
        if ($request->image == null){       
            $request['image'] = $annonce->image;
        }
        elseif($request->image != null){
            //enregister la photo
            $data=$request->all();
            $file_extension_img=$request->image->getClientOriginalExtension();
            if($file_extension_img!="png" && $file_extension_img!="jpg" && $file_extension_img!="jpeg" ){
              request()->session()->flash('erreur','Erreur, le fichier doit etre une image');
              return redirect()->route('annonce.edit',$id);
                 }
                 $file_name = time().".".$file_extension_img;
                 $path='images/annonces';
                 $request->image -> move($path,$file_name);
                 $data['image']=$file_name;

        }

        $status=$annonce->fill($data)->save();
      
        if($status){
            request()->session()->flash('Succès','annonce modifié avec Succès');
        }
        else{
            request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('annonce.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'titre'=>'string|required|max:30',
             'description'=>'string|required|max:755',
           'date'=>'string|required',
          
       ]);
        //enregister la photo
        $file_extension_img=$request -> image -> getClientOriginalExtension();

        if($file_extension_img!="png" && $file_extension_img!="jpg" && $file_extension_img!="jpeg" ){
            request()->session()->flash('erreur','Erreur, le fichier doit etre une image');
            return redirect()->route('annonce.create');
        }     

        $file_name = time().".".$file_extension_img;
        $path='images/annonces';
        $request->image -> move($path,$file_name);

        // dd($request->all());
        $data=$request->all();
        $data['image']=$file_name;
        //return $data;
        // dd($data);
        $status=Annonce::create($data);
        // dd($status);
        if($status){
            request()->session()->flash('Succès','Fourniseur ajouté avec succès');
        }
        else{
            request()->session()->flash('erreur','Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('annonce.create');

    }

    public function destroy($id)
    {
        $annonce=Annonce::find($id);
        if($annonce){
            $status=$annonce->delete();
            if($status){
                request()->session()->flash('Succès','Annonce supprimé avec Succès');
            }
            else{
                request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
            }
            return redirect()->route('annonce.index');
        }
        else{
            request()->session()->flash('erreur','Annonce introuvable');
            return redirect()->back();
        }
    }
    
}
