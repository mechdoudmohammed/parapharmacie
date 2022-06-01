@extends('backend.adminpanel')
@section('content')
<div class="card">
<div class="col-md-12">
            @include('backend.partials.notification')
         </div>
    <h5 class="card-header">Modifier Produit</h5>
    <div class="card-body">
      <form method="post" action="{{route('detailcommandes.update',$detailcommandes->id)}}" enctype="multipart/form-data">
        @csrf 
        @method('PATCH')
        @php

        $tous_produits=DB::table('produits')->get();
        @endphp  
       <div class="form-group">
          <label for="produit" class="col-form-label">Produit</label>

          <select class="form-control" name="produit" id="produit">
                 @foreach($tous_produits as $pr)
                  <option id="produit" value="{{$pr->id}}" data-prix="{{$pr->prix_vente}}"<?php 
                  if($pr->id==$detailcommandes->produit){
                    echo"selected";
                  }
                  ?>
                
                  
                  >{{$pr->nom}}</option>
                  @endforeach
                  </select>
         
        <span style='color:red;'>{{ $errors->first('produit') }}</span>
       </div>

       @php
        $produit_prix=DB::table('produits')->where('id',$detailcommandes->produit)->value('prix_vente');
        @endphp  
       <div class="form-group">
          <label for="prix_unite" class="col-form-label">Prix_unite</label>
        <input id="prix_unite" type="text" disabled name="prix_unite"  value="{{$produit_prix}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('prix_unite') }}</span>
       </div>
       <div class="form-group">
          <label for="quantite" class="col-form-label">Quantite</label>
        <input id="quantite" type="number" name="quantite" placeholder="Entrer Quantite" onkeyup="modifier2()" value="{{$detailcommandes->quantite}}" class="form-control" >
        <span style='color:red;'>{{ $errors->first('quantite') }}</span>
       </div>
       <div class="form-group">
          <label for="remise" class="col-form-label">remise</label>
        <input id="remise" type="number" name="remise" placeholder="Entrer remsie" onkeyup="modifier()"  value="{{$detailcommandes->remise}}" class="form-control"   >
        <span style='color:red;'>{{ $errors->first('remise') }}</span>
       </div>

        <div class="form-group">
          <label for="prix" class="col-form-label">Prix</label>
        <input id="prix" type="number"  name="prix"  value="{{$detailcommandes->prix}}" class="form-control" min="0" step="0.01">
        <span style='color:red;'>{{ $errors->first('prix')}}</span>
       </div>
      
        <div class="form-group mb-3">
        <input type="reset" class="btn btn-primary" value='Initialiser' style="background-color:red;border:0px">
           <button class="btn btn-success" type="submit">Modifier</button>
        </div>
      </form>
    </div>
</div>

<script>
function modifier(){

var remise= document.getElementById("remise").value;
var num=(document.getElementById("prix_unite").value*document.getElementById("quantite").value)-(document.getElementById("prix_unite").value*document.getElementById("quantite").value)*(remise/100);

document.getElementById("prix").value=(Math.round(num * 100) / 100).toFixed(2);

}
function modifier2(){

var remise= document.getElementById("remise").value;


var num1 = (document.getElementById("prix_unite").value*document.getElementById("quantite").value)-(document.getElementById("prix_unite").value*document.getElementById("quantite").value)*(remise/100);


document.getElementById("prix").value=(Math.round(num1 * 100) / 100).toFixed(2);


}

var produit = document.querySelector("#produit");

produit.onchange = function () {
  var options = document.querySelectorAll("option");
  for (var i = 0; i < options.length; i++) {
    if (produit.value == options[i].value) {
      document.querySelector("#prix_unite").value = options[i].dataset.prix;
      break;
    }
  }
  document.getElementById("remise").value=0;
  document.getElementById("prix").value=0;
  document.getElementById("quantite").value=0;
};


</script>

@endsection
