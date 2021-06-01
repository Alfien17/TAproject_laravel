@extends('main')
@section('judul_halaman','')
@section('konten')
<div class="container">
	<div class="mt-4">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb bg-transparent">
		    <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/history">History</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Detail</li>
		  </ol>
		</nav>
	</div>

    <div class="row mt-4 mb-3">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Pemesanan</td>
                            <td>Jumlah</td>
                            <td><strong>Harga</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($transaksi_detail as $t)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $t->nama }}</td>
                            <td>{{ $t->jumlah }}</td>
                            <td><strong>Rp. {{ number_format((float)$t->total) }}</strong></td>
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
    <a href="/history" title="Back" role="button" class="btn btn-secondary mb-3"><i class="fas fa-arrow-circle-left mr-2"></i>Back</a>
</div>
@endsection