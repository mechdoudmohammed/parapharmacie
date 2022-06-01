
@extends('backend.adminpanel')
@section('content')
<style>
.table-responsive {
    display: block;
    width: 80%;
    overflow-x: auto;
    margin: 0 auto;
}
td {
    height: 10px;
}
</style>
<div class="col-md-12">
            @include('backend.partials.notification')
         </div>
  <div class="orders">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h4 class="box-title" style="display: inline">Les Produits</h4>
            <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
          </div>

          <div class="table-responsive">
     
      <table class="table table-striped table-bordered">

       <tbody>

       </tbody>
      </table>
     </div>


          <div class="card-body--">
            <div class="table-stats order-table ov-h">
          
            </div> 
          </div>
        </div> 


    </div>
  </div>
  <script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
   
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>

 
  
@endsection
