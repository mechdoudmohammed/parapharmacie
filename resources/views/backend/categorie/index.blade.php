
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
            <h4 class="box-title">Les Categorie</h4>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>libelle</th>
                    <th>Operation</th>
                  </tr>
                </thead>
                <tbody>
           
                  @foreach ($categories as $categorie)
                    <tr>
                      <td>{{$categorie->id}}</td>
                      <td>{{$categorie->libelle}} </td>

                      <td>
                      <a href="{{route('categorie.edit',$categorie->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="border-radius:50%" data-toggle="tooltip" title="Modifier" data-placement="bottom"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{route('categorie.destroy',[$categorie->id])}}">
                          @csrf 
                          @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$categorie->id}} style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Suprimer"><i class="fa fa-remove"></i></button>
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
