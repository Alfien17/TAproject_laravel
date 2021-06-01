@extends('mainadmin')
	@section('judul_halaman','Dashboard')
	@section('konten')
	<div class="row text-white">
    <div class="card bg-success ml-5" style="width: 18rem;">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-utensils mr-2"></i>
        </div>
        <h5 class="card-title">Jumlah Barang</h5>
        <div class="display-4" style="font-weight: bold;">{{$itembrg}}</div>
        <a href="/mainadmin/barang/"><p class="card-text">Lihat Detail<i class="fas fa-arrow-alt-circle-right ml-2"></i></p></a>
      </div>
    </div>
    <div class="card bg-warning ml-5" style="width: 18rem;">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-users mr-2"></i>
        </div>
        <h5 class="card-title">Jumlah Customers</h5>
        <div class="display-4" style="font-weight: bold;">{{$itemcstmr}}</div>
        <a href="/mainadmin/customers/"><p class="card-text">Lihat Detail<i class="fas fa-arrow-alt-circle-right ml-2"></i></p></a>
      </div>
    </div>
    <div class="card bg-info ml-5" style="width: 18rem;">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-shopping-cart mr-2"></i>
        </div>
        <h5 class="card-title">Jumlah Transaksi</h5>
        <div class="display-4" style="font-weight: bold;">{{$itemtrans}}</div>
        <a href="/mainadmin/transaksi/"><p class="card-text">Lihat Detail<i class="fas fa-arrow-alt-circle-right ml-2"></i></p></a>
      </div>
    </div>
    <div class="card bg-secondary ml-5 mt-4 col-8 mx-auto" style="width: 18rem;">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-hand-holding-usd"></i>
        </div>
        <h5 class="card-title">Transfer Masuk</h5>
        <div class="display-4" style="font-weight: bold;">Rp. {{number_format((float)$transaksi)}}</div>
        <a href="/mainadmin/transaksi/"><p class="card-text">Lihat Detail<i class="fas fa-arrow-alt-circle-right ml-2"></i></p></a>
      </div>
    </div>
  </div>
	@endsection	