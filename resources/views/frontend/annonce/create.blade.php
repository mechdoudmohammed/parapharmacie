
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
              <h1 class="text-center">Ajouter une Annonce</h1>
              <form  action="{{route('annonce.store')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
                <div class="form-group">
                  <label for="medicine_name">Titre:</label>
                  <input type="text" class="form-control" id="titre"  placeholder="Entrer le titre" name="titre" value="{{old('titre')}}">
                  <span style='color:red;'>{{ $errors->first('titre') }}</span>
                </div>
                               <div class="form-group">
                  <label for="medicine_quantity">Date</label>
                  <input type="date" class="form-control" id="date"  placeholder="Entrer date" name="date">
                  <span style='color:red;'>{{ $errors->first('date') }}</span>
                </div>
                <div class="form-group">
                  <label for="medicine_quantity">Description</label>
                  <input type="text" class="form-control" id="description"  placeholder="Entrer description" name="description">
                  <span style='color:red;'>{{ $errors->first('description') }}</span>
                </div>
                <div class="form-group">
                  <label for="medicine_quantity">Image</label>
                  <input type="file" class="form-control" id="image"  placeholder="Entrer image" name="image">
                  <span style='color:red;'>{{ $errors->first('image') }}</span>
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
