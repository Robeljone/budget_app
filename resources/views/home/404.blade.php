@include('inc.head')
@include('inc.sideNav')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$page}}</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

         <div class="d-flex align-items-center justify-content-center vh-100">
          <div class="text-center row">
              <div class=" col-md-6">
                  <img src="https://cdn.pixabay.com/photo/2017/03/09/12/31/error-2129569__340.jpg" alt=""
                      class="img-fluid">
              </div>
              <div class=" col-md-6 mt-5">
                  <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p>
                  <p class="lead">
                      The page you’re looking for doesn’t exist.
                  </p>
                  <a href="index.html" class="btn btn-primary">Go Home</a>
              </div>

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('inc.footer')