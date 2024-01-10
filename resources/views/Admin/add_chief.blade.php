<!DOCTYPE html>
<html lang="en">
@include('Admin.layouts.head')
<body class="hold-transition sidebar-mini layout-fixed">
{{-- <div class="wrapper"> --}}

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>
    @include('Admin.layouts.nav')
    @include('Admin.layouts.asidebar')
    <div class="content-wrapper">
        <div class="container mt-5">
            <div class="container mt-5">
                <h2>Add Chief</h2>
                <form id="addDataForm" method="POST" action="{{route('add_new_chief')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Discription</label>
                        <textarea class="form-control" id="discription" name="discription" rows="3" ></textarea>
                    </div>

                    <div class="image_wrapper">
                        <div class="file-upload">
                          <input type="file" name="image" />
                          <i class="fa fa-arrow-up"></i>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </form>
            </div>
        </div>
    </div>
    @include('Admin.layouts.footer')
{{-- </div> --}}
<!-- ./wrapper -->
@include('Admin.layouts.scripts')
</body>
</html>
