<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parametres;
use Illuminate\Support\Str;

class ParametresController extends Controller
{
    public function modifier(){
        $parametres=Parametres::first();
        if(!$parametres){
            request()->session()->flash('error','parametres introuvable');
        }
        return view('backend.parametres.modifier')->with('parametres',$parametres);
    }
    public function mode(Request $request)
    {
     
        $parametres=Parametres::first();

      
        $data=$request->all();
      
  
       //return $data;
        $status=$parametres->fill($data)->save();
      
        if($status){
            request()->session()->flash('Succès','parametres modifié avec Succès');
        }
        else{
            request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('parametres.modifier');
    }

    public function index()
    {

    }
    public function update(Request $request, $id)
    {
    
    }

    public function store(Request $request)

    {
   

    }

    public function destroy($id)
    {
    
    }



    
}
