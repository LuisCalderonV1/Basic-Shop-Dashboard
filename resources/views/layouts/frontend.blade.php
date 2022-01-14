<?php 
use Illuminate\Support\Facades\Auth; 
$categories = getCategories();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Shop') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body> 
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{route('frontend.site.index')}}"><b>{{ config('app.name', 'Shop') }}</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--search-form-->
            <div class="collapse navbar-collapse" id="navbarNav">
              <form method="post" action="{{route('frontend.products.search')}}" class="form-inline my-2 my-lg-0 d-none d-md-flex w-75 justify-content-end">
                @csrf
                <input name="name" class="form-control mr-sm-2 w-75 " type="search" placeholder="Search" aria-label="Search" required>
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
              </form>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('frontend.cart.index')}}">
                  <i class="fas fa-shopping-cart"></i> 
                  Cart <span class="bg-light px-1 rounded-circle text-dark" id="inCart">{{getItemsInCart()}}</span>
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="{{route('frontend.categories.index')}}"><i class="fas fa-stream"></i> Categories</a>
              </li>    
                 <!-- Authentication Links -->
                       @auth
                          <li class="nav-item dropdown active">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user"></i> 
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> 
                                    @if(Auth::user()->rol->id == 1)                                 
                                    <a class="dropdown-item" href="{{route('home')}}"><i class="far fa-window-restore"></i> Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-in-alt"></i></i> {{ __('Logout') }}
                                    </a> 
                                    <hr class="my-1">
                                    <a class="dropdown-item"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>                                   
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}"><i class="fas fa-user"></i> Login</a>
                        </li>
                        @endguest                         
            </div>
        </nav>
        <ul class="nav bg-dark w-100">          
          <li class="nav-item w-100">
            <form class="form-inline my-2 my-lg-0 d-flex d-md-none px-2 justify-content-center">
              <input class="form-control d-inline-block" style="width:80%;" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
          </li>
        </ul>
        <ul class="nav border-bottom">               
          @for ($n=0;$n<=3 && $n<$categories->count();$n++)
          <li class="nav-item">
            <a class="nav-link active" href="{{route('frontend.categories.show',$categories[$n]->id)}}"><b>{{$categories[$n]->name}}</b></a>
          </li>
          @endfor
        </ul>       
    </header>
    <main class="container py-5">
        @yield('content')
    </main>
    <footer class="text-center text-lg-start bg-dark text-light">
      <!-- Section: Social media -->
      <section
        class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
      >
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
          <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-github"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Products
              </h6>
              @for ($n=0;$n<=3 && $n<$categories->count();$n++)
              <p>
                <a href="{{route('frontend.categories.show',$categories[$n]->id)}}" class="text-reset">{{$categories[$n]->name}}</a>
              </p>
              @endfor
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Useful links
              </h6>
              <p>
                <a href="#!" class="text-reset">Pricing</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Settings</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Orders</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Help</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Contact
              </h6>
              <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
              <p>
                <i class="fas fa-envelope me-3"></i>
                info@example.com
              </p>
              <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
              <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">    
        <a class="text-reset fw-bold" href="">{{ config('app.name', 'Shop') }}</a> | 2022
      </div>
      <!-- Copyright -->
    </footer>
    <script>
        function previewFile(input, id) {
            var file = $(input).get(0).files[0];

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
</body>
</html>