
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
            <h4 class="box-title" style="display:inline">Listes Employés </h4>
            <input class="form-control" id="myInput" type="text" placeholder="chercher un employée" style="width:300px;margin-left: 18px;float: right;">
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table" >
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Cin</th>
                    <th>Description</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th >Email</th>
                    <th>Role</th>
                    <th>Salaire</th>
                    <th>Operation</th>
                  </tr>
                </thead>
                <tbody id="myTable">
           
                  @foreach ($employes as $employe)
                    <tr>
                      <td>{{$employe->id}}</td>
                      <td><img src="{{asset('/images/employes')}}/{{$employe->image}}" id="img_produit"> </td>
                      <td>{{$employe->prenom}}</td>
                      <td>{{$employe->nom}} </td>
                      <td>{{$employe->cin}}</td>
                      <td>{{$employe->description}}</td>
                      <td>{{$employe->telephone}}</td>
                      <td>{{$employe->adresse}}</td>
                      <td>{{$employe->email}}</td>
                      <td>{{$employe->role}}</td>
                      <td>{{$employe->salaire}}Dhs</td>
                      <td>
                      <a href="{{route('employe.edit',$employe->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="border-radius:50%" data-toggle="tooltip" title="Modifier" data-placement="bottom"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{route('employe.destroy',[$employe->id])}}">
                          @csrf 
                          @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$employe->id}} style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Suprimer"><i class="fa fa-remove"></i></button>
                        </form>
                      </td>
                    </tr>
                 
                  @endforeach


                </tbody>
              </table>
            </div> 
          </div>
        </div> 
      </div>  

  
    </div>
  </div>

@endsection
