@extends('backend.adminpanel')
@section('content')
<div class="card">
    <h5 class="card-header">Modifier Annonce</h5>
    <div class="card-body">
      <form method="post" action="{{route('annonce.update',$annonce->id)}}" enctype="multipart/form-data">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="titre" class="col-form-label">Titre</label>
        <input id="inputnom" type="text" name="titre" placeholder="Entrer Titre"  value="{{$annonce->titre}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('titre') }}</span>
       </div>
       <div class="form-group">
          <label for="date" class="col-form-label">Date</label>
        <input id="inputnom" type="date" name="date" placeholder="Entrer Date"  value="{{$annonce->date}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('date') }}</span>
       </div>
        <div class="form-group">
          <label for="description" class="col-form-label">Description</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Entrer description" >{{$annonce->description}}</textarea>
        <span style='color:red;'>{{ $errors->first('description') }}</span>
       </div>
       <div class="form-group">
          <label for="image" class="col-form-label">Image</label>
        <input id="image" type="file" name="image"  value="{{$annonce->image}}" class="form-control" >
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
