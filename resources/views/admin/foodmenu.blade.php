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
                <h1>Food Menu Form</h1>
              </div>

              @if (Session::has('insert_food'))
              <div class="alert alert-success my-3" role="alert">
                {{Session::get('insert_food')}}
              </div>

              @elseif (Session::has('delete_food'))
              <div class="alert alert-success my-3" role="alert">
                {{Session::get('delete_food')}}
              </div>

              @elseif (Session::has('update_food'))
              <div class="alert alert-success my-3" role="alert">
                {{Session::get('update_food')}}
              </div>

              @endif
              
              <form action="{{ url('/uploadFood') }}" method="POST" enctype="multipart/form-data" class="mt-3 form-styling">

                @csrf

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="inputTitle">Food Name:</label>
                    <input type="text" name="title" class="form-control" id="inputTitle" >
                  </div>
                  <div class="col-md-6">
                    <label for="inputPrice">Price:</label>
                    <input type="number" name="price" class="form-control" id="inputPrice">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <label for="descArea">Description:</label>
                  <textarea class="form-control" name="desc" id="descArea" rows="3"></textarea>
                </div>

                <div class="mx-auto col-sm-6">
                  <img src="{{ asset('/foodimage/default.jpg') }}" id="preview" class="img-thumbnail">
                </div>
                <div class="input-group">
                  <div class="custom-file mt-3">
                    <input type="file" name="image" class="custom-file-input" id="pictureFood" aria-describedby="fileHelp" accept="image/*" onchange="loadFile(event)">
                    <label class="custom-file-label" for="pictureFood">Choose food picure</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-success mt-3 mx-auto">Insert</button>
              </form>

            </div>
          </div>

          <div class="row mt-3 justify-content-md-center m-4">
            <div class="border-bottom mt-3 text-center">
              <h1>List of Food Menu</h1>
            </div>

            <table class="table table-dark table-striped table-hover mt-3 rounded shadow">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($foodData as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>RM{{$item->price}}</td>
                    <td>
                      <a href="{{ url('/deletemenu', $item->id) }}" class="btn btn-danger">Delete</a>
                      <a href="{{ url('/updateview', $item->id) }}" class="btn btn-warning">Update</a>
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