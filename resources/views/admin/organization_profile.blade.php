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
                            <form id="addnew">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Social Media</label>
                                            @csrf
                                            <select class="form-control form-control-sm mselct" name="social_media" id="social_media_id" required='required'>
                                                <option value="">_Select_</option>
                                                @foreach ($socailMT as $row)
                                                        <option value="{{$row->id}}">{{$row->account_name}}</option>f
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Account Manager</label>
                                            <select class="form-control form-control-sm mselct" name="account_manager" required='required'>
                                                <option value="">_Select_</option>
                                                @foreach ($user as $row)
                                                    <option value="{{$row->id}}">{{$row->fullName}}</option>f
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Account Name</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="Enter Account Name" required='required' name="oname" pattern="[^' ']+">
                                        </div>
                                    </div>
                                </div>
                                <div class="row invisible"  id="property">
{{--                                    @foreach($socailMT as $row)--}}
{{--                                        <div class="col-lg-3">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>{{$row->account_name}}</label>--}}
{{--                                                <input type="text" class="form-control form-control-sm" placeholder="Enter Account Name" required='required' name={{$row->account_name}} pattern="[^' ']+">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
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
                            <h5 class="card-title"><u>List Of Leaders</u></h5>
                            <br><br>
                            <form action="" id="filter">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>District</label>
                                            <select class="form-control mselct" name="woreda" required='required'>
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
                                            <select class="form-control mselct" name="title" required='required'>
                                                <option value="">_Select_</option>
                                                @foreach ($leaderTs as $row)
                                                    @if($row->stat =='1')
                                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <button type="submit" class="btn btn-block btn-success">Filter</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <div>
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
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
                    </div><!-- /.card -->
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
                            <h4 class="modal-title" id='modname'>name</h4>
                            <form action="" id="addsocialmid">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- select -->
                                        <div class="form-group">
                                            <input type="text" name="pid" id="pid" hidden>
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
