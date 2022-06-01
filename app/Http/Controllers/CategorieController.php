<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Str;

class CategorieController extends Controller
{
    public function index()
    {
        $categorie=Categorie::orderBy('id','DESC')->paginate();
        return view('backend.categorie.index')->with('categories',$categorie);
    }
    public function create()
    {
        return view('backend.categorie.create');
    }
    public function show()
    {
        return view('backend.categorie.create');
    }
    public function edit($id){
        $categorie=Categorie::find($id);
        if(!$categorie){
            request()->session()->flash('error','categorie introuvable');
        }
        return view('backend.categorie.edit')->with('categorie',$categorie);
    }
    public function update(Request $request, $id)
    {
        $categorie=Categorie::find($id);
        $this->validate($request,[
             'libelle'=>'string|required|max:30',
  
        ]);
        $data=$request->all();
      
        //return $data;
       //return $data;
        $status=$categorie->fill($data)->save();
      
        if($status){
            request()->session()->flash('Succès','categorie modifié avec Succès');
        }
        else{
            request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('categorie.index');
    }

    public function store(Request $request)

    {
        $this->validate($request,
        [
            'libelle'=>'string|required|max:30',

            
        ]);

        $data=$request->all();

        $status=Categorie::create($data);
 
        if($status){
            request()->session()->flash('Succès','Categorie ajouté avec succès');
        }
        else{
            request()->session()->flash('erreur','Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('categorie.create');

    }

    public function destroy($id)
    {
        $categorie=Categorie::find($id);
        if($categorie){
            $status=$categorie->delete();
            if($status){
                request()->session()->flash('Succès','Categorie supprimé avec Succès');
            }
            else{
                request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
            }
            return redirect()->route('categorie.index');
        }
        else{
            request()->session()->flash('erreur','Categorie introuvable');
            return redirect()->back();
        }
    }
    
}
