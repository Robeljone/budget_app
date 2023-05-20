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
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="row">
                  <h5 class="card-title font-weight-bold text-primary">{{$profile->ownName}} {{$profile->fatherName}} {{$profile->gFatherName}}</h5>
                </div>
                <form action="">

                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Enter ..." value="{{$profile->address}}">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text" class="form-control" placeholder="Enter ..." value="{{$profile->mobNum}}">
                      </div>
                    </div>
                  </div>
                  
                
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
            </div><!-- /.card -->
          </div>
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="row">
                  <h5 class="card-title font-weight-bold text-success"><u>Social Medias</u></h5>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Icon</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($socailM as $row)
                          <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><a href="{{$row->link}}" target="_blank">{{$row->name}}</a></td>
                            <td>
                              <img class="img-circle" src="{{$row->icon}}" alt="icon" width="40" height="40">
                            </td>
                            <td><a class="btn btn-app editmid" data-id="{{$row->id}}" data-tid="{{$row->tid}}" data-link="{{$row->link}}" data-target="#modal-overlay" data-toggle="modal"  data-backdrop="static" data-keyboard="false"><i class="fas fa-edit"></i> Edit
                            </a></td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-overlay2" data-backdrop="static" data-keyboard="false">Add New</button>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="modal fade" id="modal-overlay">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="overlay d-none" id="over2">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
              <h4 class="modal-title">Edit Social Media</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" id="updatemid">
                @csrf
              <div class="row">
                <div class="col-sm-12">
                  <!-- select -->
                  <div class="form-group">
                    <input type="text" name="psmid" id="psmid" hidden>
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
              <button type="submit" class="btn btn-primary">update</button>       
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
      <div class="modal fade" id="modal-overlay2">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="overlay d-none" id="over1">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div>
            <div class="modal-header">
              <h4 class="modal-title">Add New Social Media</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" >
              <form action="" id="addnew">
                @csrf
              <div class="row">
                <div class="col-sm-12">
                  <!-- select -->
                  <div class="form-group">
                    <label>Social media type</label>
                    <select class="form-control" name="stype" required='required'>
                      <option value="">_Select_</option>
                      @foreach ($socailMT as $row)
                      <option value="{{$row->id}}">{{$row->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Social media link</label>
                    <input type="url" class="form-control" placeholder="Enter ..." name="slink" required='required'>
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
      <!-- /.modal -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('inc.footer')
 