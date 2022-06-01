@extends('backend.adminpanel')
@section('content')
<div class="card">
    <h5 class="card-header">Modifier Categorie</h5>
    <div class="card-body">
      <form method="post" action="{{route('categorie.update',$categorie->id)}}" enctype="multipart/form-data">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="libelle" class="col-form-label">Libelle</label>
        <input id="inputnom" type="text" name="libelle" placeholder="Entrer libelle"  value="{{$categorie->libelle}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('libelle') }}</span>
       </div>

      
        <div class="form-group mb-3">
        <input type="reset" class="btn btn-primary" value='Initialiser' style="background-color:red;border:0px">
           <button class="btn btn-success" type="submit">Modifier</button>
        </div>
      </form>
    </div>
</div>

@endsection
