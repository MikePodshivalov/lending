<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Lending</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{--                <div class="image">--}}
                {{--                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
                {{--                </div>--}}
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->getName() }}</a>
            </div>
            @if (Route::has('login'))
                @auth
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="button" class="btn btn-block btn-secondary btn-sm"
                                href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            logout
                        </button>
                    </form>
                @endauth
            @endif
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('project.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Проекты</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
