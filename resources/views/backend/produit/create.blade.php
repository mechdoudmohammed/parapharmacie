
@extends('backend.adminpanel')

@section('content')
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
@php
$fournisseurs = DB::table('fournisseurs')->get();
$categories = DB::table('categories')->get();
$employes = DB::table('employes')->get();
@endphp

      <!-- All Information  -->
      <div class="row justify-content-center">
      <div class="col-md-12">
            @include('backend.partials.notification')
         </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h1 class="text-center">Ajouter un produit</h1>
              <form  action="{{route('produit.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="nom">Nom :</label>
                  
                  <input type="text" class="form-control" id="nom"  placeholder="Entrer le nom" name="nom">
                  <span style='color:red;'>{{ $errors->first('nom') }}</span>
                </div>
                               <div class="form-group">
                  <label for="marque">Marque :</label>
                  <input type="text" class="form-control" id="marque"  placeholder="Entrer marque" name="marque">
                  <span style='color:red;'>{{ $errors->first('marque') }}</span>
                </div>
                <div class="form-group">
                  <label for="description">Description :</label>
                  <input type="text" class="form-control" id="description"  placeholder="Entrer description" name="description">
                  <span style='color:red;'>{{ $errors->first('description') }}</span>
                </div>
                <div class="form-group">
                  <label for="prix_achat">Prix d'achat :</label>
                  <input type="text" class="form-control" id="prix_achat"  placeholder="Entrer prix d'achat" name="prix_achat">
                  <span style='color:red;'>{{ $errors->first('prix_achat') }}</span>
                </div>
                <div class="form-group">
                  <label for="prix_vente">Prix de vente :</label>
                  <input type="text" class="form-control" id="prix_vente"  placeholder="Entrer prix de vente" name="prix_vente">
                  <span style='color:red;'>{{ $errors->first('prix_vente') }}</span>
                </div>
                <div class="form-group">
                  <label for="quantite">Quantité :</label>
                  <input type="number" class="form-control" id="quantite"  placeholder="Entrer quantité" name="quantite">
                  <span style='color:red;'>{{ $errors->first('quantite') }}</span>
                </div>
                <div class="form-group">
                  <label for="code_barre">Code barre :</label>
                  <input type="text" class="form-control" id="code_barre"  placeholder="Entrer code barre" name="code_barre">
                  <span style='color:red;'>{{ $errors->first('code_barre') }}</span>
                </div>
                <div class="form-group">
                  <label for="image">Image :</label>
                  <input type="file" class="form-control" id="image"  placeholder="Entrer image" name="image">
                  <span style='color:red;'>{{ $errors->first('image') }}</span>
                </div>
                <div class="form-group">
                  <label for="fournisseur">Fournisseur :</label>
                 <select name="fournisseur" class="form-control">
                 @foreach($fournisseurs as $fournisseur)
                 <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                 @endforeach
                 </select>
                  <span style='color:red;'>{{ $errors->first('fournisseur') }}</span>
                </div>
                <div class="form-group">
                  <label for="categorie">Categorie :</label>
                 <select name="categorie" class="form-control">
                 @foreach($categories as $categorie)
                 <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
                 @endforeach
                 </select>
                  <span style='color:red;'>{{ $errors->first('categorie') }}</span>
                </div>

                <input type="reset" class="btn btn-primary" value='Initialiser' style="background-color:red;border:0px">
                           <button type="submit" class="btn btn-primary">Ajouter</button>
                           
              </form>
            </div>
          </div>
        </div>


      </div>
      <!-- /All Information -->

      <div class="clearfix"></div>

    </div>
    <!-- .animated -->
  </div>
@endsection
