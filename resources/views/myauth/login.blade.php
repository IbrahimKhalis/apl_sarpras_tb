@extends('mylayouts.guard')

@push('css')
<style>
  .card-login {
    border-radius: 13px;
  }
</style>
@endpush

@section('content')
<div class="container-fluid">
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