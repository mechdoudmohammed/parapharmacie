
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
            <h4 class="box-title">Listes des charges </h4>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th>Titre</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Mode de paiement</th>
                    <th>Employe</th>
                    <th>Doccument</th>
                    <th>Operation</th>
                  </tr>
                </thead>
                <tbody>
                
           
                  @foreach ($charges as $charge)
                    @php
                    $employe = DB::table('employes')->where('id',$charge->employe)->get();
                   @endphp

                    <tr>
                      <td>{{$charge->titre}}</td>
                      <td>{{$charge->montant}}</td>
                      <td>{{$charge->date}}</td>
                      <td>{{$charge->mode_paiement}}</td>
                      <?php if(count($employe)==0){
                        echo "<td></td>";
                      }
                      
                      ?>
                      @foreach($employe as $emp)
                      <td>{{$emp->nom}}<br>{{$emp->prenom}}</td>
                      @endforeach
                      <td><a href="{{asset('images/doccument')}}/{{$charge->doccument}}" download
                      >Telecharger</a></td>
                      <td>
                      <a href="{{route('charge.edit',$charge->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="border-radius:50%" data-toggle="tooltip" title="Modifier" data-placement="bottom"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{route('charge.destroy',[$charge->id])}}">
                          @csrf 
                          @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$charge->id}} style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Suprimer"><i class="fa fa-remove"></i></button>
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
