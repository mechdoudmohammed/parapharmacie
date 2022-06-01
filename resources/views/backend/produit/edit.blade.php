@extends('backend.adminpanel')
@section('content')
<div class="card">
    <h5 class="card-header">Modifier Employe</h5>
    <div class="card-body">
              <h1 class="text-center">Modifier produit</h1>
              <form  action="{{route('produit.update',$produit->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @php
                $fournisseurs = DB::table('fournisseurs')->get();
                $categories = DB::table('categories')->get();
                $employes = DB::table('employes')->get();
                @endphp
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  
                  <input type="text" class="form-control" id="nom"  placeholder="Entrer le nom" value="{{$produit->nom}}" name="nom">
                  <span style='color:red;'>{{ $errors->first('nom') }}</span>
                </div>
                               <div class="form-group">
                  <label for="marque">marque</label>
                  <input type="text" class="form-control" id="marque"  placeholder="Entrer marque" value="{{$produit->marque}}" name="marque">
                  <span style='color:red;'>{{ $errors->first('marque') }}</span>
                </div>
                <div class="form-group">
                  <label for="description">description</label>
                  <input type="text" class="form-control" id="description"  placeholder="Entrer description"  value="{{$produit->description}}" name="description">
                  <span style='color:red;'>{{ $errors->first('description') }}</span>
                </div>
                <div class="form-group">
                  <label for="prix_achat">prix d'achat</label>
                  <input type="text" class="form-control" id="prix_achat"  placeholder="Entrer prix_achat" value="{{$produit->prix_achat}}" name="prix_achat">
                  <span style='color:red;'>{{ $errors->first('prix_achat') }}</span>
                </div>
                <div class="form-group">
                  <label for="prix_achat">prix de vente</label>
                  <input type="text" class="form-control" id="prix_vente"  placeholder="Entrer prix_vente" value="{{$produit->prix_vente}}" name="prix_vente">
                  <span style='color:red;'>{{ $errors->first('prix_vente') }}</span>
                </div>
                <div class="form-group">
                  <label for="quantite">quantite</label>
                  <input type="number" class="form-control" id="quantite"  placeholder="Entrer quantite" value="{{$produit->quantite}}" name="quantite">
                  <span style='color:red;'>{{ $errors->first('quantite') }}</span>
                </div>
                <div class="form-group">
                  <label for="code_barre">code_barre</label>
                  <input type="text" class="form-control" id="code_barre"  placeholder="Entrer code_barre" value="{{$produit->code_barre}}" name="code_barre">
                  <span style='color:red;'>{{ $errors->first('code_barre') }}</span>
                </div>
                <div class="form-group">
                  <label for="image">image</label>
                  <input type="file" class="form-control" id="image"  placeholder="Entrer image" value="{{$produit->image}}" name="image">
                  <span style='color:red;'>{{ $errors->first('image') }}</span>
                </div>




                <div class="form-group">
                  <label for="fournisseur">fournisseur</label>
                 <select name="fournisseur" class="form-control">
                 @foreach($fournisseurs as $fournisseur)
                 <option value="{{$fournisseur->id}}" 
                 <?php 
                  if($fournisseur->id==$produit->fournisseur){
                    echo"selected";
                  }
                  ?>  
                 >{{$fournisseur->nom}}</option>
                 @endforeach
                 </select>
                  <span style='color:red;'>{{ $errors->first('fournisseur') }}</span>
                </div>


                <div class="form-group">
                  <label for="categorie">categorie</label>
                 <select name="categorie" class="form-control">
                 @foreach($categories as $categorie)
                 <option value="{{$categorie->id}}"
                 <?php 
                  if($categorie->id==$produit->categorie){
                    echo"selected";
                  }
                  ?>    
                 >{{$categorie->libelle}}</option>
                 @endforeach
                 </select>
                  <span style='color:red;'>{{ $errors->first('categorie') }}</span>
                </div>

                <div class="form-group mb-3">
                <input type="reset" class="btn btn-primary" value='Initialiser' style="background-color:red;border:0px">
           <button class="btn btn-success" type="submit">Modifier</button>
        </div>
                           
              </form>
            </div>
</div>

@endsection
