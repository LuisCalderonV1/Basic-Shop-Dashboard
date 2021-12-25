<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.index')}}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
                </li>
                <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @auth
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('public')}}">FrontEnd</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container my-5">
        @yield('content')
    </main>
        <script>
            function previewFile(input, id) {
                var file = jQuery(input).get(0).files[0];
    
                if (file) {
                    var reader = new FileReader();
    
                    reader.onload = function () {
                        $("#img-" + id).attr("src", reader.result);
                    };
    
                    reader.readAsDataURL(file);
                }
            }
        </script>
         <script>
           $(document).ready(function (){
                $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) 
                var url = button.data('url') 
                var item = button.data('item') 
                var modal = $(this)
                modal.find('#message-text').text(item)
                modal.find('#form').attr('action', url);
                })
           });
        </script>
</body>
</html>