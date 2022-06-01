
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
              <h1 class="text-center">Ajouter un Commande</h1>
              <form  action="{{route('commande.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="medicine_name">Nom:</label>
                  
                  <input type="text" class="form-control" id="nom"  placeholder="Entrer le nom" name="nom">
                  <span style='color:red;'>{{ $errors->first('nom') }}</span>
                </div>
                               <div class="form-group">
                  <label for="medicine_quantity">adresse</label>
                  <input type="text" class="form-control" id="adresse"  placeholder="Entrer adresse" name="adresse">
                  <span style='color:red;'>{{ $errors->first('adresse') }}</span>
                </div>
                <div class="form-group">
                  <label for="medicine_quantity">Telephone</label>
                  <input type="text" class="form-control" id="telephone"  placeholder="Entrer telephone" name="telephone">
                  <span style='color:red;'>{{ $errors->first('telephone') }}</span>
                </div>
                <div class="form-group">
                  <label for="medicine_quantity">Email</label>
                  <input type="text" class="form-control" id="email"  placeholder="Entrer email" name="email">
                  <span style='color:red;'>{{ $errors->first('email') }}</span>
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
