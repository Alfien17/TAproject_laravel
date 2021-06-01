@extends('main')
@section('konten')
        @if (count($errors)>0)
            <div class="alert alert-danger d-flex  align-item-center alert-dismissible fade show" role="alert">
                <ul style="list-style:none">
                    @foreach($errors->all() as $error)
                    <li><span class="fas fa-exclamation-triangle"></span>
                    {{$error}}</li>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('fail2'))
           <div class="alert alert-danger fixed-top" role="alert">
               <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
               <i class="fas fa-check-circle"></i> {{Session::get('fail2')}}
           </div>
        @endif
<div class="container mb-3">
    <div class="mt-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/akun">Account</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Password</li>
          </ol>
        </nav>
    </div>
    <h5>Edit Password</h5>
    <form method="post" action="/editpassword" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Email</label>
                    <div class="col-sm-7">
                        <input type="email" name="email" class="form-control2 {{$errors->has('email')?'is-invalid':''}}" required="required" autocomplete="off">
                    </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Password Baru</label>
                    <div class="col-sm-7">
                        <input type="password" name="password" class="form-control2 {{$errors->has('password')?'is-invalid':''}}" required="required">
                    </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Konfirmasi Password</label>
                    <div class="col-sm-7"><input type="password" name="password_confirmation" class="form-control2 {{$errors->has('password_confirmation')?'is-invalid':''}}" required="required"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 text-right">
                <a class="btn btn-light" href="/akun">Batal</a>
                <input type="submit" class="btn btn-primary" value="Kirim">
            </div>
        </div>
    </form>
</div>
@endsection 