
@extends('backend.adminpanel')
@section('content')


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crédit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('commande.modifier')}}">
        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Payé:</label>
            <input type="number" class="form-control" id="paye" name="paye">
            <span style='color:red;'>{{ $errors->first('paye') }}</span>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Crédit:</label>
            <input type="number" class="form-control" id="credit" name="credit">
            <span style='color:red;'>{{ $errors->first('credit') }}</span>
            <input type="hidden" class="form-control" id="id_cmd" name="id">
          </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="col-md-12">
            @include('backend.partials.notification')
         </div>
  <div class="orders">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">

          <div class="card-body">
            <h4 class="box-title">Les Commandes</h4>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th style="width:5%">Commande N</th>
                    <th style="width:5%" >Client N</th>
                    <th>Date</th>
                    <th style="width:15%">Totale</th>
                     <th style="width:15%">payé</th>
                     <th style="width:15%">Reste à payé</th>
                    
                    <th>Operation</th>
                  </tr>
                </thead>
                <tbody>
           
                  @foreach ($commandes as $commande)
                    <tr>
                      <td>{{$commande->id}}</td>
                      <td>{{$commande->client}}</td>
                      <td>{{$commande->date}}</td>
                      <td>{{$commande->totale}} Dhs</td>
                      <td style="color:green">{{$commande->paye}} Dhs</td>
                      <td style="color:red">{{$commande->credit}} Dhs</td>
                     
                      <td>
                      <a href="#"  
                      class="btn btn-primary btn-sm float-left mr-1 btn btn-primary" 
                      style="border-radius:50%;background-color:green" data-toggle="modal" 
                      title="afficher" data-paye="{{$commande->paye}}" data-credit="{{$commande->credit}}" date-cmd="{{$commande->id}}"
                      id="paye" onclick="get_paye(this)"
                      data-placement="bottom" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa fa-money"></i></a>


                      
                      <a href="{{route('commande.show',$commande->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="border-radius:50%;background-color:green" data-toggle="tooltip" title="afficher" data-placement="bottom" ><i class="fa fa-eye"></i></a>
                     <a href="{{route('commande.pdf',$commande->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="border-radius:50%" data-toggle="tooltip" title="Modifier" data-placement="bottom"><i class="fa fa-file"></i></a>
                      <form method="POST" action="{{route('commande.destroy',[$commande->id])}}">
                          @csrf 
                          @method('delete')
                          <button class="btn btn-danger btn-sm dltBtn" data-id={{$commande->id}} style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Suprimer"><i class="fa fa-remove"></i></button>
                        </form></td>

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
  <script type="text/javascript">

        function get_paye(d){
          document.getElementById("paye").value = d.getAttribute("data-paye");
          document.getElementById("credit").value = d.getAttribute("data-credit");
           document.getElementById("id_cmd").value = d.getAttribute("date-cmd");
        }

    </script>
  <!-- /.orders -->
@endsection
