
@extends('backend.adminpanel')
@section('content')
@php

$details=DB::table('detailcommandes')->where('commande',$commande->id)->get();


@endphp
  <div class="orders">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h4 class="box-title">Détail de la Commande</h4>
            <div class="commande">
            <table class="table" style="color:#ffffff">
            <thead style="background: #52a6ff;">
                  <tr>
                    <th style="width: 10%;">Id</th>
                    <th>Produit</th>
                    <th>Quantite</th>
                    <th>Prix</th>
                    <th>Operation</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                  @php
                  $hi=0;
                  @endphp
        @foreach($details as $detail)
        @php
        $produits=DB::table('produits')->where('id',$detail->produit)->get();
        @endphp  
             <tr>
               @if($hi==0)
                <td>{{$commande->id}}</td>
               @else
               <td></td>
               @endif
                @foreach($produits as $produit)
                <td>
                {{$produit->nom}}
                </td>
                @endforeach
            
               <td>{{$detail->quantite}} </td>
               <td>{{$detail->prix}} Dhs</td>
             @php
             $hi=1;
             @endphp
              <td>
                      <a href="{{route('detailcommandes.edit',[$detail->id])}}" class="btn btn-primary btn-sm float-left mr-1" style="border-radius:50%" data-toggle="tooltip" title="Modifier" data-placement="bottom"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{route('detailcommandes.destroy',[$detail->id])}}">
                          @csrf 
                          @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$detail->id}} style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Suprimer"><i class="fa fa-remove"></i></button>
                        </form>
                      </td>
                      </tr>   
            @endforeach

         </tbody>

</table>
</div>
          </div>
     
           
        </div> <!-- /.card -->
      </div>  <!-- /.col-lg-8 -->


    </div>
  </div>
  <!-- /.orders -->
@endsection
