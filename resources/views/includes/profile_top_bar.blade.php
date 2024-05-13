<div id="topbar" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
            <div class="align-items-center d-none d-md-flex">
                <i class=""></i> 
            </div>
            <div class="d-flex align-items-auto mt-2">
                <p><i class="fa fa-user"></i>  {{ $email }}</p>
            </div>
    </div>
</div>
<div class="shadow-sm bg-body-tertiary">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="container d-flex align-items-center">
            <img class="mt-2 mb-2 mx-1" src="{{ asset('img/msu_logo.png') }}" alt="Logo" width="44" height="44">
            <h4>Mindanao State University</h4>
        </div>
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-white" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <img class="mt-2 mb-2 mx-1" src="{{ asset('img/msu_logo.png') }}" alt="Logo" width="44" height="44">
                        <h2 class="text-black" id="offcanvasDarkNavbarLabel">Faculty Directory</h2>
                        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/"><h3>Home</h3></a>
                            </li>
                            @if($dean)
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/dashboard/{{$collegeid}}">
                                        <h3>Dashboard</h3>
                                    </a>
                                </li>
                            @endif                     
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><h3>About</h3></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><h3>Admission</h3></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><h3>Academics</h3></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><h3>News</h3></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><h3>Contact</h3></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>