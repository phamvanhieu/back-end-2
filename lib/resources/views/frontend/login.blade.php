@extends('frontend.master')
@section('content')
<!-- Login  -->
<div class="col-sm-8 col-lg-9 mtb_20">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <center>
        <h3>Đăng Nhập</h3>
      </center>
      <div class="panel-login panel">
        <div class="panel-heading">
          <div class="row">
          </div>
          <hr>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form id="login-form" action="{{url('login')}}" method="post">
                @include('error.note')
                <div class="form-group">
                  <input type="text" name="username" id="username1" tabindex="1" class="form-control" placeholder="Tên Đăng Nhập" value="">
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="mật Khẩu">
                </div>
                <div class="form-group text-center">
                  <input type="checkbox" tabindex="3" class="" value="remember" name="remember" id="remember">
                  <label for="remember"> Nhớ Tôi</label>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                      <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Đăng Nhập">
                    </div>
                  </div>
                </div>
                @csrf
                {{-- <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="text-center">
                        <a href="#" tabindex="5" class="forgot-password">Lấy Lại Mật Khẩu</a>
                      </div>
                    </div>
                  </div>
                </div> --}}
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Login  -->
@endsection