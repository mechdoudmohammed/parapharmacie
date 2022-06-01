
@extends('backend.adminpanel')
@section('content')
  <div class="orders">
  
    <div class="row">
    <div class="col-md-12">
            @include('backend.partials.notification')
         </div>
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h4 class="box-title">Les Annonces</h4>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Operation</th>
                                    </tr>
                </thead>
                <tbody>
           
                  @foreach ($annonces as $annonce)
                    <tr>
                      <td>{{$annonce->id}}</td>
                      <td><img src="{{asset('/images/annonces')}}/{{$annonce->image}}" id="img_produit"> </td>
                      <td>{{$annonce->titre}} </td>
                      <td>{{$annonce->date}}</td>
                      <td>{{$annonce->description}}</td>                 
                      <td>
                      <a href="{{route('annonce.edit',$annonce->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="border-radius:50%" data-toggle="tooltip" title="Modifier" data-placement="bottom"><i class="fa fa-edit"></i></a>
                      <form method="POST" action="{{route('annonce.destroy',[$annonce->id])}}">
                          @csrf 
                          @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$annonce->id}} style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Suprimer"><i class="fa fa-remove"></i></button>
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
