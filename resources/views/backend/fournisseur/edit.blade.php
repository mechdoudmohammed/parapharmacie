@extends('backend.adminpanel')
@section('content')
<div class="card">
<div class="col-md-12">
            @include('backend.partials.notification')
         </div>
    <h5 class="card-header">Modifier Fournisseur</h5>
    <div class="card-body">
      <form method="post" action="{{route('fournisseur.update',$fournisseur->id)}}" enctype="multipart/form-data">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="nom" class="col-form-label">Nom</label>
        <input id="inputnom" type="text" name="nom" placeholder="Entrer Nom"  value="{{$fournisseur->nom}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('nom') }}</span>
       </div>
       <div class="form-group">
          <label for="telephone" class="col-form-label">Telephone</label>
        <input id="inputnom" type="text" name="telephone" placeholder="Entrer Telephone"  value="{{$fournisseur->telephone}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('telephone') }}</span>
       </div>
        <div class="form-group">
          <label for="adresse class="col-form-label">Adresse</label>
        <input id="inputnom" type="text" name="adresse" placeholder="Entrer nom"  value="{{$fournisseur->adresse}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('adresse') }}</span>
       </div>
       <div class="form-group">
          <label for="email" class="col-form-label">Email</label>
        <input id="inputnom" type="text" name="email" placeholder="Entrer Prenom"  value="{{$fournisseur->email}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('email') }}</span>
       </div>
      
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Modifier</button>
        </div>
      </form>
    </div>
</div>

@endsection
