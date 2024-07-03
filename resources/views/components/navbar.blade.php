<div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">AulabPost</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">Tutti gli articoli</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                <li class=" nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Benvenuto: <span class=" fw-bold">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class=" dropdown-menu">
                        @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('revisor.dashboard') }}">Dashboard Revisore</a>
                        </li>
                        @endif
                        @if (Auth::user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                            </li>
                        @endif
                        @if (Auth::user()->is_writer)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('articles.create') }}">Inserisci Articolo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('writer.dashboard') }}">Dashboard Redattore</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('careers') }}">Lavora con noi</a>
                        </li>
                        <li class=" nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link">Esci</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
                
                @guest    
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Accedi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Registrati</a>
                </li>
                @endguest   
            </ul>
            <form class="d-flex" method="GET" action="{{ route('articles.search') }}">
                <input class="form-control me-2" type="search" placeholder="Cosa stai cercando" aria-label="Search" name="query">
                <button class="btn btn-outline-info" type="submit">Cerca</button>
            </form>
        </div>
    </div>
</nav>
</div>