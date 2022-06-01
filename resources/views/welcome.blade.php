<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Parapharmacie</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
        <!-- Styles -->
        <style>
      
            html,
      body,
      header,
      .carousel {
        height: 60vh;
      }

      @media (max-width: 740px) {
        html,
        body,
        header,
        .carousel {
          height: 100vh;
        }
      }

      @media (min-width: 800px) and (max-width: 850px) {
        html,
        body,
        header,
        .carousel {
          height: 100vh;
        }
      }

      @media (min-width: 800px) and (max-width: 850px) {
              .navbar:not(.top-nav-collapse) {
                  background: #1C2331!important;
              }
          }
.view,body,html{height:100%}@media (max-width:740px){.full-page-intro{height:1000px}}.carousel{height:50%}.carousel .carousel-inner,.carousel .carousel-inner .active,.carousel .carousel-inner .carousel-item{height:100%}@media (max-width:776px){.carousel{height:100%}}.navbar{background-color:rgba(0,0,0,.3)}.page-footer,.top-nav-collapse{background-color:#1C2331}@media only screen and (max-width:768px){.navbar{background-color:#1C2331}}
input, select {

  box-sizing: border-box;
  font-size: 1.25em;
  font-family: 'Nanum Gothic';
  width: 90%;
  padding: 10px;
}
label {
  display: block;
  font-family: 'Nanum Gothic';
  padding-bottom: 10px;
  font-size: 1.25em;
}


.elem-group {
  width: 100%;
  
}
form.res {
    padding: 10px;
    width:100%;
}
#btnres{
  padding: 15px;
    color: white;
    background: #e4413e;
    border: none;
    text-align: center;
    margin: 0 auto;
    margin-left: 34%;
    width: 28%;
    margin-top: 11px;
}
.img-fluid .annonce {
    max-width: 450px;
    height: auto;
    min-width: 450px;
}




input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #6f3cab;;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
    text-align: center;
    width: 10%;
    margin-left: 490px;

}

input[type=submit]:hover {
  padding: 13px 21px;
  width: 12%;
  background-color: #6f3cab;;
}

