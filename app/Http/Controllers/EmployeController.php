<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use Illuminate\Support\Str;

class EmployeController extends Controller
{
    public function index()
    {
        $employe=Employe::orderBy('id','DESC')->paginate();
        return view('backend.employe.index')->with('employes',$employe);
    }


    public function edit($id){
        $employe=Employe::find($id);
        if(!$employe){
            request()->session()->flash('error','Employe introuvable');
        }
        return view('backend.employe.edit')->with('employe',$employe);
    }
    public function update(Request $request, $id)
    {

        $employe=Employe::find($id);

        $this->validate($request,[
             'nom'=>'string|required|max:30',
            'prenom'=>'string|required|max:30',
            'cin'=>'string|required|max:10',
            'adresse'=>'string|required|max:55',
            'telephone'=>'string|required',
            'email'=>'string|required|max:55',
            'description'=>'string|required|max:255',
            'salaire'=>'required',
            'login'=>'string|required',
            'mot_passe'=>'string|required|min:6',
        ]);
        $data=$request->all();
        if ($request->image == null){

            $request['image'] = $employe->image;

        }
        elseif($request->image != null){
            //enregister la photo
            $data=$request->all();
            $file_extension_img=$request->image->getClientOriginalExtension();
            if($file_extension_img!="png" && $file_extension_img!="jpg" && $file_extension_img!="jpeg" ){
              request()->session()->flash('erreur','Erreur, le fichier doit etre une image');
              return redirect()->route('employe.edit',$id);
                 }
                 $file_name = time().".".$file_extension_img;
                 $path='images/employes';
                 $request->image -> move($path,$file_name);
                 $data['image']=$file_name;
        }
     md5($data['mot_passe']);

        $status=$employe->fill($data)->save();

        if($status){
            request()->session()->flash('Succès','employe modifié avec Succès');
        }
        else{
            request()->session()->flash('Erreur','veuillez réessayer ultérieurement');
        }
        return redirect()->route('employe.index');
    }


    public function create()
    {
        return view('backend.employe.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,
        [
            'nom'=>'string|required|max:30',
            'prenom'=>'string|required|max:30',
            'cin'=>'string|required|max:10',
            'adresse'=>'string|required|max:55',
            'telephone'=>'string|required',
            'email'=>'string|required|max:55',
            'description'=>'string|required|max:255',
            'salaire'=>'integer|required',
            'login'=>'string|required',
            'mot_passe'=>'string|required|min:6',

        ]);
//enregister la photo
$file_extension_img=$request -> image -> getClientOriginalExtension();
if($file_extension_img!="png" && $file_extension_img!="jpg" && $file_extension_img!="jpeg" ){
    request()->session()->flash('erreur','Erreur, le fichier doit etre une image');
    return redirect()->route('employe.create');
}
$file_name = time().".".$file_extension_img;
$path='images/employes';
$request->image -> move($path,$file_name);
      $data=$request->all();
      $data['image']=$file_name;

        //return $data;
        // dd($data);
        $data['mot_passe']=md5($data['mot_passe']);

       $status=Employe::create($data);
        // dd($status);
        if($status){
            request()->session()->flash('Succès','utilisateur ajouté avec succès');
        }
        else{
            request()->session()->flash('erreur','Erreur', 'veuillez réessayer ultérieurement');
        }
        return redirect()->route('employe.create');

    }
    public function destroy($id)
    {
        $employe=Employe::find($id);
        if($employe){
            $status=$employe->delete();
            if($status){
                request()->session()->flash('Succès','employe supprimé avec Succès');
            }
            else{
                request()->session()->flash('Erreur', 'veuillez réessayer ultérieurement');
            }
            return redirect()->route('employe.index');
        }
        else{
            request()->session()->flash('erreur','employe introuvable');
            return redirect()->back();
        }
    }
}
