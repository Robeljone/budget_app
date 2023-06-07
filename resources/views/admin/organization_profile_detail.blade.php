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
                            <form id="editForm">
                                @csrf
                                <div class="row">
                                    <input name="account_id" type="hidden"  value={{$account[0]->id}}/>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Organization</label>
                                            @csrf
                                            <select class="form-control form-control-sm mselct" name="organization" id="organization" required='required'>
                                                <option value="" disabled>_Select_</option>
                                                @foreach ($organization as $row)
                                                    <option value="{{$row->id}}">{{$row->organization_name}}</option>f
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
                                            <input type="text" class="form-control form-control-sm" placeholder="Enter Account Name" value={{$account[0]->social_media_account_name}} required='required' name="accountname" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($property as $row)
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>{{$row->parameter}}</label>
                                                <input type="text" class="form-control form-control-sm" placeholder="Enter Account Name" value={{$row->value}} required='required' name={{$row->parameter}} >
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>&nbsp;&nbsp;</label>
                                            <button type="submit" class="btn btn-block btn-sm btn-success">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

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
