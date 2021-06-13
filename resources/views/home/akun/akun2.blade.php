@extends('main')
@section('konten')
	@if(Session::has('sukses2'))
	   <div class="alert alert-success fixed-top" role="alert">
	       <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
	       <i class="fas fa-check-circle"></i> {{Session::get('sukses2')}}
	   </div>
	@endif
    @if(Session::has('sukses3'))
       <div class="alert alert-success fixed-top" role="alert">
           <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
           <i class="fas fa-check-circle"></i> {{Session::get('sukses3')}}
       </div>
    @endif
<div class="container mb-3">
    <div class="mt-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Akun</li>
          </ol>
        </nav>
    </div>
        <div class="d-md-flex justify-content-md-end">
        	<a href="/akun/edit-akun/{{Auth::user()->id ?? ''}}" role="button" class="btn btn-warning" title="Edit"><i class="far fa-edit"></i> Edit</a>
        </div>
        <div class="row">
            <label class="col-sm-2">Nama</label>
            <label>:</label>
            <label class="col-sm-7">{{ucwords(Auth::user()->forename ?? '')}} {{ucwords(Auth::user()->surname ?? '')}}</label>
        </div>
        <div class="row">
            <label class="col-sm-2">Email</label>
            <label>:</label>
            <label class="col-sm-7">{{Auth::user()->email ?? ''}}</label>
        </div>
        <div class="row">
            <label class="col-sm-2">Password</label>
            <label>:</label>
            <label class="col-sm-7"><a href="/akun/editpass/{{Auth::user()->id ?? ''}}" class="label-control">Lupa password?</a></label>
        </div>
        <div class="row">
            <label class="col-sm-2">NIK</label>
            <label>:</label>
            <label class="col-sm-7">{{Auth::user()->nik ?? ''}}</label>
        </div>
        <div class="row">
            <label class="col-sm-2">Tanggal Lahir</label>
            <label>:</label>
            <label class="col-sm-7">{{Auth::user()->tgl_lahir ?? ''}}</label>
        </div>
        <div class="row">
            <label class="col-sm-2">Telepon</label>
            <label>:</label>
            <label class="col-sm-7">{{Auth::user()->telp ?? ''}}</label>
        </div>
        <div class="row">
            <label class="col-sm-2">Alamat</label>
            <label>:</label>
            <label class="col-sm-7">{{ucwords(Auth::user()->al_detail ?? '')}}, {{ucwords(Auth::user()->kec_pel ?? '')}}, {{ucwords(Auth::user()->kot_pel ?? '')}}, {{ucwords(Auth::user()->prov_pel ?? '')}}, {{Auth::user()->kd_pos ?? ''}}</label>
        </div>
        <div class="row">
        	<label class="col-sm-2">Foto Profil</label>
           	<label>:</label>
            <div class="col-sm-2"><img width="200px" src="{{ url('/assets/customers/'.Auth::user()->image ?? '') }}"></div>
        </div>
</div>
@endsection 