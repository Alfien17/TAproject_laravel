@extends('loglayout')
@section('judul_halaman','Register')
@section('konten')
<h5>Verifikasi email kamu</h5> 
<form action="{{ route('daftar1.post') }}" method="post">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="col-lg-7">
            <input type="email" name="email" class="form-control my-3 p-4 {{$errors->has('email')?'is-invalid':''}}" placeholder="Email"  required value="{{old('email', $daftar->email ?? '')}}" autocomplete="off">
            @error('email')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7"> 
            <input type="password" name="password" class="form-control my-3 p-4 {{$errors->has('password')?'is-invalid':''}}" placeholder="Password" required value="{{old('password', $daftar->password ?? '')}}">
            @error('password')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7"> 
            <input type="password" name="password_confirmation" class="form-control my-3 p-4 {{$errors->has('password_confirmation')?'is-invalid':''}}" placeholder="Password Confirmation" required value="{{old('password_confirmation', $daftar->password_confirmation ?? '')}}">
            @error('password_confirmation')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7 text-right">
            <button type="submit" class="btn btn-primary">Next</button>
        </div>
    </div>
</form><a href="/login" class="float-right mb-3 mt-2" title="Back to login"><i class="fas fa-arrow-circle-left mr-2"></i>Back</a>
@endsection