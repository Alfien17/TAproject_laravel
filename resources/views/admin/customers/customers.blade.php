@extends('mainadmin')
@section('judul_halaman','Data Customers')
@section('konten')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
            <i class="fas fa-check-circle"></i> {{Session::get('success')}}
        </div>
    @endif
    <div class="d-md-flex justify-content-md-end">
        <form action="/mainadmin/customers/search" method="get">
            <div class="input-group">
                <input type="search" name="search" class="form-control" autocomplete="off">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </span>
            </div>
        </form>
      <a href="/mainadmin/customers/add" class="btn btn-success ml-2" type="button" title="Add"><i class="fas fa-plus"></i></a>
    </div><br>
    <div class="table-responsive">
        <table 
            class="table table-striped table-hover table-bordered" id="table-data">
            <thead class="table-control">
                <tr>
                    <th>No</th>
                    <th>Kode</th> 
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Kota/Kab.</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach($customers as $c)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$c->kd_pel}}</td>
                    <td>{{$c->forename}}</td>
                    <td>{{$c->telp}}</td>
                    <td>{{$c->email}}</td>
                    <td>{{$c->kot_pel}}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-info" data-target="#view{{$c->id}}" data-toggle="modal" class="btn btn-info" title="View More"><i class="fas fa-info-circle"></i></button> 
                        <!-- Modal View -->
                        <div class="modal fade" id="view{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="ModalCustomers" aria-hidden="true" > 
                            <div class="modal-dialog" role="document">     
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <h5 class="modal-title" id="ModalCustoemrs">Data Customers</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> 
                                        </button>
                                    </div>
                                    <div class="modal-body text-left">
                                        <div class="row">
                                            <label class="col-sm-2"><strong>Kode</strong></label>
                                            <div class="col-sm-1"><strong>:</strong></div>
                                            <div class="col-sm-5"><strong>{{$c->kd_pel}}</strong></div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Nama</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-5">{{$c->forename}} {{$c->surname}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">NIK</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-5">{{$c->nik}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Tanggal Lahir</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-5">{{$c->tgl_lahir}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Telepon</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-5">{{$c->telp}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Email</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-5">{{$c->email}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Alamat</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-9">{{$c->al_detail}}, {{$c->kec_pel}}, {{$c->kot_pel}}, {{$c->prov_pel}}, {{$c->kd_pos}}</div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">Foto Profil</label>
                                            <div class="col-sm-1">:</div>
                                            <div class="col-sm-5"><img width="100px" src="{{ url('/assets/customers/'.$c->image) }}"></div>
                                        </div>
                                    </div> 
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                        <a href="/mainadmin/customers/edit/{{$c->id}}" role="button" class="btn btn-warning" title="Edit"><i class="far fa-edit"></i></a>
                        <a href="/mainadmin/customers/delete/{{$c->id}}" role="button" class="btn btn-danger" title="Delete" onclick="return confirm('Anda yakin ingin hapus data?');"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="float-right">
            {{ $customers->links() }}
        </div>
    </div>
@endsection 