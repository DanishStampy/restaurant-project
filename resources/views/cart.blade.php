<!DOCTYPE html>
<html lang="en">

  <head>

    <base href="/public">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <style>
      .section-heading h6::before{
        width: 0;
      }
      .section-heading h6{
        padding: 0;
      }
      #food-img{
       width: 421.843px;
       height: 421.843px;
      }
      .card h5{
        font-size: 2.5rem;
        letter-spacing: 1.3px;
        font-family: 'Poppins', sans-serif;
        font-weight: 900;
      }
      .card p{
        letter-spacing: 1px;
        font-size: 1rem;
        font-weight: 500;
        color: #fb5849;
        text-transform: uppercase;
      }
    </style>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                          <li class="scroll-to-section"><a href="{{ url('/home') }}" class="active">Home</a></li>
                          <li class="scroll-to-section"><a href="{{ url('/home') }}">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                        <li class="scroll-to-section"><a href="{{ url('/home') }}">Menu</a></li>
                        <li class="scroll-to-section"><a href="{{ url('/home') }}">Chefs</a></li> 
                        
                        <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                        <li class="scroll-to-section"><a href="{{ url('/home') }}">Contact Us</a></li>
                            <li>

                              @if (Route::has('login'))
                                  <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                      @auth
                                        <li class="submenu">
                                            <a href="javascript:;">{{ Auth::user()->name }}</a>
                                            <ul>
                                                <li><a href="{{ route('profile.show') }}">Profile</a></li>
                                                <li>
                                                    <form method="POST" id="myform" action="{{ route('logout') }}">
                                                    @csrf
                                                        
                                                        <a onclick="document.getElementById('myform').submit(); return false;" href="{{ route('logout') }}" class="text-sm text-gray-700 underline">Log Out</a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                      @else
                                          <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></li>

                                          @if (Route::has('register'))
                                              <li><a href="{{ route('register') }}" class="text-sm text-gray-700 underline">Register</a></li>
                                          @endif
                                      @endauth
                                  </div>
                              @endif

                            </li>
                        </ul>        
                        
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    {{-- List of cart --}}
    
    <div id="top" class="mt-4">
      <div class="container-fluid vh-100">
        <div class="row">
          <div class="col-lg-4 offset-lg-4 text-center">

            @if (Session::has('delete_cart'))
              <div class="alert alert-success my-3" role="alert">
                {{Session::get('delete_cart')}}
              </div>
            @endif

            <div class="section-heading">
                <h6>Cart</h6>
                <h2>List of added item</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">

          @foreach ($data as $item)

          <div class="card border-light m-3 w-75 shadow">
            <div class="row no-gutters">
              <div class="col-md-4 align-middle">
                <img class="img-thumbnail" id="food-img" src="/foodimage/{{$item->image}}" alt="Food image">
              </div>
              <div class="col-md-8">
                <div class="card-body align-middle" id="card">
                  <h5 class="card-title">{{$item->title}}</h5>
                  <p class="card-text mb-4">RM{{$item->price}}</p>
                  <p class="card-text mb-3">
                    Description:<br>
                    {{$item->description}}
                  </p>
                  <p class="card-text"><small class="text-muted">Quantity: {{$item->quantity}}</small></p>
                  <a role="button" class="btn btn-danger mt-5" href="{{ route('cart.deletefood', $item->id) }}">Delete</a>
                </div>
              </div>
            </div>
          </div>

          @endforeach

        </div>
      </div>
    </div>

    {{-- List of cart end --}}

  <!-- jQuery -->
  <script src="assets/js/jquery-2.1.0.min.js"></script>

  <!-- Bootstrap -->
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- Plugins -->
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/accordions.js"></script>
  <script src="assets/js/datepicker.js"></script>
  <script src="assets/js/scrollreveal.min.js"></script>
  <script src="assets/js/waypoints.min.js"></script>
  <script src="assets/js/jquery.counterup.min.js"></script>
  <script src="assets/js/imgfix.min.js"></script> 
  <script src="assets/js/slick.js"></script> 
  <script src="assets/js/lightbox.js"></script> 
  <script src="assets/js/isotope.js"></script> 
  
  <!-- Global Init -->
  <script src="assets/js/custom.js"></script>
  <script>

      $(function() {
          var selectedClass = "";
          $("p").click(function(){
          selectedClass = $(this).attr("data-rel");
          $("#portfolio").fadeTo(50, 0.1);
              $("#portfolio div").not("."+selectedClass).fadeOut();
          setTimeout(function() {
            $("."+selectedClass).fadeIn();
            $("#portfolio").fadeTo(50, 1);
          }, 500);
              
          });
      });

  </script>
  </body>
</html>