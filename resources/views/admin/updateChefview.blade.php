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
                <h1>Update Food #{{$chef->id}}</h1>
              </div>
              
              <form action="{{ route('chef.updatechef', $chef->id) }}" method="POST" enctype="multipart/form-data" class="mt-3 form-styling">

                @csrf

                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="inputName">Chef Name:</label>
                    <input type="text" name="name" class="form-control" id="inputName" value="{{$chef->name}}">
                  </div>
                  <div class="col-md-6">
                    <label for="inputSpec">Speciality:</label>
                    <input type="text" name="speciality" class="form-control" id="inputSpec" value="{{$chef->speciality}}">
                  </div>
                </div>

                <div class="mx-auto col-sm-6">
                  <img src="/chefimage/{{$chef->image}}" id="preview" class="img-thumbnail">
                </div>
                <div class="input-group">
                  <div class="custom-file mt-3">
                    <input type="file" name="image" class="custom-file-input" id="pictureChef" aria-describedby="fileHelp" accept="image/*" onchange="loadFile(event)" required/>
                    <label class="custom-file-label" for="pictureChef">Choose chef picure</label>
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