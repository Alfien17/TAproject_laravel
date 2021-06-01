@extends('main')
@section('judul_halaman','')
@section('konten')
@foreach($checkout as $c)
<div class="container">
	<div class="mt-4">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb bg-transparent">
		    <li class="breadcrumb-item"><a href="/">Home</a></li>
		    <li class="breadcrumb-item"><a href="/cart">Cart</a></li>
		    <li class="breadcrumb-item"><a href="/cart/checkout">Checkout</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Edit-Checkout</li>
		  </ol>
		</nav>
	</div>

	<div class="row mt-4">
		<div class="col">
			<h4>Informasi Pembayaran</h4>
			<hr>
			<p>Pilih metode pembayaran:</p>
			<form method="post" action="/editcheckout" nctype="multipart/form-data">
				{{ csrf_field() }}
			<div class="form-check">
			@if($c->kot_pel != 'cimahi' && $c->kot_pel != 'Cimahi')
			  	<input class="form-check-input" type="radio" name="metode" valur="cod" disabled>
			@else
				<input class="form-check-input" type="radio" name="metode" value="cod">
			@endif
			  <label class="form-check-label ml-2" for="flexRadioDefault1">
			    COD (Tersedia hanya untuk Kota Cimahi)
			  </label>
			</div>
			<div class="form-check mt-2">
			  <input class="form-check-input" type="radio" name="flexRadioDefault" value="transfer">
			    <div class="d-flex align-items-center">
				  <div class="flex-shrink-0">
				    <img src="/assets/bank/bri.png" width="60">
				  </div>
				  <div class="flex-grow-1 ms-3 ml-3">
				    <h5>Bank BRI</h5>No. Rekening 012345-678-910 a.n. <strong>Alfien Sukma Prawira</strong>
				  </div>
				</div>
			</div>
			@foreach($harga as $h)
			<br>
			<h5>Total Pembayaran : <strong>Rp. {{number_format((float)$h->harga_total)}}</strong></h5>
			@endforeach
		</div>

		<div class="col">
			<h4>Informasi Pengiriman</h4>
			<hr>
				<div class="form-group">
					<label>Nama Depan</label>
					<input type="text" name="forename" class="form-control {{$errors->has('forename')?'is-invalid':''}}" value="{{ $c->forename }}" autocomplete="off" placeholder="Masukkan Nama Depan" autofocus required>
					<input type="hidden" name="id" value="{{$c->id}}">
					@error('forename')
		            <div class="invalid-feedback">{{$message}}</div>
		            @enderror
				</div>
				<div class="form-group">
					<label>Nama Belakang</label>
					<input type="text" name="surname" class="form-control {{$errors->has('surname')?'is-invalid':''}}" value="{{ $c->surname }}" autocomplete="off" placeholder="Masukkan Nama Belakang" required>
					@error('surname')
		            <div class="invalid-feedback">{{$message}}</div>
		            @enderror
				</div>
				<div class="form-group">
					<label>No. Telp</label>
					<input type="number" name="telp" class="form-control {{$errors->has('telp')?'is-invalid':''}}" value="{{ $c->telp }}" autocomplete="off" placeholder="Masukkan Nomor Telepon" required>
					@error('telp')
		            <div class="invalid-feedback">{{$message}}</div>
		            @enderror
				</div>
				<div class="form-group">
					<label>Kecamatan</label>
					<input type="text" name="kec_pel" class="form-control {{$errors->has('kec_pel')?'is-invalid':''}}" value="{{ $c->kec_pel }}" autocomplete="off" required placeholder="Masukkan Kecamatan" required>
					@error('kec_pel')
		            <div class="invalid-feedback">{{$message}}</div>
		            @enderror
				</div>
				<div class="form-group">
					<label>Kabupaten/Kota</label>
					<input type="text" name="kot_pel" class="form-control {{$errors->has('kot_pel')?'is-invalid':''}}" value="{{ $c->kot_pel }}" autocomplete="off" required placeholder="Masukkan Kabupaten/Kota" required>
					@error('kot_pel')
		            <div class="invalid-feedback">{{$message}}</div>
		            @enderror
				</div>
				<div class="form-group">
					<label>Provinsi</label>
					<input type="text" name="prov_pel" class="form-control {{$errors->has('prov_pel')?'is-invalid':''}}" value="{{ $c->prov_pel }}" autocomplete="off" required placeholder="Masukkan Provinsi" required>
					@error('prov_pel')
		            <div class="invalid-feedback">{{$message}}</div>
		            @enderror
				</div>
				<div class="form-group">
					<label>Kode Pos</label>
					<input type="text" name="kd_pos" class="form-control {{$errors->has('kd_pos')?'is-invalid':''}}" value="{{ $c->kd_pos }}" autocomplete="off" required placeholder="Masukkan Kode Pos" required>
					@error('kd_pos')
		            <div class="invalid-feedback">{{$message}}</div>
		            @enderror
				</div>
				<div class="form-group">
					<label>Alamat Detail</label>
					<textarea name="al_detail" class="form-control" required placeholder="Nama jalan, gedung, nomor rumah" required>{{$c->al_detail}}</textarea>
				</div>
				<div class="form-group">
					<a href="/cart/checkout" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
					<button type="submit" class="btn btn-primary float-right"><i class="far fa-check-circle"></i> Submit </button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach
@endsection