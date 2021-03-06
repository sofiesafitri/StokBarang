@extends('layouts.base')
@section('table_name')
      <div class="navbar-wrapper">
          <a class="navbar-brand" href="/barang_in">Table Barang Masuk</a>
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
                </div> </br>
                <div class="card-body">
                  <form action="{{ route('barang_in.store') }}" method="post">
                    {{ csrf_field() }}
                  <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">No Surat Barang Masuk(SBM)</label>
                          <input type="text" class="form-control" name="no_sbm" required>
                        </div>
                      </div>
                    </div>
                    &nbsp
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="id_barang">Barang </label>
                          <select class="custom-select" style="width:300px;" id="id_barang" name="id_barang">
                            @if($barang->count())
                              @foreach($barang as $barang)
                                <option value="{{ $barang->id}}">{{$barang->id}} - {{$barang->nama_barang}}</option>
                              @endforeach    
                            @endif
                            </select>
                          </div>
                        </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Quantity</label>
                          <input type="text" class="form-control" name="quantity" required>
                        </div>
                      </div>
                    </div>
                    &nbsp
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="pegawai">Pegawai</label>
                          <select class="custom-select" style="width:300px;" id="pegawai" name="id_pegawai">
                            @if($pegawai->count())
                              @foreach($pegawai as $pegawai)
                                <option value="{{ $pegawai->id}}">{{$pegawai->id}} - {{$pegawai->nama}}</option>
                              @endforeach    
                            @endif
                            </select>
                          </div>
                        </div>
                      </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Keterangan</label>
                          <textarea class="form-control" name="keterangan" required></textarea>
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