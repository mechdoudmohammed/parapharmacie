<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
use Illuminate\Support\Str;

class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseur=Fournisseur::orderBy('id','DESC')->paginate();
        return view('backend.fournisseur.index')->with('fournisseurs',$fournisseur);
    }
    public function create()
    {
        return view('backend.fournisseur.create');
    }
    public function show()
    {
        return view('backend.fournisseur.create');
    }
    public function edit($id){
        $fournisseur=Fournisseur::find($id);
        if(!$fournisseur){
            request()->session()->flash('error','fournisseur introuvable');
        }
        return view('backend.fournisseur.edit')->with('fournisseur',$fournisseur);
    }
    public function update(Request $request, $id)
    {
        $fournisseur=Fournisseur::find($id);
        $this->validate($request,[
             'nom'=>'string|required|max:30',
              'adresse'=>'string|required|max:55',
            'telephone'=>'string|required',
            'email'=>'string|required|max:55',
 
        ]);
        $data=$request->all();
      
        //return $data;
       //return $data;
        $status=$fournisseur->fill($data)->save();
      
        if($status){
            request()->session()->flash('Succès','fournisseur modifié avec Succès');
        }
        else{
            request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('fournisseur.index');
    }

    public function store(Request $request)

    {
        $this->validate($request,
        [
            'nom'=>'required|string|max:30',
            'adresse'=>'required|string|max:100',
            'telephone'=>'required|string|max:30',
            'email'=>'required|string|max:50',
        ]);

        // dd($request->all());
        $data=$request->all();
        //return $data;
        // dd($data);
        $status=Fournisseur::create($data);
        // dd($status);
        if($status){
            request()->session()->flash('Succès','Fourniseur ajouté avec succès');
        }
        else{
            request()->session()->flash('erreur','Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('fournisseur.create');

    }

    public function destroy($id)
    {
        $fournisseur=Fournisseur::find($id);
        if($fournisseur){
            $status=$fournisseur->delete();
            if($status){
                request()->session()->flash('Succès','Fournisseur supprimé avec Succès');
            }
            else{
                request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
            }
            return redirect()->route('fournisseur.index');
        }
        else{
            request()->session()->flash('erreur','Fournisseur introuvable');
            return redirect()->back();
        }
    }
    
}
