@extends('mainadmin')
@section('judul_halaman','Detail Transaksi')
@section('konten')
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-center" id="table-data">
        <thead class="table-control">
            <tr>
                <td>No.</td>
                <td>Pemesanan</td>
                <td>Jumlah</td>
                <td><strong>Harga</strong></td>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1 ?>
            @foreach ($transaksi_detail as $t)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $t->nama }}</td>
                <td>{{ $t->jumlah }}</td>
                <td><strong>Rp. {{ number_format((float)$t->total) }}</strong></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<a href="/mainadmin/transaksi" role="button" class="btn btn-secondary float-right mt-3">Kembali</a>
@endsection 