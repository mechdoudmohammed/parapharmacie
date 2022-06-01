
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
            <h4 class="box-title">Listes des clients </h4>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th >payé</th>
                    <th >Crédit</th>
                    <th>Type</th>
                    <th>Sexe</th>
                    <th>Ice</th>
                    <th>If</th>
                    <th>Rc</th>
                    <th>Operation</th>
                  </tr>
                </thead>
                <tbody>
           
                  @foreach ($clients as $client)
                  
                  
                  @php
                  $credit=DB::table('commandes')
                  ->where('client',$client->id)
                  ->sum('credit');

                  $paye=DB::table('commandes')
                  ->where('client',$client->id)
                  ->sum('paye');
                  @endphp
                    <tr>
                      <td>{{$client->id}}</td>
                      <td>{{$client->nom}}</td>
                      <td>{{$client->prenom}} </td>
                      <td>{{$client->telephone}}</td>
                      <td>{{$client->adresse}}</td>
                      <td>{{$client->email}}</td>
                      <td style="color:green">{{$paye}}Dhs</td>
                      <td style="color:red">{{$credit}}Dhs</td>
                      <td>{{$client->type}}</td>
                      <td>{{$client->sexe}}</td>
                      <td>{{$client->ice}}</td>
                      <td>{{$client->iff}}</td>
                      <td>{{$client->rc}}</td>
                      <td>
                      <a href="{{route('client.edit',$client->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="border-radius:50%" data-toggle="tooltip" title="Modifier" data-placement="bottom"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{route('client.destroy',[$client->id])}}">
                          @csrf 
                          @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$client->id}} style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Suprimer"><i class="fa fa-remove"></i></button>
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
