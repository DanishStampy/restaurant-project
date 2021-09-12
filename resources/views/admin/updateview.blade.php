<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
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
                <h1>Update Food #{{$data->id}}</h1>
              </div>
              
              <form action="{{ route('food.update', $data->id) }}" method="POST" enctype="multipart/form-data" class="mt-3 form-styling">

                @csrf

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="inputTitle">Food Name:</label>
                    <input type="text" name="title" class="form-control" id="inputTitle" value="{{$data->title}}">
                  </div>
                  <div class="col-md-6">
                    <label for="inputPrice">Price:</label>
                    <input type="number" name="price" class="form-control" id="inputPrice" value="{{$data->price}}">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <label for="descArea">Description:</label>
                  <textarea class="form-control" name="desc" id="descArea" rows="3">{{$data->description}}</textarea>
                </div>

                <div class="mx-auto col-sm-6">
                  <img src="/foodimage/{{$data->image}}" id="preview" class="img-thumbnail">
                </div>
                <div class="input-group">
                  <div class="custom-file mt-3">
                    <input type="file" name="image" class="custom-file-input" id="pictureFood" aria-describedby="fileHelp" accept="image/*" onchange="loadFile(event)" required>
                    <label class="custom-file-label" for="pictureFood">Choose food picure</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-success mt-3 mx-auto">Update</button>
              </form>

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