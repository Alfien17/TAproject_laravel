@extends('main')
@section('judul_halaman','')
@section('konten')
<div class="container">
	<div class="mt-4">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb bg-transparent">
		    <li class="breadcrumb-item"><a href="/">Home</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Search</li>
		  </ol>
		</nav>
	</div>
	<h4 class="text-center m-4">Produk yang Anda Cari</h4>
	<div class="row">
		@forelse ($barang as $b)
		<div class="card mr-2 ml-1 mb-3" style="width: 17rem;">
			<img style="height: 260px; width: 100%;"src="{{ url('/assets/goods/'.$b->img_brng) }}" class="card-img-top">
			<div class="card-body">
			    <h5 class="card-title">{{ucwords($b->nm_brng)}}</h5>
			    <p class="card-text desc-control">{{ucfirst(substr($b->desc,0,24))}}...</p>
				<div class="row">
				    <h6 class="col-7 mt-auto">Rp. {{number_format((float)$b->harga)}}</h6>
					<div>
					    <button class="btn btn-primary" data-target="#view{{$b->no}}" data-toggle="modal" title="Lihat detail"><i class="far fa-eye"></i></button>
					    <button class="btn btn-success" data-target="#cart{{$b->no}}" data-toggle="modal" title="Tambahkan ke keranjang"><i class="fas fa-cart-plus"></i></button>
					</div>  
				</div>
			</div>
		</div>
		<!-- Modal View -->
			<div class="modal fade" id="view{{$b->no}}" tabindex="-1" role="dialog" aria-labelledby="ModalBarang" aria-hidden="true" > 
                <div class="modal-dialog modal-lg" role="document">     
                    <div class="modal-content"> 
                       	<div class="modal-header"> 
                            <h5 class="modal-title" id="ModalBarang">Detail Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> 
                            </button>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                           		<div class="col-md-6">
                           			<img style="height: 250px; width: 300px;" src="{{ url('/assets/goods/'.$b->img_brng) }}">
                           		</div>
                           		<div class="col-md-6">
                           			<form method="post" action="/addcart{{$b->no}}" enctype="multipart/form-data">
                           				{{ csrf_field() }}
	                           			<table class="table table-borderless">
		                           			<tr>
		                           				<th>Nama Produk</th>
		                           				<td>{{ucwords($b->nm_brng)}}</td>
		                           			</tr>
		                           			<tr>
		                           				<th>Berat</th>
		                           				<td>{{$b->berat}} {{$b->satuan}}</td>
		                           			</tr>
		                           			<tr>
		                           				<th>Stok</th>
		                           				<td>{{$b->jmlh}} unit</td>
		                           			</tr>
		                           			<tr>
		                           				<th>Deskripsi</th>
		                           				<td>{{ucfirst($b->desc)}}</td>
		                           			</tr>
		                           			<tr>
		                           				<th>Harga</th>
		                           				<td>Rp. {{number_format((float)$b->harga)}}</td>
		                           			</tr>
		                           			<tr class="form-group">
		                           				<th><label class="col-form-label">Jumlah</label></th>
		                           				<td><input type="number" class="form-control" name="jumlah" required value="{{old('jumlah')}}" autocomplete="off"></td>	
		                           			</tr>
		                           		</table>
                           		</div>
                           </div>             
                       	</div> 
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" title="Batal">Batal</button> 
                            <button type="submit" class="btn btn-success" title="Tambahkan ke keranjang"><i class="fas fa-cart-plus"></i></button>
                        </div>
                        </form> 
                    </div> 
                </div> 
            </div>
			<!-- Modal Cart -->
			<div class="modal fade" id="cart{{$b->no}}" tabindex="-1" role="dialog" aria-labelledby="ModalBarang" aria-hidden="true" > 
                <div class="modal-dialog modal-lg" role="document">     
                    <div class="modal-content"> 
                       	<div class="modal-header"> 
                            <h5 class="modal-title" id="ModalBarang">Masukkan Keranjang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> 
                            </button>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                           		<form method="post" action="/addcart{{$b->no}}" enctype="multipart/form-data">
                           			{{ csrf_field() }}
 									<div class="row ml-3">
									  	<label class="form-label">Mau beli berapa?</label>
									  	<input type="number" name="jumlah" class="form-control" placeholder="Masukkan disini" required value="{{old('jumlah')}}" autocomplete="off">
									</div>
 							</div>
 						</div>
			            <div class="modal-footer"> 
			                <button type="button" class="btn btn-secondary" data-dismiss="modal" title="Batal">Batal</button> 
			                <button type="submit" class="btn btn-success" title="Tambahkan ke keranjang"><i class="fas fa-cart-plus"></i></button>
			            </div>
                        </form> 
                    </div> 
                </div> 
            </div>
            @empty
			<div class="content mx-auto m-5">
                <div class="icon text-center"><i class="far fa-sad-tear"></i></div>
                <div class="text text-center">Maaf, tapi {{$search}} tidak dapat kami temukan.</div>
            </div>
			@endforelse
		</div>
		<div class="row m-3">
            {{ $barang->links() }}
		</div>
	</div>
@endsection