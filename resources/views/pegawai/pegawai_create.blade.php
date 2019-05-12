@extends('layouts.base')
@section('table_name')
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="/pegawai">Table Pegawai</a>
    </div>
@endsection
@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @if ($message = Session::get('alert-success'))
                      <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                      </div>
                    @endif
              <div class="card">
                <div class="card-header card-header-rose">
                  <h4 class="card-title ">Create New Data</h4>
                  <p class="card-category"> Complete the field below</p>
                </div>
                <div class="card-body">
                <form action="{{ route('pegawai.store') }}" method="post">
                  {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-1">
                        <div class="form-group">
                          <label class="bmd-label-floating">No.</label>
                          <input type="text" class="form-control" name="id" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Full Name</label>
                          <input type="text" class="form-control" name="nama" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Gender :    </label><br/></td>
                          <label><input type="radio" name="jenis_kelamin" value="male" required> Male</label>
                              &nbsp
                          <label><input type="radio" name="jenis_kelamin" value="female" required> Female</label>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" name="alamat" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone Number</label>
                          <input type="text" class="form-control" name="no_telp" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control" name="email" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-danger">Add Data</button>
                    </div>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>  
@endsection