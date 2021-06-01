@extends('mainadmin')
@section('judul_halaman','Data Barang')
@section('konten')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
            <i class="fas fa-check-circle"></i> {{Session::get('success')}}
        </div>
    @endif
    <div class="d-md-flex justify-content-md-end">
        <form action="/mainadmin/barang/search" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control" autocomplete="off">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </span>
            </div>
        </form>
      <a href="/mainadmin/barang/add" class="btn btn-success ml-2" type="button" title="Add"><i class="fas fa-plus"></i></a>
    </div><br>
    <div class="table-responsive">
        <table 
            class="table table-striped table-hover table-bordered" id="table-data">
            <thead class="table-control">
                <tr>
                    <th>No</th>
                    <th>Kode</th> 
                    <th>Nama</th>
                    <th>Berat</th>
                    <th>Jumlah</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach($barang as $b)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$b->kd_brng}}</td>
                    <td>{{$b->nm_brng}}</td>
                    <td>{{$b->berat}} {{$b->satuan}}</td>
                    <td>{{$b->jmlh}} unit</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-info" data-target="#view{{$b->no}}" data-toggle="modal" class="btn btn-info" title="View More"><i class="fas fa-info-circle"></i></button> 
                        <!-- Modal View -->
                        <div class="modal fade" id="view{{$b->no}}" tabindex="-1" role="dialog" aria-labelledby="ModalBarang" aria-hidden="true" > 
                            <div class="modal-dialog" role="document">     
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <h5 class="modal-title" id="ModalBarang">Data Barang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> 
                                        </button>
                                    </div>
                                    <div class="modal-body text-left">
                                        <div class="row">
                                            <label class="col-sm-2"><strong>Kode</strong></label>
                                            <div class="col-sm-1"><strong>:</strong></div>
                                            <div class="col-sm-5"><strong>{{$b->kd_brng}}</strong></div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Nama</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-5">{{$b->nm_brng}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">kategori</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-5">Makanan {{$b->kategori}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Berat per Unit</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-5">{{$b->berat}} {{$b->satuan}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Jumlah</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-5">{{$b->jmlh}} unit</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Harga per Unit</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-5">Rp. {{$b->harga}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Deskripsi</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-9">{{$b->desc}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Gambar</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-5"><img width="100px" src="{{ url('/assets/goods/'.$b->img_brng) }}"></div>
                                        </div>
                                    </div> 
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                        <a href="/mainadmin/barang/edit/{{$b->no}}" role="button" class="btn btn-warning" title="Edit"><i class="far fa-edit"></i></a>
                        <a href="/mainadmin/barang/delete/{{$b->no}}" role="button" class="btn btn-danger" title="Delete" onclick="return confirm('Anda yakin ingin hapus data?');"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="float-right">
            {{ $barang->links() }}
        </div>
    </div>
@endsection 