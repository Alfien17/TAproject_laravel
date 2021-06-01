@extends('main')
@section('judul_halaman','')
@section('konten')
<div class="container">
	<div class="mt-4">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb bg-transparent">
		    <li class="breadcrumb-item"><a href="/">Home</a></li>
		    <li class="breadcrumb-item active" aria-current="page">History</li>
		  </ol>
		</nav>
	</div>
	    @if(Session::has('mantap'))
		    <div class="alert alert-success fixed-top" role="alert">
		         <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
		        <i class="fas fa-check-circle"></i> {{Session::get('mantap')}}
		    </div>
		@endif

	<div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Tanggal Pesan</td>
                            <td>Kode Pemesanan</td>
                            <td>Status</td>
                            <td>Pembayaran</td>
                            <td><strong>Total Harga</strong></td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($history as $h)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $h->created_at }}</td>
                            <td>{{ $h->kd_psnan }}</td>
                            <td>{{$h->status}}</td>
                            <td>{{$h->metode}}</td>
                            <td><strong>Rp. {{ number_format((float)$h->harga_total) }}</strong></td>
                            <td><a href="/history/detail/{{$h->kd_psnan}}" class="text-info"><i class="fas fa-info text-info"></i> Detail</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
			            		<div class="content m-5">
				            		<div class="icon"><i class="far fa-sad-tear"></i></div>
			                		<div class="text ml-4">Data Kosong.</div>
		                		</div>
		            		</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <p>*Untuk pembayaran secara transfer bank, silahkan dapat transfer di rekening dibawah ini : </p>
                    <div class="media mb-2">
                        <img class="mr-3" src="/assets/bank/bri.png" width="60">
                        <div class="media-body">
                            <h5 class="mt-0">BANK BRI</h5>
                            No. Rekening 012345-678-910 a.n. <strong>Alfien Sukma Prawira</strong>
                        </div>
                    </div>
					<p>Jangka waktu pembayaran adalah 2x24 jam. Jika tidak, maka barang tidak akan dikirim.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <p>*Untuk pembayaran secara COD, barang akan diantar sesuai alamat dalam jangka waktu paling lama 2 hari.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection