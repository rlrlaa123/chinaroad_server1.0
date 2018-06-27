<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('style')
    <link href="{{ asset('materialize/css/materialize.css') }}" rel="stylesheet">
    <script src="/js/jquery-3.3.1.min.js"></script>
</head>
<body style="background-color:white;">
    <div id="app" style="background-color: white;">
        <nav>
            <div class="nav-wrapper red darken-4">
                <a href="#!" class="brand-logo">차이나로드</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                </ul>
            </div>
        </nav>

        <ul class="sidenav" id="mobile-demo">
            <li><a href="#">Sass</a></li>
        </ul>
        <!-- Page Layout here -->
        <div class="row">

            <div class="col s3">
                <!-- Grey navigation panel -->
                <ul>
                    <li>회화</li>
                    <li>회화목록</li>
                    <li>회화작성</li>
                    <li>회화</li>
                </ul>
            </div>

            <div class="col s9">
                <!-- Teal page content  -->
                <h1>
                    @yield('content')
                </h1>
            </div>

        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('materialize/js/materialize.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>
    @yield('script')
</body>
</html>