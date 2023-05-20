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
            <div class="card">
              <div class="card-body">
                <h3><u>{{$profile->ownName .' '. $profile->fatherName.' '. $profile->gFatherName .'/' . $profile->title . '/'. $profile->district}}</u><div class="float-right d-none d-sm-inline">
                  <button type="button" class="btn btn-outline-primary btn-block" data-target="#mymodal" data-toggle="modal"  data-backdrop="static" data-keyboard="false"><i class="fas fa-save"></i> Add New Social Midea</button>
                </div></h3> 
                <br>  
                <table id="example" class="display" style="width:100%">
                 <thead>
                     <tr>
                         <th>NO</th>
                         <th>Social Midea name</th>
                         <th>link</th>
                         <th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
                  
                   @foreach ($socials as $row)
                   <tr>
                     <td>{{ $loop->index + 1 }}</td>
                     <td>{{$row->name}}</td>
                     <td>{{$row->link}}</td>
                     <td><a class="btn btn-app" href="{{$row->link}}" target="_blank"><i class="fas fa-door-open"></i>Open</a></td>
                   </tr>
                   @endforeach
                 
                 </tbody>
                 <tfoot>
                     <tr>
                      <th>NO</th>
                      <th>Name</th>
                      <th>Title</th>
                      <th>Action</th>
                     </tr>
                 </tfoot>
                 </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <div class="modal fade" id="mymodal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="overlay overl d-none">
                  <i class="fas fa-2x fa-sync fa-spin"></i>
              </div>
              <div class="modal-header">
                <h4 class="modal-title">Edit Social Media</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h4 class="modal-title" id='modname'>{{$profile->ownName .' '. $profile->fatherName.' '. $profile->gFatherName }}</h4>
                <form action="" id="addsocialmid">
                  @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <!-- select -->
                    <div class="form-group">
                      <input type="text" name="pid" id="pid" value="{{$pid}}" hidden>
                      <label>Social media type</label>
                      <select class="form-control" name="stype" required='required' id="stype">
                        <option value="">_Select_</option>
                        @foreach ($socailMT as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Social media link</label>
                      <input type="url" class="form-control" placeholder="Enter ..." name="slink" id="slink" required='required'>
                    </div>
                  </div>
                </div> 
                <button type="submit" class="btn btn-primary">Save</button>       
              </form>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('inc.footer')
 