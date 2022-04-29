<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{route('home')}}">
            <img src="{{asset('vendors/images/logo-icon.png')}}"  alt="" class="dark-logo"><span></span>
            <img src="{{asset('vendors/images/logo-icon.png')}}" alt="" class="light-logo"><span>IAI-TOGO</span>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="{{route('home')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Accueil</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('accueil.rech')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-reload"></span><span class="mtext">statistiques</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/annees" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1" ></span><span class="mtext">Année</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('comm.rech')}}" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-edit-1"></span><span class="mtext">Commandes</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('approv.rech')}}" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-edit-file"></span><span class="mtext">Approvisionnements</span>
                    </a>
                </li>
                <li> 
                    <a href="/fournisseurs" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-user-12" ></span><span class="mtext">Fournisseurs</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('demande.rech')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-diagonal-arrow-3"></span><span class="mtext">Besoins</span>
                    </a>
                </li>
            
                <li class="dropdown">
                    <a href="{{route('stock.rech')}}" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-pagoda"></span><span class="mtext">Stocks</span>
                    </a>
                </li>
                
                <li class="dropdown">
                    <a href="/articles" class="dropdown-toggle no-arrow">
                    <span class="micon dw dw-browser2"></span><span class="mtext">Articles</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="/agents" class="dropdown-toggle no-arrow">
                    <span class="micon icon-copy dw dw-add-user"></span><span class="mtext">Agents</span>
                    </a>
                </li>
                
                <li class="dropdown">
                    <a href="{{route('perte.rech')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-delete-3"></span><span class="mtext">Pertes</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/categories" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-library"></span><span class="mtext">Catégories</span>
                    </a>
                </li>
                
                <li class="dropdown">
                    <a href="{{route('rechercheform')}}" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-hourglass1"></span><span class="mtext">Bilan</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="{{route('pdfs.pdf')}}" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-open-book-1"></span><span class="mtext">PDF</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="/users" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-add-user"></span><span class="mtext">Utilisateurs</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>