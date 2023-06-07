@include('inc.head')
@include('inc.sideNav')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6 class="m-0">{{$page}}</h6>
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
                            <form id="addnew" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Account</label>
                                            @csrf
                                            <select class="form-control form-control-sm mselct" name="account" required>
                                                @foreach($account as $key)
                                                    <option value="{{$key->id}}"> {{$key->social_media_account_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Post Title</label>
                                            @csrf
                                            <input
                                                required
                                                name="title"
                                                class="form-control form-control-sm"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Post Link</label>
                                            @csrf
                                            <input
                                                required
                                                name="link"
                                                class="form-control form-control-sm"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Images</label>
                                            @csrf
                                            <input
                                                type="file"
                                                accept="image/jpg, image/gif"
                                                multiple
                                                required
                                                id="attach"
                                                class="form-control form-control-sm"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="card-body p-0">
<textarea id="summernote" cols="5" name="cont" required>
                Place Post Content Here
              </textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <button type="submit" class="btn btn-block btn-sm btn-success">Save</button>
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
                            <h7 class="card-title">Post Record</h7>
                            <br><br>
                            <form action="" id="filter">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>District</label>
                                            <select class="form-control form-control-sm mselct" name="woreda" required='required'>
                                                <option value="">_Select_</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">ልዩ ወረዳ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Clasicfication</label>
                                            <select class="form-control form-control-sm mselct" name="title" required='required'>
                                                <option value="">_Select_</option>
{{--                                                @foreach ($socailMT as $row)--}}
{{--                                                    <option value="{{$row->id}}">{{$row->account_name}}</option>f--}}
{{--                                                @endforeach--}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <button type="submit" class="btn btn-block btn-success btn-sm">Filter</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <div>
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Account Name</th>
                                        <th>Social Media</th>
                                        <th>Organization</th>
                                        <th>Woreda</th>
                                        <th>Account Manager</th>
                                        <th>Detail</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($post as $row)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$row->account['social_media_account_name']}}</td>
                                            <td>{{$row->account['soc_media_type']['account_name']}}</td>
                                            <td>{{$row->account['orga_name']['organization_name']}}</td>
                                            <td>{{$row->account['orga_name']['woreda']}}</td>
                                            <td>{{$row->postedby['fullName']}}</td>
                                            <td><a href={{'edit_post/'.$row->id}}><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                            <td><a href={{'edit_post/'.$row->id}}><i class="fa fa-link" aria-hidden="true"></i></a></td>
                                            @if($row->status ==='1')
                                                <td><button type="button" class="btn btn-success" style="pointer-events: none;">Active</button></td>
                                            @else
                                                <td><button type="button" class="btn btn-danger" style="pointer-events: none;">Passive</button></td>
                                            @endif
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info">Action</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        @if($row->status ==='1')
                                                            <a class="dropdown-item"  id="status" data-col={{$row->id}}>Deactivate</a>
                                                        @else
                                                            <a class="dropdown-item" id="status" data-col={{$row->id}} >Activate</a>
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
                                        <th>Account Name</th>
                                        <th>Social Media</th>
                                        <th>Organization</th>
                                        <th>Woreda</th>
                                        <th>Account Manager</th>
                                        <th>Detail</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
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
