@extends('layouts.base')
@section('content')
    <div class="content">
        <div class="container-fluid">
          <center>
            <div class="col-md-8">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img material-icons" src="../assets/img/user.png" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category">User</h6>
                  <h4 class="card-title">{{Session::get('name')}}</h4>
                  <p class="card-description">
                      Email : {{Session::get('email')}}
                  </p>
                  <p>
                    Status Login : 
                        @if (Session::get('login'))
                            Logged In
                        @endif
                    </p>
                </div>
              </div>
            </center>
          </div>
        </div>
      </div>
@endsection