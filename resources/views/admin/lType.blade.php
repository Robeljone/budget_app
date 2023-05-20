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
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-warning card-outline">
             <div class="overlay overl d-none">
              <i class="fas fa-2x fa-sync fa-spin"></i>
             </div>
              <div class="card-body">
                <h5 class="card-title"> <u> Add New Leader Catagory</u></h5>
               <br>
               <form id="addnew">
                @csrf
                <div class="row">
                 <div class="col-lg-6">
                  <div class="form-group">
                   <label>Name of classification</label>
                   <input type="text" class="form-control" placeholder="Enter ..." required='required' name="name">
                   </div>
                 </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>&nbsp;&nbsp;</label>
                    <button type="submit" class="btn btn-block btn-success">Save</button>
                  </div>
                </div>
                </div>
               </form>
               
              </div>
            </div>

            <div class="card card-primary card-outline">
             <div class="overlay overl d-none">
              <i class="fas fa-2x fa-sync fa-spin"></i>
             </div>
              <div class="card-body">
                <h5 class="card-title"><u>List Of Leader Categories</u></h5>
                <br>
                <div>
                 <table id="example" class="display" style="width:100%">
                 <thead>
                     <tr>
                         <th>NO</th>
                         <th>Name</th>
                         <th>Status</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                  @foreach ($leaderTs as $row)
                   <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{$row->name}}</td>
                    @if($row->stat =='1')         
                    <td><button type="button" class="btn btn-success" style="pointer-events: none;">Active</button></td>         
                    @else
                    <td><button type="button" class="btn btn-danger" style="pointer-events: none;">passive</button></td> 
                    @endif
                    <td>
                     <div class="btn-group">
                      <button type="button" class="btn btn-info">Action</button>
                      <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <div class="dropdown-menu" role="menu">
                       @if($row->stat =='1')
                       <a class="dropdown-item" href="#">Deactivate</a>
                       @else
                        <a class="dropdown-item" href="#">Activate</a>
                       @endif
                      </div>
                    </div>
                  </td>
                   </tr>
                  @endforeach
                 </tbody>
                 <tfoot>
                     <tr>
                      <th>NO</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Action</th>
                     </tr>
                 </tfoot>
                 </table>
                </div>
               
              </div>
            </div><!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('inc.footer')
