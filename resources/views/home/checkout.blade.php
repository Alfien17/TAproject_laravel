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
		    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
		  </ol>
		</nav>
	</div>
	    @if(Session::has('hore'))
		    <div class="alert alert-success fixed-top" role="alert">
		         <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
		        <i class="fas fa-check-circle"></i> {{Session::get('hore')}}
		    </div>
		@endif
	<div class="row mt-4 mb-5">
		<div class="col">
			<h4>Informasi Pembayaran</h4>
			<hr>
			<p>Pilih metode pembayaran:</p>
			<div class="form-check">
			<form method="post" action="/checkout">
			{{ csrf_field() }}
			@if($c->kot_pel != 'cimahi' && $c->kot_pel != 'Cimahi')
			  	<input class="form-check-input" type="radio" name="metode" disabled value="cod"  @if (old('metode') == 'cod') checked @endif required>
			@else
				<input class="form-check-input" type="radio" name="metode" value="cod"  @if (old('metode') == 'cod') checked @endif required>
			@endif
			  <label class="form-check-label ml-2" for="flexRadioDefault1">
			    COD (Tersedia hanya untuk Kota Cimahi)
			  </label>
			</div>
			<div class="form-check mt-2">
			  <input class="form-check-input" type="radio" name="metode" value="transfer"  @if (old('metode') == 'transfer') checked @endif required>
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
				<table>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td>{{ ucwords($c->forename) }} {{ ucwords($c->surname) }}</td>
					</tr>
					<tr>
						<td>No. Telp</td>
						<td>:</td>
						<td>{{ $c->telp }}</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td>{{ucwords($c->al_detail)}}, {{ucwords($c->kec_pel)}}, {{ucwords($c->kot_pel)}}, {{ucwords($c->prov_pel)}}, {{$c->kd_pos}}</td>
					</tr>
				</table>
				<div class="row mt-4">
					<div class="col-12">
						<a href="/cart" class="btn btn-secondary mr-6" title="Back"><i class="fas fa-arrow-left"></i> Back</a>
						<a href="/cart/checkout/editcheckout{{$c->id}}" class="btn btn-warning " title="Edit"><i class="far fa-edit"></i> Edit</a>
						<button type="submit" class="btn btn-success float-right" title="Checkout" onclick="return confirm('Anda yakin ingin checkout?');">Checkout <i class="fas fa-arrow-right"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach
@endsection