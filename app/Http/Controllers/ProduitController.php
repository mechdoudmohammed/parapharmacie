<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Detailcommandes;
use Illuminate\Support\Str;
use DB;
class ProduitController extends Controller
{
    public function index()
    {
        $produit=Produit::orderBy('id','DESC')->paginate();
        return view('backend.produit.index')->with('produits',$produit);
    }
    public function accepter()
    {
        $produit=Produit::orderBy('id','DESC')->where('statut',0)->paginate();
        return view('backend.produit.accepter')->with('produits',$produit);
    }
    public function modifier($id)
    {

        $produit=Produit::find($id);
        $produit->statut=1;
        $data=(array)$produit;
     

        $status=$produit->fill($data)->save();
      
        if($status){
            request()->session()->flash('Succès','produit modifié avec Succès');
        }
        else{
            request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('produit.accepter');
    }

    public function show()
    {
        $produit=Produit::orderBy('id','DESC')->paginate();
        return view('backend.produit.imprimer')->with('produits',$produit);
    }




    public function detail()
    {

        return view('backend.produit.detail');
    }

    function action(Request $request)
    {
      
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('produits')
         ->where('code_barre',$query)
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       
       foreach($data as $row)
       {
    
        $commandes = DB::table('detailcommandes')
        ->where('produit',$row->id)
        ->sum('quantite');
        $fournisseur = DB::table('fournisseurs')
        ->where('id',$row->fournisseur)
        ->value('nom')
        ;
        $output .= '
        <tr><td>produit N:</td><td>'.$row->id.'</td></tr>
         <tr><td style="width: 20% !important;">Nom:</td><td>'.$row->nom.'</td></tr>
         <tr><td style="width: 20% !important;">marque:</td><td>'.$row->marque.'</td></tr>
         <tr><td style="width: 20% !important;">description:</td><td>'.$row->description.'</td></tr>
         <tr><td style="width: 20% !important;">prix_achat:</td><td>'.$row->prix_achat.'</td></tr>
         <tr><td style="width: 20% !important;">quantite:</td><td>'.$row->quantite.'</td></tr>
         <tr><td style="width: 20% !important;">image:</td><td><img style="max-width: 40%;"src="../../images/produits/'.$row->image.'"</td></tr>
         <tr><td style="width: 20% !important;">fournisseur:</td><td>'.$fournisseur.'</td></tr>
         <tr><td style="width: 20% !important;">Sorti de stock:</td><td>'.$commandes.'  unité</td></tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">Rien a afficher</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }



    public function edit($id){
        $produit=Produit::find($id);
        if(!$produit){
            request()->session()->flash('error','Produit introuvable');
        }
        return view('backend.produit.edit')->with('produit',$produit);
    }
    public function update(Request $request, $id)
    {
     
        $produit=Produit::find($id);
        $this->validate($request,[
            'nom'=>'required|string|max:30',
            'marque'=>'required|string|max:30',
            'description'=>'required|string|max:2555',
            'prix_achat'=>'required|numeric',
            'quantite'=>'required|integer',
            'code_barre'=>'required|string|max:55',
            'fournisseur'=>'required|integer|max:55',
            'categorie'=>'required|integer|max:55',
            

        ]);
     
        $data=$request->all();
        if ($request->image == null){
            
            $request['image'] = $produit->image;
        
         
        }
        elseif($request->image != null){
            //enregister la photo
            $data=$request->all();
            $file_extension_img=$request->image->getClientOriginalExtension();
            if($file_extension_img!="png" && $file_extension_img!="jpg" && $file_extension_img!="jpeg"  && $file_extension_img!="Jpeg"   && $file_extension_img!="PNG"  && $file_extension_img!="JPEG"  && $file_extension_img!="JPG" ){
              request()->session()->flash('erreur','Erreur, le fichier doit etre une image');
              return redirect()->route('produit.edit',$id);
                 }
                 $file_name = time().".".$file_extension_img;
                 $path='images/produits';
                 $request->image -> move($path,$file_name);
                $data['image']=$file_name;
              
            }
            $request['statut'] = 1;
       // return $data;

       //return $data;
        $status=$produit->fill($data)->save();
      
        if($status){
            request()->session()->flash('Succès','produit modifié avec Succès');
        }
        else{
            request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('produit.index');
    }


    public function create()
    {
        return view('backend.produit.create');
    }


    public function store(Request $request)
    {
  
        $this->validate($request,
        [
            'nom'=>'required|string|max:30',
            'marque'=>'required|string|max:30',
            'description'=>'required|string|max:2555',
            'prix_achat'=>'required',
            'prix_vente'=>'required',
            'quantite'=>'required|integer',
            'code_barre'=>'required|string',
            'fournisseur'=>'required',
            'categorie'=>'required',
           
          
        ]);
    //enregister la photo
    $data=$request->all();
   


    $file_extension_img=$request -> image -> getClientOriginalExtension();
    if($file_extension_img!="png" && $file_extension_img!="jpg" && $file_extension_img!="jpeg" && $file_extension_img!="PNG" && $file_extension_img!="JPG"&& $file_extension_img!="JPEG" ){
        request()->session()->flash('erreur','Erreur, le fichier doit etre une image');
        return redirect()->route('produit.create');
    }     
            $file_name = time().".".$file_extension_img;
            $path='images/produits';
            $request->image -> move($path,$file_name);
            $data=$request->all();
            $data['image']=$file_name;
        //return $data;
        $data['employe']=auth()->user()->id;
        //return $data;
        $status=Produit::create($data);  

        if($status){
            request()->session()->flash('Succès','Produit ajouté avec succès');
        }
        else{
            request()->session()->flash('erreur','Erreur, veuillez réessayer ultérieurement');
        }
        return redirect()->route('produit.create');

    }
    public function destroy($id)
    {
        $produit=Produit::find($id);
        if($produit){
            $status=$produit->delete();
            if($status){
                request()->session()->flash('Succès','produit supprimé avec Succès');
            }
            else{
                request()->session()->flash('Erreur, veuillez réessayer ultérieurement');
            }
            return redirect()->route('produit.index');
        }
        else{
            request()->session()->flash('erreur','produit introuvable');
            return redirect()->back();
        }
    }
}
