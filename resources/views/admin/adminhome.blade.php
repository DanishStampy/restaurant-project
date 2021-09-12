<!DOCTYPE html>
<html lang="en">
  <head>
    
    {{-- CSS Collection --}}
    @include('admin.admincss')

    <style>
      .jumbo h1,
      .jumbo p{
        color: grey;
      }
    </style>

  </head>
  <body>

    <div class="container-scroller">
      {{-- Sidebar Structure --}}
      @include('admin.sidebar')


      {{-- Navbar Structure --}}
      @include('admin.navbar')


      {{-- Content --}}
      <div class="container-fluid page-body-wrapper">
        <div class="container-fluid">
          <div class="jumbotron jumbo mt-4">
            <h1 class="display-2">Hello, {{ Auth::user()->name }}!</h1>
            <p class="lead">This is the admin dashboard for restaurant management. As an admin, you can manage the registered users, food menus, chefs and etc.</p>
            <hr class="my-4">
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="#info" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="info">Learn more</a>
            </p>
            <div class="collapse" id="info">
              <div class="card card-body">
                Please select navigation options on the left side menu. Each of them serve difference purpose.
              </div>
            </div>
          </div>
        </div>
      </div>

      

      {{-- End Content --}}
    
    </div>

    
    {{-- JS Collection --}}
    @include('admin.adminjs')
  </body>
</html>