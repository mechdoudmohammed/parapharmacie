
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
            <h4 class="box-title">Les Fournisseurs</h4>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Operation</th>
                  </tr>
                </thead>
                <tbody>
           
                  @foreach ($fournisseurs as $fournisseur)
                    <tr>
                      <td>{{$fournisseur->id}}</td>
                      <td>{{$fournisseur->nom}} </td>
                      <td>{{$fournisseur->telephone}}</td>
                      <td>{{$fournisseur->adresse}}</td>
                      <td>{{$fournisseur->email}}</td>
                      <td>
                      <a href="{{route('fournisseur.edit',$fournisseur->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="border-radius:50%" data-toggle="tooltip" title="Modifier" data-placement="bottom"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{route('fournisseur.destroy',[$fournisseur->id])}}">
                          @csrf 
                          @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$fournisseur->id}} style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Suprimer"><i class="fa fa-remove"></i></button>
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
