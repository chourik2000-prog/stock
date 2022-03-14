<div class="left-side-bar">
    <div class="brand-logo">
        <a href="/accueil">
            <img src="{{asset('vendors/images/logo-icon.png')}}"  alt="" class="dark-logo"><span></span>
            <img src="{{asset('vendors/images/logo-icon.png')}}" alt="" class="light-logo"><span>IAIgestion</span>
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="/" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Accueil</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/annees" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Année</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="/approvisionnements" class="dropdown-toggle no-arrow">
                        <span class="micon icon-copy dw dw-edit-file"></span><span class="mtext">Approvisionnements</span>
                    </a>
                </li>
                <li> 
                    <a href="/fournisseurs" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-user-12"></span><span class="mtext">Fournisseurs</span>
                    </a>
                </li>
                <li>
                    <a href="/demandes" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-diagonal-arrow-3"></span><span class="mtext">Demandes</span>
                    </a>
                </li>
            
                <li class="dropdown">
                    <a href="/stocks" class="dropdown-toggle no-arrow">
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
                    <a href="/pertes" class="dropdown-toggle no-arrow">
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
            </ul>
        </div>
    </div>
</div>