
@extends('backend.adminpanel')

@section('content')
  <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">


      <!-- All Information  -->
      <div class="row justify-content-cEntrer" style="justify-content: center;">
      <div class="col-md-12">
            @include('backend.partials.notification')
         </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h1 class="text-cEntrer">Ajouter un client</h1>
              <form  action="{{route('client.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" id="nom"  placeholder="Entrer le nom" name="nom">
                  <span style='color:red;'>{{ $errors->first('nom') }}</span>
                </div>
                <div class="form-group">
                  <label for="prenom">Prenom:</label>
                  <input type="text" class="form-control" id="prenom"  placeholder="Entrer le prenom" name="prenom">
                  <span style='color:red;'>{{ $errors->first('prenom') }}</span>
                </div>
                <div>
                            <label for="adresse">adresse</label>
                  <input type="text" class="form-control" id="adresse"  placeholder="Entrer l'adresse" name="adresse">
                  <span style='color:red;'>{{ $errors->first('adresse') }}</span>
                </div>
                <div class="form-group">
                  <label for="tele">Telephone</label>
                  <input type="text" class="form-control" id="tele"  placeholder="Entrer telephone" name="tele">
                  <span style='color:red;'>{{ $errors->first('tele') }}</span>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email"  placeholder="Entrer email" name="email">
                  <span style='color:red;'>{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group">
                  <label for="role">Type:</label>
                  <select class="form-control" name="type" id="changeop" onchange="changer()">
                  <option value="indepandent"  >indepandent</option>
                  <option value="entreprise" >entreprise</option>
              
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="role">sexe:</label>
                  <select class="form-control" name="sexe">
                  <option value="homme">homme</option>
                  <option value="femme">femme</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="ice">ice</label>
                  <input type="text" class="form-control" id="entr" placeholder="Entrer ice" name="ice" disabled >
                  <span style='color:red;'>{{ $errors->first('ice') }}</span>
               
                </div>
                <div class="form-group">
                  <label for="iff">if</label>
                  <input type="text" class="form-control" id="entr1" placeholder="Entrer if" name="iff" disabled >
                  <span style='color:red;'>{{ $errors->first('iff') }}</span>
                </div>
                <div class="form-group">
                  <label for="rc">rc</label>
                  <input type="text" class="form-control" id="entr2"placeholder="Entrer rc" name="rc" disabled >
                  <span style='color:red;'>{{ $errors->first('rc') }}</span>
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
