<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
        data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>{{config('app.name')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @guest()
                    <li class="nav-item">
                    <a class="{{Route::is('login')?'active':'' }} nav-link" href="{{Route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="{{Route::is('register')?'active':'' }} nav-link" href="{{Route('register')}}">Register</a>
                    </li>
                    @endguest
                    @auth()
                    @if (auth()->user()->is_admin)
                    <li class="nav-item">
                        <a class="{{Route::is('admin.dashboard')?'active':'' }} nav-link" href="{{Route('admin.dashboard')}}">Admin Dashboard</a>
                    </li>
                    
                    @endif
                    <li class="nav-item">
                        <a class="{{Route::is('profile')?'active':'' }} nav-link" href="{{Route('profile')}}">{{Auth::user()->name}}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit">Logout</button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>