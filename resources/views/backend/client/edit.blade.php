@extends('backend.adminpanel')
@section('content')
<div class="card">
 
            <div class="card-body">
              <h1 class="text-cEntrer">Modifier un client</h1>
              <form  action="{{route('client.update',$client->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" class="form-control" id="nom"  placeholder="Entrer le nom" value="{{$client->nom}}" name="nom">
                  <span style='color:red;'>{{ $errors->first('nom') }}</span>
                </div>
                <div class="form-group">
                  <label for="prenom">Prenom:</label>
                  <input type="text" class="form-control" id="prenom"  placeholder="Entrer le prenom"value="{{$client->prenom}}" name="prenom">
                  <span style='color:red;'>{{ $errors->first('prenom') }}</span>
                </div>
                <div>
                            <label for="adresse">adresse</label>
                  <input type="text" class="form-control" id="adresse"  placeholder="Entrer l'adresse" value="{{$client->adresse}}"name="adresse">
                  <span style='color:red;'>{{ $errors->first('adresse') }}</span>
                </div>
                <div class="form-group">
                  <label for="tele">Telephone</label>
                  <input type="text" class="form-control" id="tele"  placeholder="Entrer telephone"value="{{$client->tele}}" name="tele">
                  <span style='color:red;'>{{ $errors->first('tele') }}</span>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email"  placeholder="Entrer email"value="{{$client->email}}" name="email">
                  <span style='color:red;'>{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group">
                  <label for="role">Type:</label>
                  <select class="form-control" name="type" id="changeop" onchange="changer()">
                  <option value="indepandent" 
                  <?php 
                  if($client->type=="indepandent"){
                    echo"selected";
                  }
                  ?>  
                  >indepandent</option>
                  <option value="entreprise"
                  <?php 
                  if($client->type=="entreprise"){
                    echo"selected";
                  }
                  ?>  
                  >entreprise</option>
              
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="role">sexe:</label>
                  <select class="form-control" name="sexe">
                  <option value="homme"  <?php 
                  if($client->sexe=="homme"){
                    echo"selected";
                  }
                  ?>  >homme</option>
                  <option value="femme"  <?php 
                  if($client->type=="femme"){
                    echo"selected";
                  }
                  ?>  >femme</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="ice">ice</label>
                  <input type="text" class="form-control" id="entr" placeholder="Entrer ice" name="ice" value="{{$client->ice}}" 
                  <?php 
                  if($client->type=="indepandet"){
                    echo"disabled";
                  }
                  ?>  
                   >
                  <span style='color:red;'>{{ $errors->first('ice') }}</span>
               
                </div>
                <div class="form-group">
                  <label for="iff">if</label>
                  <input type="text" class="form-control" id="entr1" placeholder="Entrer iff" name="iff" value="{{$client->iff}}"   <?php 
                  if($client->type=="indepandet"){
                    echo"disabled";
                  }
                  ?>  >
                  <span style='color:red;'>{{ $errors->first('iff') }}</span>
                </div>
                <div class="form-group">
                  <label for="rc">rc</label>
                  <input type="text" class="form-control" id="entr2"placeholder="Entrer rc" name="rc"  value="{{$client->rc}}"   <?php 
                  if($client->type=="indepandet"){
                    echo"disabled";
                  }
                  ?>  >
                  <span style='color:red;'>{{ $errors->first('rc') }}</span>
                </div>
                <input type="reset" class="btn btn-primary" value='Initialiser' style="background-color:red;border:0px">
                <button type="submit" class="btn btn-primary">Modifier</button>
              </form>
            </div>
          </div>
</div>

@endsection
