<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('home')}}"><i class="menu-icon fa fa-laptop"></i>Tableau de bord </a>
                </li>
                <li class="menu-title">Option</li><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Annonce</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('annonce.create')}}">Ajouter une Annonce</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('annonce.index')}}">Listes des Annonces</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Employé</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('employe.create')}}">Ajouter un Employé</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('employe.index')}}">Listes des Employés</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Fournisseur</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('fournisseur.create')}}">Ajouter un Fournisseur</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('fournisseur.index')}}">Listes des Fournisseurs</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Commandes</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('commande.index')}}">Listes des commandes</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Produits</a>
                    <ul class="sub-menu children dropdown-menu">
                                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('produit.create')}}">Ajouter un produit</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('produit.index')}}">Listes des produit</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('produit.accepter')}}">Listes des produit à accepter</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('produit.detail')}}">Details produit</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Categories</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('categorie.create')}}">Ajouter une categorie</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('categorie.index')}}">Listes des categories</a></li>
                        
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Charge</a>
                    <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-th"></i><a href="{{route('charge.create')}}">Ajouter des charges</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('charge.index')}}">Listes des charges</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Client</a>
                    <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-th"></i><a href="{{route('client.create')}}">Ajouter un client</a></li>
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('client.index')}}">Listes des clients</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Message</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-th"></i><a href="{{route('message.index')}}">Listes des messages</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{route('parametres.modifier')}}" class=""  aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Paramètres</a>
                </li>
                           </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
