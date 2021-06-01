@extends('mainadmin')
@section('judul_halaman','Data Transaksi')
@section('konten')
    <h5>Edit Transaksi</h5>
    @foreach($transaksi as $t)
    <form method="post" action="/mainadmin/postedit" enctype="multipart/form-data">
    {{ csrf_field() }}
        @if (count($errors)>0)
            <div class="alert alert-danger d-flex  align-item-center alert-dismissible fade show" role="alert">
                <ul style="list-style:none">
                    @foreach($errors->all() as $error)
                    <li><span class="fas fa-exclamation-triangle"></span>
                    {{$error}}</li>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
                    @endforeach
                </ul>
                </div>
            </div>
        @endif
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 col-form-label text-right">Status</label>
                <div class="col-sm-9">
                    <input type="hidden" name="id" value="{{$t->id}}">
                    <select class="col-form-label" name="status" class="form-control form-control2" required>
                        <option value="{{$t->status}}"  selected>{{$t->status}}</option>
                        <option disabled="true">------------------------</option>
                        <option value="Sedang diproses">Sedang diproses</option>
                        <option value="Belum dibayar">Belum dibayar</option>
                        <option value="Sudah dibayar">Sudah dibayar</option>
                    </select>
                </div>
            </div>
        <div class="form-group">
            <div class="col-sm-10 text-right">
                <a class="btn btn-light" href="/mainadmin/transaksi">Batal</a>
                <input type="submit" class="btn btn-primary" value="Kirim">
            </div>
        </div>
    </form>
    @endforeach
@endsection 