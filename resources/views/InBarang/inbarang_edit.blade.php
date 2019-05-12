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
              <div class="card">
                <div class="card-header card-header-rose">
                  <h4 class="card-title ">Edit Data</h4>
                  <p class="card-category"> Complete the field below</p>
                </div>
                <div class="card-body">
                @foreach($data as $data)
                <form action="{{ route('barang_in.update', $data->id_in) }}" method="post">
                 {{ csrf_field() }}
                 {{ method_field('PATCH')}}
                 <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">No Surat Barang Masuk</label>
                          <input type="text" class="form-control" name="no_sbm" disabled value="{{$data->no_sbm}}">
                        </div>
                      </div>
                    </div>
                 <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="id_barang">Barang </label>
                          <select class="custom-select" style="width:300px;" id="id_barang" name="id_barang" value="{{$data->id_barang}}">
                            @if($barang->count())
                              @foreach($barang as $barang)
                                <option value="{{ $barang->id}}" {{ $data->id_barang == $barang->id ? 'selected' : '' }}>{{$barang->id}} - {{$barang->nama_barang}}</option>
                              @endforeach    
                            @endif
                            </select>
                          </div>
                        </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Quantity</label>
                          <input type="text" class="form-control" name="quantity" required value="{{$data->quantity}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="pegawai">Pegawai</label>
                          <select class="custom-select" style="width:300px;" id="pegawai" name="id_pegawai" value="{{$data->id_pegawai}}">
                            @if($x->count())
                              @foreach($x as $pegawai)
                                <option value="{{ $pegawai->id}}" {{ $data->id_pegawai == $pegawai->id ? 'selected' : '' }}>{{$pegawai->id}} - {{$pegawai->nama}}</option>
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
                          <input type="text" class="form-control" name="keterangan" required value="{{$data->keterangan}}">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-info">Save</button>
                    </div>
                    <div class="clearfix"></div>
                  </form>
                  @endforeach
                </div>
              </div>
            </div>   
@endsection