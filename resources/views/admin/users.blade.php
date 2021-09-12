<!DOCTYPE html>
<html lang="en">
  <head>
    
    {{-- CSS Collection --}}
    @include('admin.admincss')

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

          {{-- List of users --}}
          <div class="row mt-3 justify-content-md-center">
            <div class="col-md-8">

              @if (Session::has('user_deleted'))
              <div class="alert alert-success" role="alert">
                {{Session::get('user_deleted')}}
              </div>
              @endif

              <div class="border-bottom mt-3 text-center">
                <h1>List of Registered Users & Admin</h1>
              </div>

              <table class="table table-dark table-striped table-hover mt-3 rounded shadow">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>

                      @if ($item->usertype == "0")
                    
                      <td>
                        <a href="#" class="btn btn-warning">
                          Edit
                        </a>
                        <a href="{{ url('/deleteuser', $item->id) }}" class="btn btn-danger">
                          Delete
                        </a>
                      </td>

                      @else

                      <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#notAllowed">
                          Not Allowed
                        </button>
                      </td>
                      @endif
                    </tr>

                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="notAllowed" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            You are not allowed to remove <code>admin</code>. <code>Admin</code> can only be removed by themeselves.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Okay</button>
          </div>
        </div>
      </div>
    </div>
    
    {{-- JS Collection --}}
    @include('admin.adminjs')
  </body>
</html>