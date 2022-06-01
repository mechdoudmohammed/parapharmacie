@extends('backend.adminpanel')
@section('content')
<div class="col-md-12">
            @include('backend.partials.notification')
         </div>
<div class="card">

    <h5 class="card-header">Modifier les paramètres</h5>
    <div class="card-body">
      <form method="post" action="{{route('parametres.mode')}}" enctype="multipart/form-data">
        @csrf 
   
        <div class="form-group">
          <label for="propos" class="col-form-label">Apropos de nous</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="propos">{{$parametres->propos}}</textarea>
     
        <span style='color:red;'>{{ $errors->first('propos') }}</span>
       </div>
       <div class="form-group">
          <label for="facebook" class="col-form-label">Facebook</label>
        <input id="inputnom" type="text" name="facebook" placeholder="Entrer facebook"  value="{{$parametres->facebook}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('facebook') }}</span>
       </div>
        <div class="form-group">
          <label for="twitter" class="col-form-label">Twitter</label>
        <input id="inputnom" type="text" name="twitter" placeholder="Entrer twitter"  value="{{$parametres->twitter}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('twitter') }}</span>
       </div>
       <div class="form-group">
          <label for="youtube" class="col-form-label">Youtube</label>
        <input id="inputnom" type="text" name="youtube" placeholder="Entrer Prenom"  value="{{$parametres->youtube}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('youtube') }}</span>
       </div>
      
        <div class="form-group mb-3">
        <input type="reset" class="btn btn-primary" value='Initialiser' style="background-color:red;border:0px">
           <button class="btn btn-success" type="submit">Modifier</button>
        </div>
      </form>
    </div>
</div>

@endsection
