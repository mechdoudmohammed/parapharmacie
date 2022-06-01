<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Detailcommandes;
use PDF;
use Illuminate\Support\Str;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
class CommandeController extends Controller
{

    public function index()
    {
      
        $commande=Commande::orderBy('id','DESC')->paginate();
        return view('backend.commande.index')->with('commandes',$commande);
    }

    public function pdf(Request $request,$id)
    {
        // test affichage
        /*
        $detail_commande=Detailcommandes::where('commande',$id)->get();
        $commande=Commande::find($id);
        return view('backend.commande.pdf')->with('commande',$commande);
        */


        $detail_commande=Detailcommandes::where('commande',$id)->get();



        $commande=Commande::find($id);


        $file_name=$commande->id.'-'.$commande->client.'.pdf';

        $pdf=PDF::loadview('backend.commande.pdf',compact('commande'));
        return $pdf->download($file_name);

    }

    public function create()
    {
       
        return view('backend.commande.create');
    }
    public function modifier(Request $request)
    { 
        $this->validate($request,[
            'paye'=>'numeric',
            'credite'=>'numeric',

        ]);
        $commande=Commande::find($request->id);
        if($request->paye > $commande->totale){
            request()->session()->flash('erreur','Le montant saisi est superieur que le montant totale');
            return redirect()->route('commande.index');
        }
        if($request->credit > $commande->totale){
            request()->session()->flash('erreur','Le credit saisi est superieur que le montant totale');
            return redirect()->route('commande.index');
        } if($request->paye == $commande->totale && $request->credit < $commande->totale ){
            $data=$request->all();
            $data['credit']=$request->credit;
            $data['paye']=$data['paye']-$request->credit;
            $commande->fill($data)->save();
            request()->session()->flash('Succès','Crédit modifié avec Succès');
            return redirect()->route('commande.index');
        } if($request->paye == 0 && $request->credit < $commande->totale){
            $data=$request->all();
                    $data['credit']=$request->credit;
                    $data['paye']=0;
                    $commande->fill($data)->save();
                    request()->session()->flash('Succès','Crédit modifié avec Succès');
                    return redirect()->route('commande.index');
        }
            elseif($request->paye < $commande->totale){
                if($request->credit==$commande->credit){
                    $data=$request->all();
                    $data['credit']=$data['credit']+($commande->paye-$request->paye);
                    $data['paye']=$request->paye;
                    $commande->fill($data)->save();
                    request()->session()->flash('Succès','Crédit modifié avec Succès');
                    return redirect()->route('commande.index');
                }elseif($request->paye==$commande->paye){
                    $data=$request->all();
                    $data['paye']=$data['paye']-($request->credit-$commande->credit);
                    $data['credit']=$request->credit;
                    $commande->fill($data)->save();
                    request()->session()->flash('Succès','Crédit modifié avec Succès');
                    return redirect()->route('commande.index');
                }

                elseif($request->credit>($commande->credit+($commande->paye-$request->paye))){
                    request()->session()->flash('erreur','Les données saisir incorrecte');
                return redirect()->route('commande.index');
        
                }elseif($request->credit<($commande->credit+($commande->paye-$request->paye))){
                    request()->session()->flash('erreur','Les données saisir incorrecte');
                    return redirect()->route('commande.index');

                }elseif($request->credit==($commande->credit+($commande->paye-$request->paye))){
                    $data=$request->all();
                    $commande->fill($data)->save();
                    request()->session()->flash('Succès','Crédit modifié avec Succès');
                    return redirect()->route('commande.index');
                }
              
            

     
        }

        if($request->credit>$commande->credit){
            $data=$request->all();
            $data['paye']=$data['paye']+($request->credit-$commande->credit);
            $data['credit']=$request->credit;
            $commande->fill($data)->save();
            request()->session()->flash('Succès','Crédit modifié avec Succès');

        }elseif($request->credit<$commande->credit){
            
            $data=$request->all();
            $data['paye']=$data['paye']-($commande->credit-$request->credit);
            $data['credit']=$request->credit;
            $commande->fill($data)->save();
            request()->session()->flash('Succès','Crédit modifié avec Succès');
       
        }
   
        return redirect()->route('commande.index');
    }

    public function show($id)
    {
        $commande=Commande::find($id);
        return view('backend.commande.show')->with('commande',$commande);
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
        $status=Commande::create($data);
        // dd($status);
        if($status){
            request()->session()->flash('Succès','Commande ajouté avec succès');
        }
        else{
            request()->session()->flash('erreur','Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('commande.create');

    }

    public function destroy($id)
    {
        $commande=Commande::find($id);
        if($commande){
            $status=$commande->delete();
            if($status){
                request()->session()->flash('Succès','commande supprimé avec Succès');
            }
            else{
                request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
            }
            return redirect()->route('commande.index');
        }
        else{
            request()->session()->flash('erreur','commande introuvable');
            return redirect()->back();
        }
    }

}
