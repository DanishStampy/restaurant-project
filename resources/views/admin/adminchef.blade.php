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
          <div class="row mt-3 justify-content-md-center">
            <div class="col-md-6">
              <div class="border-bottom mt-3">
                <h1>Chef Form</h1>
              </div>

              @if (Session::has('insert_chef'))
              <div class="alert alert-success my-3" role="alert">
                {{Session::get('insert_chef')}}
              </div>

              @elseif (Session::has('delete_chef'))
              <div class="alert alert-success my-3" role="alert">
                {{Session::get('delete_chef')}}
              </div>

              @elseif (Session::has('update_chef'))
              <div class="alert alert-success my-3" role="alert">
                {{Session::get('update_chef')}}
              </div>

              @endif
              
              <form action="{{ url('/uploadChef') }}" method="POST" enctype="multipart/form-data" class="mt-3 form-styling">

                @csrf

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="inputName">Chef Name:</label>
                    <input type="text" name="name" class="form-control" id="inputName" >
                  </div>
                  <div class="col-md-6">
                    <label for="inputSpec">Speciality:</label>
                    <input type="text" name="speciality" class="form-control" id="inputSpec">
                  </div>
                </div>

                <div class="mx-auto col-sm-6">
                  <img src="{{ asset('/foodimage/default.jpg') }}" id="preview" class="img-thumbnail">
                </div>
                <div class="input-group">
                  <div class="custom-file mt-3">
                    <input type="file" name="image" class="custom-file-input" id="pictureChef" aria-describedby="fileHelp" accept="image/*" onchange="loadFile(event)">
                    <label class="custom-file-label" for="pictureChef">Choose chef picure</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-success mt-3 mx-auto">Insert</button>
              </form>

            </div>
          </div>

          <div class="row mt-3 justify-content-md-center m-4">
            <div class="border-bottom mt-3 text-center">
              <h1>List of Chef</h1>
            </div>

            <table class="table table-dark table-striped table-hover mt-3 rounded shadow">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Speciality</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($chefData as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->speciality}}</td>
                    <td>
                      <a href="{{ url('/deletechef', $item->id) }}" class="btn btn-danger">Delete</a>
                      <a href="{{ url('/updatechefview', $item->id) }}" class="btn btn-warning">Update</a>
                    </td>
                  </tr>

                @endforeach
              </tbody>
            </table>
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