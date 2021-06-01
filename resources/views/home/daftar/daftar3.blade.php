@extends('loglayout')
@section('judul_halaman','Register')
@section('konten')
<h5>Verifikasi alamat kamu</h5> 
<form action="{{ route('daftar3.post') }}" method="post">
    {{ csrf_field() }}
    <div class="form-row">
        <div class="col-lg-7">
            <input type="text" name="prov_pel" class="form-control my-3 p-4" placeholder="Provinsi" required value="{{old('prov_pel', $daftar->prov_pel ?? '')}}" autocomplete="off">
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7">
            <input type="text" name="kot_pel" class="form-control my-3 p-4" placeholder="Kota/Kabupaten" required value="{{old('kot_pel', $daftar->kot_pel ?? '')}}" autocomplete="off">
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7">
            <input type="text" name="kec_pel" class="form-control my-3 p-4" placeholder="Kecamatan" required value="{{old('kec_pel', $daftar->kec_pel ?? '')}}" autocomplete="off">
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7">
            <input type="number" name="kd_pos" class="form-control my-3 p-4 {{$errors->has('kd_pos')?'is-invalid':''}}" placeholder="Kode Pos" required value="{{old('kd_pos', $daftar->kd_pos ?? '')}}" autocomplete="off">
            @error('kd_pos')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7">
            <textarea name="al_detail" class="form-control my-3 p-4" placeholder="Nama jalan, gedung, nomor rumah" required>{{old('al_detail', $daftar->al_detail ?? '')}}</textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="col-lg-7">
            <a href="/create-daftar2" class="btn btn-secondary">Previous</a>
            <button type="submit" class="btn1 col-3 float-right" style="height: 37px;">Submit</button> 
        </div>
    </div>
</form><a href="/login" class="float-right mb-3 mt-2" title="Back to login"><i class="fas fa-arrow-circle-left mr-2"></i>Back</a>
@endsection