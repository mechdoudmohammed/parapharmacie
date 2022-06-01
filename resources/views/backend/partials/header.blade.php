<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
        <a class="navbar-brand" href="{{asset('/admin')}}">Parapharmacie</a>
        
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>
                @php
                            $messages = DB::table('messages')->where('lire_le','1')->get();
                            $commandes = DB::table('commandes')->orderBy('created_at','DESC')->limit(10)->get();
                            $count = DB::table('messages')->where('lire_le','1')->count();
                            $count_cmd=DB::table('commandes')->orderBy('created_at','DESC')->limit(10)->count();
                            @endphp 
                <div class="dropdown for-notification">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">{{$count_cmd}}</span>
                    </button>
                    <div class="dropdown-menu notif" aria-labelledby="notification">
    
                            
                            @foreach($commandes as $commande)
                            <form method="post" action="" id="myform1" enctype="multipart/form-data">
                            @csrf 

                             <a href="{{route('commande.show',$commande->id)}}" class="name float-left" style="font-size:17px;" > <i class="fa fa-check"></i>Commande N:{{$commande->id}}</a><br>
                                <p>Total:{{$commande->totale}} Dhs</p>
                                        </form>
                                @endforeach
                                    </a>
                 
                    </div>
                </div>
                          
           
                    <div class="dropdown for-message">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-envelope"></i>
                        <span class="count bg-primary">{{$count}}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="message">
                        <a class="dropdown-item media" href="#">
                                   @php
                            $messages = DB::table('messages')->where('lire_le','1')->get();
                           
                            @endphp 
                            <div class="message media-body">
                    @foreach($messages as $message)
                            <form method="post" action="{{route('message.update',$message->id)}}" id="myform" enctype="multipart/form-data">
                            @csrf 
        @method('PATCH')
                             <a href="#" class="name float-left" style="font-size:17px;" onclick="document.getElementById('myform').submit()">{{$message->nom}}</a><br>
                                <p>{{$message->sujet}}</p>
                            </form>
                    @endforeach
                    </div>
                        </a>
                 
               
                </div>
                </div>
            </div>

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{asset('/images/admin.jpg')}}" alt="User">
                </a>

                <div class="user-menu dropdown-menu">

                  @guest
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      <li class="nav-item">
                          @if (Route::has('register'))
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          @endif
                      </li>
                  @else
                      <li class="nav-item dropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Déconnexion') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                      </li>
                  @endguest

                </div>

            </div>

        </div>
    </div>
</header>
