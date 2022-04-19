@extends('layout.auth')
@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="assets/images/logo.svg">
              </div>
              <h4>Welcome To Darzee App !!!</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" action="{{route('register')}}" method="POST">
                  @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="name" placeholder="Full Name">
                    @if ($errors->has('name'))
                    <span class="text text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="shop_name" placeholder="Shop Name">
                    @if ($errors->has('shop_name'))
                        <span class="text text-danger">{{$errors->first('shop_name')}}</span>
                    @endif
                </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="text text-danger">{{$errors->first('email')}}</span>
                    @endif
                </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="address" placeholder="Shop Address">
                    @if ($errors->has('address'))
                        <span class="text text-danger">{{$errors->first('address')}}</span>
                    @endif
                </div>
                  <div class="form-group">
                    <input type="tel" class="form-control form-control-lg"  name="personal_contact" placeholder="Personal Contact">
                    @if ($errors->has('personal_contact'))
                        <span class="text-danger">{{$errors->first('personal_contact')}}</span>
                    @endif
                </div>
                  <div class="form-group">
                    <input type="tel" class="form-control form-control-lg"   name="shop_contact" placeholder="Shop Contact">
                    @if ($errors->has('shop_contact'))
                        <span class="text text-danger">{{$errors->first('shop_contact')}}</span>
                    @endif
                </div>

                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="text text-danger">{{$errors->first('password')}}</span>
                    @endif
                </div>
                <div class="mb-4">
                  {{-- <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
                  </div> --}}
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP">
                </div>
                <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{url('/')}}" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@endsection
