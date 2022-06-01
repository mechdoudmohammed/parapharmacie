<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detailcommandes;
use App\Models\Produit;
use Illuminate\Support\Str;

class DetailcommandesController extends Controller
{
    public function edit($id){
        $detailcommandes=Detailcommandes::find($id);
        if(!$detailcommandes){
            request()->session()->flash('error','Produit introuvable');
        }
        return view('backend.detailcommandes.edit')->with('detailcommandes',$detailcommandes);
    }
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'quantite'=>'required|integer|min:1',
           ]);

        $detailcommandes=Detailcommandes::find($id);
        $donn=$detailcommandes;
        //stock quantite
        $produit=Produit::find($request->produit);
        $don=$produit;
        
        if(!$produit){
            request()->session()->flash('erreur', 'produit introvable');
            return redirect()->back();
        }

     
     
        //fin de stock quantite
        if($request->remise>100){
            request()->session()->flash('erreur', 'Remise est incorrecte');
            return redirect()->back();
        }
 
        if($request->produit!=$detailcommandes->produit){
            $don['quantite']=$don['quantite']+$request->quantite;
            $produit->fill((array)$don)->save();
        }
        if(($request->quantite-$detailcommandes->quantite)>$produit->quantite){
            request()->session()->flash('erreur', 'Quantité non disponible');
            return redirect()->back();
        }else{
            $donn=$request->all();
    

            $don['quantite']=$don['quantite']+($detailcommandes->quantite-$request->quantite);


            $detailcommandes->fill((array)$donn)->save();


            $produit->fill((array)$don)->save();

            request()->session()->flash('Succès','Produit modifié avec Succès');
            return redirect()->route('commande.show',$detailcommandes->commande);
        }


       

        $data=$request->all();

        $status=$detailcommandes->fill($data)->save();
      
        if($status){
            request()->session()->flash('Succès','Produit modifié avec Succès');
        }
        else{
            request()->session()->flash('Erreur', 'veuillez réessayer ultérieurement');
        }
        return redirect()->back();
    }


    public function destroy($id)
    {
        $detailcommandes=Detailcommandes::find($id);
        

        $produit=Produit::find($detailcommandes->produit);
        $data=$produit;


        $data['quantite']=$data['quantite']+$detailcommandes->quantite;
       
        $status=$produit->fill((array)$data)->save();
  


       // return $detailcommandes;
        if($detailcommandes){

            $status=$detailcommandes->delete();
            if($status){
                request()->session()->flash('Succès','produit supprimé avec Succès');
            }
            else{
                request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
            }
            return redirect()->back();
        }
        else{
            request()->session()->flash('erreur','commande introuvable');
            return redirect()->back();
        }
    }
}
