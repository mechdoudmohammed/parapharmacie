
@extends('backend.adminpanel')

@section('content')
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">


      <!-- All Information  -->
      <div class="row justify-content-center">
      <div class="col-md-12">
            @include('backend.partials.notification')
         </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h1 class="text-center">Ajouter un Employé</h1>
              <form  action="{{route('employe.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="login">Login :</label>
                  <input type="text" class="form-control" id="login"  placeholder="Entrer le login" name="login">
                  <span style='color:red;'>{{ $errors->first('login') }}</span>
                </div>
                <div class="form-group">
                  <label for="mot_passe">Mot de passe :</label>
                  <input type="password" class="form-control" id="mot_passe"  placeholder="Entrer le mot de passe" name="mot_passe">
                  <span style='color:red;'>{{ $errors->first('mot_passe') }}</span>
                </div>
                <div class="form-group">
                  <label for="nom">Nom :</label>
                  <input type="text" class="form-control" id="nom"  placeholder="Entrer le nom" name="nom">
                  <span style='color:red;'>{{ $errors->first('nom') }}</span>
                </div>
                <div class="form-group">
                  <label for="prenom">Prenom :</label>
                  <input type="text" class="form-control" id="prenom"  placeholder="Entrer le prenom" name="prenom">
                  <span style='color:red;'>{{ $errors->first('prenom') }}</span>
                </div>
                <div class="form-group">
                  <label for="cin">CIN :</label>
                  <input type="text" class="form-control" id="cin"  placeholder="Entrer CIN" name="cin">
                  <span style='color:red;'>{{ $errors->first('cin') }}</span>
                </div>
                <div class="form-group">
                  <label for="adresse">Adresse :</label>
                  <input type="text" class="form-control" id="adresse"  placeholder="Entrer adresse" name="adresse">
                  <span style='color:red;'>{{ $errors->first('adresse') }}</span>
                </div>
                <div class="form-group">
                  <label for="telephone">Telephone :</label>
                  <input type="text" class="form-control" id="telephone"  placeholder="Entrer telephone" name="telephone">
                  <span style='color:red;'>{{ $errors->first('telephone') }}</span>
                </div>
                <div class="form-group">
                  <label for="email">Email :</label>
                  <input type="text" class="form-control" id="adresse"  placeholder="Entrer email" name="email">
                  <span style='color:red;'>{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group">
                  <label for="description">Description :</label>
                  <input type="text" class="form-control" id="medicine_description"  placeholder="Entrer la description" name="description">
                  <span style='color:red;'>{{ $errors->first('description') }}</span>
                </div>
                <div class="form-group">
                  <label for="role">Role :</label>
                  <select class="form-control" name="role">
                  <option value="admin">admin</option>
                  <option value="employe">employe</option>
                  </select>
                  <div class="form-group">
                  <label for="salaire">Salaire :</label>
                  <input type="number" class="form-control" id="salaire"  placeholder="Entrer salaire" name="salaire">
                  <span style='color:red;'>{{ $errors->first('salaire') }}</span>
                </div>
                </div>
                <div class="form-group">
                  <label for="image">Image :</label>
                  <input type="file" class="form-control" id="image"  name="image">
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
