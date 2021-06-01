@extends('mainadmin')
@section('judul_halaman','Data Transaksi')
@section('konten')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
            <i class="fas fa-check-circle"></i> {{Session::get('success')}}
        </div>
    @endif
    <div class="d-md-flex justify-content-md-end">
        <form action="/mainadmin/transaksi/search" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control" autocomplete="off">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </span>
            </div>
        </form>
    </div><br>
    <div class="table-responsive">
        <table 
            class="table table-striped table-hover table-bordered" id="table-data">
            <thead class="table-control">
                <tr>
                    <th>No</th>
                    <th>K. Pesanan</th> 
                    <th>K. Pelanggan</th>
                    <th>Harga</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach($transaksi as $t)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$t->kd_psnan}}</td>
                    <td>{{$t->kd_pel}}</td>
                    <td>{{$t->harga_total}}</td>
                    <td>Secara {{$t->metode}}</td>
                    <td>{{$t->status}}</td>
                    <td class="text-center">
                        <a href="/mainadmin/transaksi/edit/{{$t->id}}" role="button" class="btn btn-warning" title="Edit"><i class="far fa-edit"></i></a></a>
                        <a href="/mainadmin/transaksi/detail/{{$t->kd_psnan}}" role="button" class="btn btn-info" title="Detail"><i class="fas fa-info"></i></a></td>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="float-right">
            {{ $transaksi->links() }}
        </div>
    </div>
@endsection 