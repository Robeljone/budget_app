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
                                                value={{$post[0]['title']}}
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
                                                  value={{$post[0]['post_link']}}
                                                required
                                                name="link"
                                                class="form-control form-control-sm"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="card-body p-0">
<textarea id="summernote" cols="5"  name="cont" required>
    {{$post[0]['content']}}
              </textarea>
                                    </div>
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
