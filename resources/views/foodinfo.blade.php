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
      .body > div > p:first-of-type{
        font-weight: 900;
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
                            <li class="scroll-to-section"><a href="{{ url('/home/#about') }}">About</a></li>
                           	
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

            @if (Session::has('insert_cart'))
              <div class="alert alert-success my-3" role="alert">
                {{Session::get('insert_cart')}}
              </div>
            @endif

            <div class="section-heading">
                <h6>Food Infomartion</h6>
                <h2>{{$data->title}}</h2>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="card rounded shadow w-25">
            <img src="/foodimage/{{$data->image}}" class="card-img-top" alt="Food image">
            <div class="card-body body">
              <div class="card-text">
                <p>Description</p><br>
                <p>{{$data->description}}</p>
              </div>
              <p class="card-text my-4">RM{{$data->price}}</p>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addCartModal">
                Add to Cart
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addToCart" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="addToCart">Add {{$data->title}} to Cart</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>

          <form action="{{ route('cart.addcart', $data->id) }}" method="POST">
              @csrf
              <div class="modal-body">
                  <label for="quantity">Select quantity:</label>
                  <input type="number" name="quantity" id="quantity" class="form-control" min="1" required />
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
          </form>

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