<!doctype html>
<html class="no-js" lang="">
<head>
   @include('backend.partials.css')
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
   <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

<body  onload="window.print()">
  <div class="orders">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
  
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>                
                    <th>Produit N</th>
                    <th>image</th>
                    <th>Nom</th>
                    <th>Categorie</th>
                    <th>Marque</th>
                    <th>Fournisseur</th>
                    <th>Description</th>
                    <th>prix d'achat</th>
                    <th>quantité</th>
                    <th>code barre</th>
                    <th>employe</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($produits as $produit)
                  
@php
$libelle = DB::table('categories')->where('id',$produit->categorie)->value('libelle');
$fournisseur = DB::table('fournisseurs')->where('id',$produit->fournisseur)->value('nom');
$employe = DB::table('employes')->where('id',$produit->employe)->get();

@endphp

                    <tr>
                      <td>{{$produit->id}}</td>
                      <td><img src="{{asset('/images/produits')}}/{{$produit->image}}" id="img_produit"> </td>
                      <td>{{$produit->nom}}</td>
                      <td>{{$libelle}}</td>
                      <td>{{$produit->marque}}</td>
                      <td>{{$fournisseur}}</td>
                      <td>{{$produit->description}}</td>
                      <td>{{$produit->prix_achat}}</td>
                      <td>{{$produit->quantite}}</td>
                      <td>{{$produit->code_barre}}</td>
                      @foreach($employe as $emp)
                      <td>{{$emp->nom}}<br>{{$emp->prenom}}</td>
                      @endforeach
                    </tr>
                  @endforeach


                </tbody>
              </table>
            </div> <!-- /.table-stats -->
          </div>
        </div> <!-- /.card -->
      </div>  <!-- /.col-lg-8 -->


    </div>
  </div>
  </body>
</html>
