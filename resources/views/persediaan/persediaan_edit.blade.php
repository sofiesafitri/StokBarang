@extends('layouts.base')
@section('table_name')
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="/persediaan">Table Persediaan</a>
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
                <form action="{{ route('persediaan.update', $data->id_persediaan) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('PATCH')}}
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
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Deskripsi</label>
                          <input type="text" class="form-control" name="deskripsi" required value="{{$data->deskripsi}}">
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