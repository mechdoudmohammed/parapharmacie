
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
              <h1 class="text-center">Ajouter une Categorie</h1>
              <form  action="{{route('categorie.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="libelle">Nom:</label>
                  
                  <input type="text" class="form-control" id="libelle"  placeholder="Entrer libelle" name="libelle" value="{{old('libelle')}}">
                  <span style='color:red;'>{{ $errors->first('libelle') }}</span>
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
