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
              <div class="card">
                <div class="card-header card-header-rose">
                  <h4 class="card-title ">Edit Data</h4>
                  <p class="card-category"> Complete the field below</p>
                </div>
                <div class="card-body">
                @foreach($data as $data)
                <form action="{{ route('pegawai.update', $data->id) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('PATCH')}}
                    <div class="row">
                      <div class="col-md-1">
                        <div class="form-group">
                          <label class="bmd-label-floating">No.</label>
                          <input type="text" class="form-control" name="id" disabled value="{{$data->id}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Full Name</label>
                          <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Gender :    </label><br/></td>
                          <label><input type="radio" {{ $data->jenis_kelamin == 'male' ? 'checked' : ''}} id="Radio1" name="jenis_kelamin" value="male"/> Male</label>
                            &nbsp
                          <label><input type="radio" {{ $data->jenis_kelamin == 'female' ? 'checked' : ''}} id="Radio2" name="jenis_kelamin" value="female"/> Female</label>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone Number</label>
                          <input type="text" class="form-control" name="no_telp" value="{{$data->no_telp}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" class="form-control" name="email" value="{{$data->email}}">
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