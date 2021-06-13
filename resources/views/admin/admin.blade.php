<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/fontawesome-free-5.15.3-web/css/all.min.css">
	<title>Cireunfood.id | Admin Login</title>
</head>
<body>
	<div id="formWrapper">
		<div id="form">
			<div>
				<h3 class="text-center">Login</h3>
				<h5 class="text-center head">Admin Cireunfood.id</h5>
			</div>
			@if(Session::has('success'))
		        <div class="alert alert-success fixed-top" role="alert">
		            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
		            <i class="fas fa-check-circle"></i> {{Session::get('success')}}
		        </div>
		    @endif
			@if(Session::has('fail'))
		        <div class="alert alert-danger fixed-top" role="alert">
		            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
		            <i class="fas fa-exclamation-triangle"></i> {{Session::get('fail')}}
		        </div>
		    @endif
			<form method="post" action="{{route('admin')}}">
				{{ csrf_field() }}
                <div class="form-item">
					<input type="email" name="email" class="form-style {{$errors->has('email')?'is-invalid':''}}" required placeholder="Email" value="{{old('email')}}" autocomplete="off">
				</div>
				<div class="form-item">
					<input type="password" name="password" class="form-style {{$errors->has('password')?'is-invalid':''}}" required placeholder="Password">
                    <div class="row-5">
                    	<a href="/admin/forgot-password" role="button" class="btn btn-link login">Lupa password?</a>
                    	<a href="/admin/register" role="button" class="btn btn-link login float-right mr-2">Daftar</a>
                	</div>
				</div>
				<div class="form-item">
					<input type="submit" class="login pull-right" value="Login">
					<a href="/" class="register float-left text-center" role="button" style="font-size: 15px;">Back to Home</a>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="/js/popper.js"></script>
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/bootstrap.js"></script>
</body>
</html>