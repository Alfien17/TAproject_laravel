@extends('main')
@section('judul_halaman','')
@section('konten')
@if(Session::has('success'))
	<div class="alert alert-success fixed-top" role="alert">
	    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
	    <i class="fas fa-exclamation-triangle"></i> {{Session::get('success')}}
	</div>
@endif
<div class="container">
	<div class="mt-4">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb bg-transparent">
		    <li class="breadcrumb-item"><a href="/">Home</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Cart</li>
		  </ol>
		</nav>
	</div>
	<div class="table-responsive">
	    <table class="table text-center table-hover table-bordered" id="table-data">
	       <thead class="table-control">
	            <tr>
	                <th>No</th>
	                <th>Nama</th> 
	                <th>Jumlah</th>
	                <th>Harga</th>
	                <th>Status</th>
	                <th>Option</th>
	            </tr>
	        </thead>
	    	<tbody>
			@forelse($cart as $c)
	    	<?php $no = 1 ?>
	            <tr>
	                <td>{{$no++}}</td>
	                <td>{{ucwords($c->nama)}}</td>
	                <td>{{$c->jumlah}}</td>
	                <td>{{number_format((float)$c->total)}}</td>
	                <td>{{$c->status}}</td>
	                <td>
	                    <a href="/cart/delete/{{$c->id}}" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data?');"><i class="fas fa-trash-alt text-danger"></i></a>
	                </td>
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
	        <tfoot>
	        	@foreach($harga as $h)
	        	<tr>
	        		<th colspan="3" class="text-right">Total</th>
	        		<th colspan="3" class="text-left">Rp. {{number_format((float)$h->harga_total)}}</th>
	        	</tr>
	        	<tr>
	        		<td colspan="6">
	        			<a href="/cart/checkout" class="btn btn-success float-right">Check Out <i class="fas fa-arrow-right"></i></a>
	        		</td>
	        	</tr>
	        	@endforeach
	        </tfoot>
	    </table>
	</div>
</div>
@endsection