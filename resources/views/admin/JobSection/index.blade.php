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
                                            <label>Organization</label>
                                            <select class="form-control form-control-sm mselct" name="orga" required='required'>
                                                <option value="">_Select_</option>
                                                @foreach($organization as $key)
                                                    <option value={{$key->id}}>{{$key->organization_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Job Section Name</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="Job Section Name" required='required' name="job">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label>Allocated Budget</label>
                                            <input type="number" class="form-control form-control-sm" placeholder="Allocated Budget" min="1" required='required' name="budget">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
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
                                        <th>Name</th>
                                        <th>Organization</th>
                                        <th>Budget Code</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{$row->job_section_name}}</td>
                                            <td>{{$row->organ->organization_name}}</td>
                                            <td>{{$row->budget_code}}</td>
                                            <td>{{$row->budget_code}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name</th>
                                        <th>Edit</th>
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
