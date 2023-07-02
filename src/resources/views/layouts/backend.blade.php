@include('layouts.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="#" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    @include('layouts/nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts/aside')

    <!-- Content Wrapper. Contains page content -->
    <main id="main-container">
        @yield('content')
    </main>

@include('layouts.footer')
