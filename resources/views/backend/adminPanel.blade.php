<!doctype html>
<html class="no-js" lang="">
<head>
   @include('backend.partials.css')
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  




   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
   <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

  </head>

<body>
@php
$count = DB::table('commandes')->count();
$count_client=DB::table('clients')->count();
$count_produit=DB::table('produits')->count();
$revenu=DB::table('commandes')->sum('totale');
$credit=DB::table('commandes')->sum('credit');

@endphp
    <!-- Left Panel -->
  @include('backend.partials.aside')
    <!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('backend.partials.header')
        <!-- /#header -->
        <!-- All Information  -->
         <div class="content">
         @include('backend.partials.allamount')
   
        <!-- /All Information -->
        <!-- Content -->
        @yield('content')

          </div>
        <!-- /.content -->
        <div class="clearfix"></div>

        <!-- Footer -->
        @include('backend.partials.footer')
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
  @include('backend.partials.scripts')
  @yield('footer_scripts')
</body>
</html>
