@extends('mainadmin')
@section('judul_halaman','Data Akun')
@section('konten')
	@if(Session::has('success'))
	   <div class="alert alert-success" role="alert">
	       <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
	       <i class="fas fa-check-circle"></i> {{Session::get('success')}}
	   </div>
	@endif
        <div class="d-md-flex justify-content-md-end">
        	<a href="/mainadmin/akun/edit/{{Auth::user()->id ?? ''}}" role="button" class="btn btn-warning" title="Edit"><i class="far fa-edit"></i></a>
        </div>
        <div class="row">
            <label class="col-sm-2">Nama</label>
            <label>:</label>
            <label class="col-sm-7">{{Auth::user()->forename ?? ''}}</label>
        </div>
        <div class="row">
            <label class="col-sm-2">Email</label>
            <label>:</label>
            <label class="col-sm-7">{{Auth::user()->email ?? ''}}</label>
        </div>
        <div class="row">
            <label class="col-sm-2">Password</label>
            <label>:</label>
            <label class="col-sm-7"><a href="/mainadmin/akun/editPassword/{{Auth::user()->id ?? ''}}" class="label-control">Lupa password?</a></label>
        </div>
        <div class="row">
            <label class="col-sm-2">Telepon</label>
            <label>:</label>
            <label class="col-sm-7">{{Auth::user()->telp ?? ''}}</label>
        </div>
        <div class="row">
            <label class="col-sm-2">Alamat</label>
            <label>:</label>
            <label class="col-sm-7">{{Auth::user()->al_detail ?? ''}}</label>
        </div>
        <div class="row">
        	<label class="col-sm-2">Foto Profil</label>
           	<label>:</label>
            <div class="col-sm-2"><img width="200px" src="{{ url('/assets/account/'.Auth::user()->image ?? '') }}"></div>
        </div>
@endsection 