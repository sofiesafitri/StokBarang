@extends('layouts.base')
@section('table_name')
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="/barang">Table Daftar Barang</a>
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
                  <form action="{{ route('barang.store') }}" method="post">
                   {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-1">
                        <div class="form-group">
                          <label class="bmd-label-floating">No.</label>
                          <input type="text" class="form-control" name="id" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kode Barang</label>
                          <input type="text" class="form-control" name="kode_barang" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Barang</label>
                          <input type="text" class="form-control" name="nama_barang" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Satuan</label>
                          <input type="text" class="form-control" name="satuan" required>
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