.container .contact {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
        </style>
    </head>
    <body>
    @php
$annonces = DB::table('annonces')->orderBy('id')->take(4)->get();
$parametre=DB::table('parametres')->first();
@endphp

   <!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar" style="background-color: rgb(111 60 171);
    position: fixed ;
">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand" href="" >
      <strong>Parapharmacie</strong>
    </a>

    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Left -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Acceuil
            <span class="sr-only">(current)</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#annonce" >Annonce</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#propos" >A propos de nos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#service" >Nos service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#plus" >Plus</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact" >Contact nous</a>
        </li>
      </ul>

      <!-- Right -->
      <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item">
          <a href="http://www.facebook.com/{{$parametre->facebook}}" class="nav-link" target="_blank">
            <i class="fa fa-facebook-f"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="http://www.twitter.com/{{$parametre->twitter}}" class="nav-link" target="_blank">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <li class="nav-item">
          <a href="{{asset('/admin')}}" class="nav-link border border-light rounded"
            >
            <i class="fa fa-sign-in"></i>Login
          </a>
        </li>
                    @else
                    <li class="nav-item">
          <a href="{{asset('/login')}}" class="nav-link border border-light rounded"
            >
            <i class="fa fa-sign-in"></i>Login
          </a>
        </li>
                                        @endauth
                </div>
            @endif
      
      </ul>

    </div>

  </div>
</nav>
<!-- Navbar -->

<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel" style="height: 80% !important;">

  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">
      <div class="view" style="background-image: url('{{asset('images/banner.jpg')}}'); background-repeat: no-repeat; background-size: cover;">

        <!-- Mask & flexbox options-->
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

          <!-- Content -->
          <div class="text-center white-text mx-5 wow fadeIn">
            <br><br> <br><br>
            <h1 class="mb-4">
             
            </h1>

  
          </div>
          <!-- Content -->

        </div>
        <!-- Mask & flexbox options-->

      </div>
    </div>
    <!--/First slide-->
  </div>
  <!--/.Slides-->

  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->

</div>
<!--/.Carousel Wrapper-->

<!--Main layout-->
<main>
  <div class="container">

    <!--Section: Main info-->
    <section class="mt-5 wow fadeIn annonce">
    <h3 class="h3 text-center mb-5" id="propos">Annonce</h3>
    @foreach($annonces as $annonce)
      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-6 mb-4">
          <img src="{{asset('images/annonces')}}/{{$annonce->image}}" class="img-fluid z-depth-1-half"alt="">
        </div>
        <div class="col-md-6 mb-4" >
          <h3 class="h3 mb-3" id="annonce">{{$annonce->titre}}</h3>
          <p>{{$annonce->description}}</p>
          <hr>
          <span style="color: #9263cb;font-size: 14px;">{{$annonce->date}}</span>

  </div>
      </div>
      @endforeach
      <!--Grid row-->

    </section>
    <!--Section: Main info-->

    <hr class="my-5">

    <!--Section: Main features & Quick Start-->
    <section>

      <h3 class="h3 text-center mb-5" id="propos">A propos de nos</h3>

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-6 col-md-12 px-4">

          <!--First row-->
          <div class="row">
            <div class="col-1 mr-3">
         
              <i class="fa fa-medkit fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
     
              <h5 class="feature-title">Parapharmacie</h5>
              <p class="grey-text">{{$parametre->propos}}</p>
            </div>
          </div>
          <!--/First row-->

          <div style="height:30px"></div>

        

        </div>
        <!--/Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-12">

         {{-- <p class="h5 text-center mb-4">titre2</p>--}}
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Ixc9tqW4O9Q" allowfullscreen></iframe>
          </div>
        </div>
        <!--/Grid column-->

      </div>
      <!--/Grid row-->

    </section>
    <!--Section: Main features & Quick Start-->

    <hr class="my-5">
    <!--Section: Not enough-->
    <section>

      <h2 class="my-5 h3 text-center" id="service">Nos services</h2>

      <!--First row-->
      <div class="row features-small mb-5 mt-3 wow fadeIn">

        <!--First column-->
        <div class="col-md-4">
          <!--First row-->
          <div class="row">
            <div class="col-2">
              <i class="fa fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
           
              <p class="grey-text">Appelez-la quand vous voulez 6 jours/7
              </p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/First row-->

          <!--Second row-->
          <div class="row">
            <div class="col-2">
              <i class="fa fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
 
              <p class="grey-text">Elle passe vos commandes, vous rassure dans vos achats et
               vous donne de précieux conseils sur la taille, les dimensions...
              </p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/Second row-->

          <!--Third row-->
          <div class="row">
            <div class="col-2">
              <i class="fa fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
    
              <p class="grey-text">Elle vous renseigne sur la disponibilité des articles et sur la date de livraison.</p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/Third row-->

          <!--Fourth row-->
          <div class="row">
            <div class="col-2">
              <i class="fa fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
            
              <p class="grey-text">Pour l'adresse de livraison, elle vous indique toutes les possibilités :
               à l'Espace, au Point Relais, à domicile ou à une autre adresse</p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/Fourth row-->
        </div>
        <!--/First column-->

        <!--Second column-->
        <div class="col-md-4 flex-center">
          <img src="{{asset('images/service.jpg')}}" alt=""
            class="z-depth-0 img-fluid">
        </div>
        <!--/Second column-->

        <!--Third column-->
        <div class="col-md-4 mt-2">
          <!--First row-->
          <div class="row">
            <div class="col-2">
              <i class="fa fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
     
              <p class="grey-text">Elle vous propose des modes de paiement adaptés à votre budget.
              </p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/First row-->

          <!--Second row-->
          <div class="row">
            <div class="col-2">
              <i class="fa fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
              
              <p class="grey-text">Elle vous aide à échanger un article sans frais supplémentaires.</p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/Second row-->

          <!--Third row-->
          <div class="row">
            <div class="col-2">
              <i class="fa fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
          
              <p class="grey-text">Elle vous explique comment effectuer un retour et vous informe du montant du remboursement.
              </p>
              <div style="height:15px"></div>
            </div>
          </div>
 

      </div>
      <!--/First row-->

    </section>
    <!--Section: Not enough-->

    <hr class="mb-5">

    <!--Section: More-->
    <section>

      <h2 class="my-5 h3 text-center" id="plus">Plus</h2>

      <!--First row-->
      <div class="row features-small mt-5 wow fadeIn" style="justify-content: space-between;">

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="fa fa-firefox fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2 pl-3">
              <h5 class="feature-title font-bold mb-1">Commander par Telephone</h5>
              <p class="grey-text mt-2">Vous pouvez commander par telephone au: 05654564639 - 0678463721
              </p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
        <!--/Grid column-->

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="fa fa-check fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2">
            <h5 class="feature-title font-bold mb-1">Bons plans </h5>
              <p class="grey-text mt-2">privileges toute l'année
              </p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
        <!--/Grid column-->

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="fa fa-comments fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2">
           <h5 class="feature-title font-bold mb-1">Avis client</h5>
              <p class="grey-text mt-2">Nous bénéficions de la confiance de nos clients
              </p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
  

      </div>
      <!--/First row-->

      <!--Second row-->
      <div class="row features-small mt-4 wow fadeIn" style="justify-content: space-between;">

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="fa fa-cubes fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2">
            <h5 class="feature-title font-bold mb-1">Paiement</h5>
              <p class="grey-text mt-2">different mode de paiement</p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
        <!--/Grid column-->

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="fa fa-question fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2">
            <h5 class="feature-title font-bold mb-1">Consultation</h5>
              <p class="grey-text mt-2">Vous pouvez nous contacter à tout moment pour une consultation gratuite
              </p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
        <!--/Grid column-->

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="fa fa-th fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2">
             <h5 class="feature-title font-bold mb-1">Le meilleur de la parapharmacie</h5>
              <p class="grey-text mt-2">Commandez facilement et à tout moment vos produits de parapharmacie préférés aux prix les plus bas </p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
        <!--/Grid column-->


      </div>
      <!--/Second row-->

    </section>
    <!--Section: More-->

  </div>
  <hr class="my-5">
    <!--Section: Not enough-->
    <section>


<div class="container contact">
<div class="col-md-12" id="contact">
            @include('backend.partials.notification')
         </div>
<h3>Contacter nous</h3>
  <form action="{{route('message.store')}}" method="POST">
  @csrf
  <br>
    <label for="sujet">Sujet</label>
    <input type="text" id="fname" name="sujet" placeholder="Entrer le sujet">
    <span style='color:red;'>{{ $errors->first('sujet') }}</span>
    <label for="nom">Nom et Prenom</label>
    <input type="text" id="lname" name="nom" placeholder="Entrer nom et prenom">
    <span style='color:red;'>{{ $errors->first('nom') }}</span>
    <label for="nom">Email</label>
    <input type="text" id="lname" name="email" placeholder="Entrer Email">
    <span style='color:red;'>{{ $errors->first('email') }}</span>
    <label for="lname">Telephone</label>
    <input type="text" id="lname" name="telephone" placeholder="Entrer telephone">
    <span style='color:red;'>{{ $errors->first('telephone') }}</span>
    <label for="message">Message</label>
    <textarea id="subject" name="message" placeholder="Ecrire un message" style="height:200px"></textarea>
    <span style='color:red;'>{{ $errors->first('message') }}</span><br>
    <input type="submit" value="Envoyer">
  </form>
</div>
<script>

</script>

</section>
</main>
<!--Main layout-->

<!--Footer-->
<footer class="page-footer text-center font-small mt-4 wow fadeIn">



  <hr class="my-4">

  <!-- Social icons -->
  <div class="pb-4">
    <a href="http://www.facebook.com/{{$parametre->facebook}}" target="_blank">
      <i class="fa fa-facebook-f mr-3"></i>
    </a>

    <a href="http://www.twitter.com/{{$parametre->twitter}}" target="_blank">
      <i class="fa fa-twitter mr-3"></i>
    </a>

    <a href="http://wwww.youtube.com/{{$parametre->youtube}}" target="_blank">
      <i class="fa fa-youtube mr-3"></i>
    </a>
  </div>
  <!-- Social icons -->

  <!--Copyright-->
  <div class="footer-copyright py-3">
    <a href="#" target="_blank"> Copyright Parapharmacie </a>
  </div>
  <!--/.Copyright-->

</footer>
<!--/.Footer-->

        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script type="text/javascript">
            new WOW().init();
            </script>
    </body>
</html>
