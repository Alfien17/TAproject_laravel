@extends('loglayout')
@section('judul_halaman','Login')
@section('konten')
@if(Session::has('success'))
      <div class="alert alert-success fixed-top" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
        <i class="fas fa-exclamation-triangle"></i> {{Session::get('success')}}
      </div>
    @endif
    @if(Session::has('fail'))
      <div class="alert alert-danger fixed-top" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
          <i class="fas fa-exclamation-triangle"></i> {{Session::get('fail')}}
      </div>
    @endif
<form action="/ceklogin" method="post">
	{{ csrf_field() }}
    <div class="form-row">
        <div class="col-lg-7">
            <input type="email" name="email" class="form-control my-3 p-4 {{$errors->has('email')?'is-invalid':''}}" placeholder="Email" autocomplete="off" required value="{{old('email')}}">
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7">
            <input type="password" name="password" class="form-control my-3 p-4 {{$errors->has('password')?'is-invalid':''}}" placeholder="Password" required>
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7">
            <button type="submit" class="btn1 mt-3 mb-3">Login</button>
        </div>
    </div>
    <a class="link-login" href="/forgot-password">Lupa password?</a>
    <p class="link-ket">Tidak punya akun? <a href="/create-daftar1" class="link-login">Daftar sekarang</a></p>
</form>
<a href="/" class="float-right"><i class="fas fa-arrow-circle-left mr-2"></i>Back</a>
@endsection