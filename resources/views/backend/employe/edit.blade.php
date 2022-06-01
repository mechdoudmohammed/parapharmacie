@extends('backend.adminpanel')
@section('content')
<div class="card">
    <h5 class="card-header">Modifier Employe</h5>
    <div class="card-body">
      <form method="post" action="{{route('employe.update',$employe->id)}}" enctype="multipart/form-data">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="inputnom" class="col-form-label">Login</label>
        <input id="inputnom" type="text" name="login" placeholder="Entrer login"  value="{{$employe->login}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('login') }}</span>
       </div>
       <div class="form-group">
          <label for="inputnom" class="col-form-label">Mot de passe</label>
        <input id="inputnom" type="password" name="mot_passe" placeholder="Entrer Mot de passe"  value="{{$employe->mot_passe}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('mot_passe') }}</span>
       </div>
        <div class="form-group">
          <label for="inputnom" class="col-form-label">Nom</label>
        <input id="inputnom" type="text" name="nom" placeholder="Entrer nom"  value="{{$employe->nom}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('nom') }}</span>
       </div>
       <div class="form-group">
          <label for="inputnom" class="col-form-label">Prenom</label>
        <input id="inputnom" type="text" name="prenom" placeholder="Entrer Prenom"  value="{{$employe->prenom}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('prenom') }}</span>
       </div>
       <div class="form-group">
          <label for="inputnom" class="col-form-label">Cin</label>
        <input id="inputnom" type="text" name="cin" placeholder="Entrer Cin"  value="{{$employe->cin}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('cin') }}</span>
       </div>
       <div class="form-group">
          <label for="inputnom" class="col-form-label">adresse</label>
        <input id="inputnom" type="text" name="adresse" placeholder="Entrer adresse"  value="{{$employe->adresse}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('adresse') }}</span>
       </div>
       <div class="form-group">
          <label for="inputnom" class="col-form-label">Telephone</label>
        <input id="inputnom" type="text" name="telephone" placeholder="Entrer telephone"  value="{{$employe->telephone}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('telephone') }}</span>
       </div>
       <div class="form-group">
          <label for="inputnom" class="col-form-label">Description</label>
        <input id="inputnom" type="text" name="description" placeholder="Entrer Description"  value="{{$employe->description}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('description') }}</span>
       </div>
       <div class="form-group">
          <label for="inputnom" class="col-form-label">Email</label>
        <input id="inputnom" type="email" name="email" placeholder="Entrer Email"  value="{{$employe->email}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('email') }}</span>
       </div>
       <div class="form-group">
          <label for="inputnom" class="col-form-label">Salaire</label>
        <input id="inputnom" type="number" name="salaire" placeholder="Entrer Salaire"  value="{{$employe->salaire}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('salaire') }}</span>
       </div>
       <div class="form-group">
          <label for="image" class="col-form-label">Image</label>
        <input id="image" type="file" name="image"   value="{{$employe->image}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('image') }}</span>
       </div>
        <div class="form-group mb-3">
        <input type="reset" class="btn btn-primary" value='Initialiser' style="background-color:red;border:0px">
           <button class="btn btn-success" type="submit">Modifier</button>
        </div>
      </form>
    </div>
</div>

@endsection
