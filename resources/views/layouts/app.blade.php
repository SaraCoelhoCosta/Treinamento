<!doctype html>
<html class="no-js" lang="pt">
@section('head')
    @include('layouts.head')
    @yield('links_adicionais')
@show

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.menu_navbar')
        @include('layouts.menu_sidebar')
          <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        @yield('conteudo')
        </div>
        @include('layouts.footer')
    </div>
    

    @section('scripts')
       @include('layouts.scripts')
       @yield('scripts_adicionais')
    @show
</body>

</html>
