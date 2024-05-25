<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.create') }}">
                <i class="mdi mdi-book-variant menu-icon"></i>
                <span class="menu-title">Catégorie</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-book menu-icon"></i>
                <span class="menu-title">Sous-Catégorie</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-bookmark menu-icon"></i>
                <span class="menu-title">Marques</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-tag menu-icon"></i>
                <span class="menu-title">Produits</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-truck menu-icon"></i>
                <span class="menu-title">Shipping</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon mdi mdi-shopping"></i>
                <span class="menu-title">Commandes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-margin menu-icon"></i>
                <span class="menu-title">Discount</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-spotlight"></i>
                <span class="menu-title">Paramètres</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#"> Mon Profile </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">
                            S'inscrire </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#"> Mot de passe oublié</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.logout') }}">Se Déconnecter </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logout') }}">
                <i class="mdi mdi-power menu-icon"></i>
                <span class="menu-title">Déconnexion</span>
            </a>
        </li>
    </ul>
</nav>
