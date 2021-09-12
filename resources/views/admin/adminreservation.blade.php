<!DOCTYPE html>
<html lang="en">
  <head>
    
    {{-- CSS Collection --}}
    @include('admin.admincss')

    <style>
      .form-styling{
        padding: 2em;
      }
    </style>

  </head>
  <body>

    <div class="container-scroller">
      {{-- Sidebar Structure --}}
      @include('admin.sidebar')
    
      
      {{-- Navbar Structure --}}
      @include('admin.navbar')

      {{-- Content  --}}
      
      <div class="container-fluid page-body-wrapper">
      
        <div class="container-fluid">
          <div class="row mt-3 justify-content-md-center m-4">
            <div class="col-md-4 mb-4">
              <div class="border-bottom text-center">
                <h1>List of Reservation</h1>
              </div>

              @if (Session::has('delete_reservation'))
                  <div class="alert alert-success my-3" role="alert">
                    {{Session::get('delete_reservation')}}
                  </div>

                @endif
            </div>
            
            <div class="row">
            <table class="table table-dark table-striped table-hover mt-3 rounded shadow mw-25">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Guest Number</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->guest}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{$item->time}}</td>
                    <td>{{$item->message}}</td>
                    <td>
                      <a href="{{ url('/deletereservation', $item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
  
                @endforeach
              </tbody>
            </table>
          </div>
          </div>
        </div>

      </div>
      
      {{-- End Content --}}
    </div>
    
    {{-- JS Collection --}}
    @include('admin.adminjs')

    <script>

      var loadFile = function(event) {
			  var image = document.getElementById('preview');
				image.src = URL.createObjectURL(event.target.files[0]);
			};

    </script>
  </body>
</html>