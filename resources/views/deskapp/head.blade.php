<div class="header">
    <div class="header-left">
        
    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <!-- a revoir l'icone-->
                         <img src={{asset('vendors/images/logo-icon.png')}} alt="">
                    </span>
                    <span class="user-name">IAI-TOGO</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="/deskapp/profil.blade.php"><i class="dw dw-user1"></i> Profil</a>
                    <a class="dropdown-item" href="{{route('auth.logout')}}">
                        <i class="dw dw-logout"></i>
                        Déconnexion
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>