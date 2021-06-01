<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/fontawesome-free-5.15.3-web/css/all.min.css">
    <title>Cireunfood.id</title>
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  		@if(Session::has('sukses'))
	      <div class="alert alert-success fixed-top" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
	        <i class="fas fa-check-circle"></i> {{Session::get('sukses')}}
	      </div>
	    @endif
	    @if(Session::has('success'))
	      <div class="alert alert-success fixed-top" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
	        <i class="fas fa-check-circle"></i> {{Session::get('success')}}
	      </div>
	    @endif
	    @if(Session::has('berhasil'))
	      <div class="alert alert-success fixed-top" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
	        <i class="fas fa-check-circle"></i> {{Session::get('berhasil')}}
	      </div>
	    @endif
		@if(Session::has('gagal'))
	      <div class="alert alert-danger fixed-top" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
	        <i class="fas fa-check-circle"></i> {{Session::get('gagal')}}
	      </div>
	    @endif

  		<div class="container">
		    <a class="navbar-brand" href="#">Cireunfood.id</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<ul class="navbar-nav mr-auto">
		      		<li class="nav-item active">
		        		<a class="nav-link" href="/" title="Home">Home</a>
		      		</li>
		      		<li class="nav-item dropdown">
				        <a class="nav-link dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Kategori">
				          Categories <i class="fas fa-chevron-down"></i>
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          	<a class="dropdown-item" href="#ringan">Makanan Ringan</a>
				          	<a class="dropdown-item" href="#pokok">Makanan Pokok</a>
				        </div>
				     </li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="/history" title="Riwayat Pembelian">History</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="#about" title="Tentang Kami">About</a>
		      		</li>
		    	</ul>
		    	<div class="navbar-nav mr-4 text-white mt-2">
		    		<a href="/cart"><i class="fas fa-shopping-cart" title="Keranjang"></i>
		    			@if(!empty($jumlah_pesanan))
		    			<span class="badge bg-danger">{{$jumlah_pesanan}}</span>
		    			@endif
		    			</a>
		    	</div>
		    	<form action="/search" method="get">
		            <div class="input-group">
		                <input value="{{Request::get('search')}}" type="search" name="search" class="form-control" autocomplete="off" placeholder="Search" title="Cari">
		                <span class="input-group-prepend">
		                    <button type="submit" class="btn btn-outline-light" title="Cari"><i class="fas fa-search"></i></button>
		                </span>
		            </div>
		        </form>
		        <div class="dropdown-divider"></div>
		        <div class="navbar-nav d-flex align-items-center ml-4 mt-auto">
		        	@if(Auth::user())
		        	<img src="{{ url('/assets/customers/'.Auth::user()->image ?? '')}}" alt="..." width="30" height="30" class="rounded-circle border border-white" title="{{Auth::user()->forename ?? ''}}">
		        	@else
		        	<img src="{{ url('/assets/customers/default.png')}}" alt="..." width="30" height="30" class="rounded-circle border border-white" title="{{Auth::user()->forename ?? ''}}">
		        	@endif
		        	@if(!Auth::user())
		        		<li class="nav-item dropdown">
		              <a class="nav-link text-white" href="#" title="Login" id="navbarDropdown" data-toggle="dropdown">Login?</a>
						    	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						    		<a class="dropdown-item" href="/login">Login</a>
						    		<a class="dropdown-item" href="/create-daftar1">Register</a>
						    		<div class="dropdown-divider"></div>
						    		<a class="dropdown-item" href="/admin" target="_blank">Admin</a>
						    	</div>
								</li>
	                @else
	                	<li class="nav-item dropdown">
		                	<a class="nav-link text-white" href="#" title="{{Auth::user()->forename ?? ''}}" id="navbarDropdown" data-toggle="dropdown">{{Auth::user()->forename ?? ''}} <i class="fas fa-chevron-down"></i></a>
					    	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					    		<a class="dropdown-item" href="/akun">Account</a>
					    		<div class="dropdown-divider"></div>
					    		<a class="dropdown-item" href="/logout2" onclick="return confirm('Anda yakin ingin logout?');">Logout</a>
					    	</div>
						</li>
	                @endif
		        </div>
		  	</div>
		 </div>
	</nav>
	<br><br>
	<!-- Bagian Judul -->
	<h3>@yield('judul_halaman')</h3>
	<!-- Bagian Konten -->
	@yield('konten')
	<section id="about">
		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<h6>About</h6>
						<p class="text-justify">
							<strong>Kampung Adat Cireundeu</strong><br> 
							Kelurahan Leuwigajah, Kecamatan Cimahi Selatan, Kota Cimahi, Jawa Barat
							Dengan alamat (d/a)
							<strong>Pengelola Dinas Koperasi, UMKM, Perdagang dan Pertanian
							Seksi Pariwisata dan Kebudayaan Kota Cimahi</strong>
							Jl. Rd. Demang Hardjakusuma Blok Jati, Cihanjuang, Cimahi<br>
							Telp.: (62) 22 6631859<br>
							Website: <a href="https://kampungadatcireundeu.wordpress.com">https://kampungadatcireundeu.wordpress.com</a>
						</p>
					</div>
					<div class="col-6 col-md-3">
					</div>
					<div class="col-6 col-md-3">
						<h6>Categories</h6>
						<ul class="footer-links">
							<li><a href="#ringan">Makanan Ringan</a></li>
							<li><a href="#pokok">Makanan Pokok</a></li>
						</ul>
					</div>
				</div>
				<hr class="small">
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-6 col-xs-12">
						<p class="copyright-text">Copyright &copy; 2021 All Rights Reserve by Alfien Sukma Prawira - SMK Negeri 1 Cimahi</p>
					</div>
					<div class="col-md-4 col-sm-6 col-12">
						<ul class="social-icons inline">
							<li><a href="#"><i class="fab fa-facebook"></i></a></li>
							<li><a href="https://www.instagram.com/alfiensukma/" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
							<li><a href="#"><i class="far fa-envelope"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>	
	</section>
	<script type="text/javascript" src="/js/popper.js"></script>
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
  </body>
</html>