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
                                            <label>Social Media</label>
                                            <select class="form-control form-control-sm selct" name="account" required='required'>
                                                <option value="">_Select_</option>
                                                @foreach ($socailMT as $row)
                                                        <option value="{{$row->id}}">{{$row->account_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Property</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="Social Media Property" required='required' name="property_name">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <button type="submit" class="btn btn-block btn-success btn-sm">Save</button>
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
                                        <th>Social Media</th>
                                        <th>Property</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($socialmediaproperty as $row)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$row->social_media['account_name']}}</td>
                                            <td>{{$row->property_name}}</td>
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
                                        <th>Social Media</th>
                                        <th>Property</th>
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
