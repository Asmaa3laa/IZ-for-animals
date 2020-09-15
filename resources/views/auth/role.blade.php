@extends('layouts.auth')
@section('content')
<body style="background-color:rgb(241, 247, 252)">


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">

            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <img src="images/bg_login.jpg" style="width: 500px; height: 700px;"/>

              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                  </div>
                  <a href="{{ route('register', ['role'=>'doctor']) }}" class="btn btn-warning btn-user btn-block">
                    <i class="fa fa-user fa-2x"></i> Register As A Doctor
                  </a>
                  <a href="{{ route('register', ['role'=>'clinic']) }}" class="btn btn-info btn-user btn-block">
                    <i class="fa fa-stethoscope fa-2x"></i> Register As A Clinic
                  </a>
                </div>
                <hr>
                  
                <div class="text-center">Have an account?
                  <a class="btn btn-link" href="{{ route('login') }}"> Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
      
</body>
@endsection
