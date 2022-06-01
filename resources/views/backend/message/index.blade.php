
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
            <h4 class="box-title">Les Messages</h4>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>nom</th>
                    <th>sujet</th>
                    <th>email</th>
                    <th>telephone</th>
                    <th>message</th>
                    <th>Operation</th>
                  </tr>
                </thead>
                <tbody>
           
                  @foreach ($messages as $message)
                    <tr>
                      <td>{{$message->id}}</td>
                      <td>{{$message->nom}} </td>
                      <td>{{$message->sujet}}</td>
                      <td>{{$message->email}}</td>
                      <td>{{$message->telephone}}</td>
                      <td>{{$message->message}}</td>
                      <td>
                      <form method="POST" action="{{route('message.destroy',[$message->id])}}">
                          @csrf 
                          @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$message->id}} style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Suprimer"><i class="fa fa-remove"></i></button>
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
