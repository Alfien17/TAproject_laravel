@extends('loglayout')
@section('judul_halaman','Register')
@section('konten')
<h5>Verifikasi identitas diri kamu</h5> 
<form action="{{ route('daftar2.post') }}" method="post">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="col-lg-7">
            <input type="text" name="forename" class="form-control my-3 p-4 {{$errors->has('forename')?'is-invalid':''}}" placeholder="Nama Depan" required value="{{old('forename', $daftar->forename ?? '')}}" autocomplete="off">
            @error('forename')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7">
            <input type="text" name="surname" class="form-control my-3 p-4" placeholder="Nama Belakang" required value="{{old('surname', $daftar->surname ?? '')}}" autocomplete="off">
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7">
            <input type="number" name="nik" class="form-control my-3 p-4 {{$errors->has('nik')?'is-invalid':''}}" placeholder="NIK" required value="{{old('nik', $daftar->nik ?? '')}}" autocomplete="off">
            @error('nik')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7"> 
            <input type="date" name="tgl_lahir" class="form-control my-3 p-4 {{$errors->has('tgl_lahir')?'is-invalid':''}}" required value="{{old('tgl_lahir', $daftar->tgl_lahir ?? '')}}" >
            @error('tgl_lahir')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7">
            <input type="number" name="telp" class="form-control my-3 p-4 {{$errors->has('telp')?'is-invalid':''}}" placeholder="No telepon" required value="{{old('telp', $daftar->telp ?? '')}}" autocomplete="off">
            @error('telp')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7">
            <a href="/create-daftar1" class="btn btn-secondary">Previous</a>
            <button type="submit" class="btn btn-primary float-right">Next</button>
        </div>
    </div>
</form><a href="/login" class="float-right mb-3 mt-2" title="Back to login"><i class="fas fa-arrow-circle-left mr-2"></i>Back</a>
@endsection