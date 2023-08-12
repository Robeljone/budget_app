@include('inc.head')
@include('inc.sideNav')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">{{$page}}</h5>
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
                            <br>
                            <form id="addnew">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="Full Name" required='required' name="name">
                                        </div>
                                        <div class="form-group d-none" id="organization_sele">
                                            <label>Organization Name</label>
                                            <select class="form-control form-control-sm mselct" name="organization" required>
                                                @foreach($organizations as $key)
                                                    <option value="{{$key->id}}"> {{$key->organization_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="User Name" required='required' name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="Password" required='required' name="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control form-control-sm mselct" name="Role" id="roleSelection" required>
                                                <option value="101">Finance Admin</option>
                                                <option value="102">Organization Admin</option>
                                            </select>
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
                            <br>
                            <div>
                                <table id="example" class="table-striped table-sm" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name</th>
                                        <th>Organization</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $row)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$row->fullName}}</td>
                                            <td>{{$row->organization_name}}</td>
                                            <td>{{$row->organization_name}}</td>
                                            @if($row->status =='1')
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
                                                        @if($row->status =='1')
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
                                        <th>Organization</th>
                                        <th>Role</th>
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
