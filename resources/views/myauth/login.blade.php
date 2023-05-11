@extends('mylayouts.guard')

@push('css')
<style>
  .card-login {
    border-radius: 13px;
  }
</style>
@endpush

@section('content')
{{-- <div class="container-fluid">
  <div class="row justify-content-center align-items-center" style="min-height: 100vh;background-color: #EBEBEB;">
    <div class="col-md-5">
      <div class="card card-login">
        <div class="card-body p-4">
          <form action="{{ route('login') }}" method="POST" class="form-login">
            @csrf
            <h2 class="text-center mb-3" style="color: #263238;">Sign In</h2>
            <div class="mb-3 login">
              <label for="role" class="form-label">Login Sebagai:</label>
              <select class="form-select" name="role" id="role">
                <option>Pilih Sebagai</option>
                @foreach ($roles as $role)
                <option value="{{ $role->name }}">{{ ucfirst(str_replace('_', ' ', $role->name)) }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3 login">
              <label for="login" class="form-label">Email</label>
              <input type="email" class="form-control w-100" id="login" name="login" placeholder="Masukkan Email"
                disabled>
            </div>
            <div class="mb-3 password">
              <label class="form-label" for="password">Password</label>
              <input type="password" id="password" class="form-control input-password" name="password"
                placeholder="&nbsp;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                disabled>
            </div>
            <div class="mb-3">
              <div class="container p-0">
                <div class="row" style=" width: 100%; display: flex; justify-content: space-between;">
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="remember" name="remember">
                      <label class="form-check-label m-0" for="remember">Remember Me</label>
                    </div>
                  </div>
                  <div class="col-6 d-flex justify-content-end align-items-center">
                    <a href="forgot-password" style="font-size: 12.5px;font-weight: 700;"
                      class="text-decoration-none">Lupa
                      Password?</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <div class="d-grid gap-2">
                <button class="btn btn-primary w-100 tombol-login" type="submit">Masuk</button>
              </div>
            </div>
          </form>
          <a href="{{ route('index') }}" class="d-flex justify-content-center mt-3"><i
              class="bi bi-arrow-left-circle mr-2"></i>
            Back to Home</a>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center small">Don't have an account? <a href="#">Sign up</a></div>
</div> --}}

  <div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
                <img alt="Midone - HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                <span class="text-white text-lg ml-3"> Rubick </span> 
            </a>
            <div class="my-auto">
                <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    A few more clicks to 
                    <br>
                    sign in to your account.
                </div>
                <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Manage all your e-commerce accounts in one place</div>
            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                    Sign In
                </h2>
                <form action="{{ route('login') }}" method="POST" class="form-login">
                  @csrf
                  <select class="intro-x login__input form-control py-3 px-4 block mt-4y" name="role" id="role">
                    <option value="">Pilih Sebagai</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ ucfirst(str_replace('_', ' ', $role->name)) }}</option>
                    @endforeach
                  </select>
                  <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                  <div class="intro-x mt-8">
                      <input type="text" id="login" class="form-login intro-x login__input form-control py-3 px-4 block" type="email"  id="login" name="login"  placeholder="Email" disabled>
                      <input type="password" id="password" class="form-login intro-x login__input form-control py-3 px-4 block mt-4" type="password" id="password" class="" name="password" disabled
                      placeholder="&nbsp;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                  </div>
                  <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                      <div class="flex items-center mr-auto">
                          <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                          <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                      </div>
                      <a href="">Forgot Password?</a> 
                  </div>
                  <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                    
                      <button class="btn btn-primary py-3 px-0 w-full xl:w-32 xl:mr-3 align-top" type="submit">Login</button>
                      <a href="{{ route('index') }}" class="d-flex justify-content-center mt-3"><i
                        class="bi bi-arrow-left-circle mr-2"></i>
                      Back to Home</a>
                  </div>
                </form>
                
               
            </div>
            
        </div>
        <!-- END: Login Form -->
    </div>
  </div>
  


@endsection

@push('js')
<script>
  $('.form-login select').on('change', function(){
        if ($(this).val()) {
          if ($(this).val() == 'super_admin' || $(this).val() == 'admin') {
            $('.form-login #login').attr('type', 'email').removeAttr('disabled').attr('placeholder', 'Masukkan Email').parent().children('label').html('Email')
          }else{
            $('.form-login #login').attr('type', 'number').removeAttr('disabled').attr('placeholder', 'Masukkan NIP').parent().children('label').html('NIP')
          }
          $('.form-login #password').removeAttr('disabled')
        }else{
          $('.form-login #login').attr('disabled', 'disabled')
          $('.form-login #password').attr('disabled', 'disabled')
        }
      })
</script>
@endpush