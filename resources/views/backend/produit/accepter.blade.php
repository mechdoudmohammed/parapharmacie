
@extends('backend.adminpanel')
@section('content')
<div class="col-md-12">
            @include('backend.partials.notification')
         </div>
  <div class="orders">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h4 class="box-title" style="display: inline">Les Produits à accepter</h4>
            <input class="form-control" id="myInput" type="text" placeholder="chercher un produit" style="width:300px;margin-left: 18px;float: right;">
          </div>
          <div class="imprition">
        
</div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>                
                    <th style="width:5%"> N</th>
                    <th>image</th>
                    <th>Nom</th>
                    <th>Categorie</th>
                    <th>Marque</th>
                    <th>Fournisseur</th>
                    <th>Description</th>
                    <th>prix d'achat</th>
                    <th>prix de vente</th>
                    <th>quantité</th>
                    <th>code barre</th>
                    <th>employe</th>
                    <th>Operation</th>
                  </tr>
                </thead>
                <tbody id="myTable">
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
                      <td>{{$produit->prix_achat}} Dhs</td>
                      <td>{{$produit->prix_vente}} Dhs</td>
                      <td>{{$produit->quantite}}</td>
                      <td>{{$produit->code_barre}}</td>
                      @foreach($employe as $emp)
                      <td>{{$emp->nom}}<br>{{$emp->prenom}}</td>
                      @endforeach
                      <td>
                      <a href="{{route('produit.modifier',$produit->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="border-radius:50%" data-toggle="tooltip" title="Accepter" data-placement="bottom"><i class="fa fa-check "></i></a>
                      <form method="POST" action="{{route('produit.destroy',[$produit->id])}}">
                          @csrf 
                          @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$produit->id}} style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Suprimer"><i class="fa fa-remove"></i></button>
                        </form>
                      </td>
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

  <!-- /.orders -->
@endsection
