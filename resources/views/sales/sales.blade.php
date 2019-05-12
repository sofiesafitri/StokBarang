@extends('layouts.base')
@section('table_name')
    <div class="navbar-wrapper">
     <a class="navbar-brand" href="/sales">Table Sales</a>
    </div>
@endsection
@section('search')
            <form class="navbar-form" action="/search/sales" method="GET">
              <div class="input-group no-border">
                <input type="text" class="form-control" placeholder="Search..." name="search">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
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
                <a href="/sales/create" class="btn btn-danger btn-round">
                <i class="material-icons">add</i>
                Add New Data</a>
                <p>&nbsp</p>
              <div class="card">
                <div class="card-header card-header-rose">
                  <p class="card-category"> Berisi data data sales</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                         <tr>
                            <th>No Identitas</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sales as $datas)
                            <tr>
                                <td>{{ $datas->no_identitas }}</td>
                                <td>{{ $datas->nama }}</td>
                                <td>{{ $datas->alamat }}</td>
                                <td>{{ $datas->kota }}</td>
                                <td>{{ $datas->telepon }}</td>
                                <td>
                                  <form action="{{ route('sales.destroy', $datas->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                      <a href="{{ route('sales.edit',$datas->id) }}" class=" btn btn-sm btn-info">
                                      <i class="material-icons">edit</i> </a>
                                      </a>
                                      <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are You Sure Want To Delete This Data?')">
                                      <i class="material-icons">delete</i> </a>
                                      </button>
                                  </form>
                                </td> 
                            </tr>
                        @endforeach
                        </tbody>     
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <ul class="pagination mx-auto">
              <li>{{$sales->links()}}</li>
            </ul>    
 @endsection