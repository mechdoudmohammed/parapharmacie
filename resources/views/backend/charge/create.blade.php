
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
              <h1 class="text-center">Ajouter une Charge</h1>
              <form  action="{{route('charge.store')}}" method="post" enctype="multipart/form-data">
                @csrf           
                <div class="form-group">
                  <label for="titre">Titre:</label>
                 
                  <select class="form-control" name="titre" id="titre" onchange="modifier()">
                  <option value="Loyer">Loyer</option>
                  <option value="Electricité">Electricité</option>
                  <option value="l'eau">l'eau</option>
                  <option value="Salaire">Salaire</option>
                  <option value="CNSS">CNSS</option>
                  <option value="Comptable">Comptable</option>
                  <option value="Fourniture">Fourniture</option>
                  <option value="Nettoyage">Nettoyage</option>
                  <option value="Telephone">Telephone</option>
                  <option value="Autre">Autre</option>

                  </select>
                </div>
                <div class="form-group" id="titre2" style="display: none;margin-left: 19px;" >
                  <label for="titre2" >Entrer le titre:</label>
                  <input type="text" class="form-control" id="titre2"  placeholder="Entrer le date" name="titre2" >
                  <span style='color:red;'>{{ $errors->first('titre2') }}</span>
                  </div>

                <div class="form-group">
                  <label for="montant">Montant:</label>
                  <input type="text" class="form-control" id="montant"  placeholder="Entrer le date" name="montant" required>
                  <span style='color:red;'>{{ $errors->first('montant') }}</span>
                </div>
                <div class="form-group">
                  <label for="date">Date:</label>
                  <input type="date" class="form-control" id="date"  placeholder="Entrer le date" name="date" required>
                  <span style='color:red;'>{{ $errors->first('date') }}</span>
                </div>
              
                <div class="form-group">
                  <label for="mode_paiement">Mode_paiement:</label>
                  <select class="form-control" name="mode_paiement" >
                  <option value="chèque">chèque</option>
                  <option value="espéce">espéce</option>
                  <option value="carte bancaire">carte bancaire</option>
                  </select>
                  <div class="form-group">
                  <label for="doccument">Doccument</label>
                  <input type="file" class="form-control" id="doccument"  placeholder="Entrer doccument" name="doccument" required>
                  <span style='color:red;'>{{ $errors->first('doccument') }}</span>
                </div>
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

  <script>
  function modifier(){
    if(document.getElementById("titre").value=="Autre"){
      document.getElementById("titre2").style.display ="block"
    }else{
      document.getElementById("titre2").style.display ="none"
    }
  }
  </script>
@endsection
