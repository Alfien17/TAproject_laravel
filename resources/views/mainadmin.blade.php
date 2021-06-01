<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/fontawesome-free-5.15.3-web/css/all.min.css">
    <title>Admin Perpus</title>
  </head>
  <body>
  	@if(Session::has('berhasil'))
	<div class="alert alert-success fixed-top" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
		<i class="fas fa-check-circle"></i> {{Session::get('berhasil')}}
	</div>
	@endif
	<div class="wrapper">
		 <nav id="sidebar" class="bg-dark">
		 	 <div class="sidebar-header bg-dark">
		 	 	<div class="mb-2 bg-dark text-center">
		 	 		<h4 style="color: #fff;">Cireunfood.id</h4>
			 	 </div>
		 	 </div>
		 	 <ul class="lisst-unstyled components">
		 	 	<li class="active">
		 	 		<a href="/mainadmin"><i class="fas fa-tachometer-alt mr-4 ml-2"></i>Dashboard</a>
		 	 	</li>
		 	 	<li>
		 	 		<a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
		 	 			<i class="fas fa-file-alt text-right mr-4 ml-3"></i>Kelola Data</a>
		 	 		<ul class="collapse list-unstyled" id="pageSubmenu1">
		 	 			<li>
		 	 				<a href="/mainadmin/barang"><i class="fas fa-utensils mr-4"></i>Data Barang</a>
		 	 			</li>
		 	 			<li>
		 	 				<a href="/mainadmin/customers"><i class="fas fa-users mr-3"></i>Data Customers</a>
		 	 			</li>
		 	 		</ul>
		 	 	</li>
		 	 	<li>
		 	 		<a href="/mainadmin/transaksi"><i class="fas fa-shopping-cart ml-2 mr-4"></i>Transaksi</a>
		 	 	</li>
		 	 	<li>
		 	 		<a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-cog ml-2 mr-4"></i>Lainnya</a>
		 	 		<ul class="collapse list-unstyled" id="pageSubmenu2">
		 	 			<li>
		 	 				<a href="/mainadmin/akun"><i class="fas fa-user mr-4"></i>Akun</a>
		 	 			</li>
		 	 			<li>
		 	 				<a href="/logout" onclick="return confirm('Anda yakin ingin logout?');"><i class="fas fa-sign-out-alt mr-4"></i>Keluar</a>
		 	 			</li>
		 	 		</ul>
		 	 	</li>
		 	 </ul>
		</nav>
		<div id="content">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  	<a href="#" id="sidebarCollapse" class="btn btn-outline-secondary" title="Toggle Navbar"><i class="fas fa-align-justify"></i></a>
			  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		            <span class="navbar-toggler-icon"></span>
		        </button>	
		        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            		<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                		<li class="nav-item active">
                			<div class="media d-flex align-items-center">
	                			<img src="{{ url('/assets/account/'.Auth::user()->image ?? '') }}" alt="..." width="40" height="40" class="rounded-circle img-thumbnail shadow-sm" title="{{Auth::user()->forename ?? ''}}">
	                			<a class="nav-link" href="/mainadmin/akun" title="{{Auth::user()->forename ?? ''}}">{{Auth::user()->forename ?? ''}}</a>
	                		</div>
                		</li>
                		<li class="nav-item">
                			<a class="nav-link" href="/logout" title="Keluar" onclick="return confirm('Anda yakin ingin logout?');"><i class="fas fa-sign-out-alt mr-2"></i>Keluar</a>
                		</li>
           			 </ul>
            	</div>	
			</nav>
			<br><br>
			<div class="container-fluid">
				<!-- Bagian Judul -->
			    <h3>@yield('judul_halaman')</h3>
			    <!-- Bagian Konten -->
			    @yield('konten')
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var menu = document.querySelector("#sidebarCollapse")
		var sidebar = document.querySelector("#sidebar")
		var container = document.querySelector(".container-fluid")
		menu.addEventListener("click",()=>{
			sidebar.classList.toggle("active")
		})
	</script>
	<script type="text/javascript" src="/js/popper.js"></script>
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/bootstrap.js"></script>
  </body>
</html>