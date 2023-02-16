<header class="p-3 mb-3 border-bottom bg-light">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="{{ route('dashboard') }}" class="brand brand-sm d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                {{ __('app.brand') }}
            </a>

            <ul class="nav col-12 col-lg-auto mx-lg-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a href="{{ route('dashboard') }}" class="nav-link px-2 {{ Route::is(['dashboard']) ? "link-dark active" : "link-secondary" }}">
                        <i class="bi bi-speedometer2 me-1"></i> 
                        {{ __('app.dashboard') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('todo.index') }}" class="nav-link px-2 {{ Route::is(['todo.index','todo.edit']) ? "link-dark active" : "link-secondary" }}">
                        <i class="bi bi-list-task me-1"></i>
                        {{ __('app.my_todo') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('todo.create') }}" class="nav-link px-2 {{ Route::is(['todo.create']) ? "link-dark active" : "link-secondary" }}">
                        <i class="bi bi-plus me-1"></i>
                        {{ __('app.new_todo') }}
                    </a>
                </li>
            </ul>


            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://avatars.githubusercontent.com/u/98683?v=1" alt="user" width="32" height="32" class="rounded-circle">
                    {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu text-small" style="">
                    <li>
                        <a class="dropdown-item" href="{{ route('todo.create') }}">
                            {{ __('app.new_todo') }}
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>