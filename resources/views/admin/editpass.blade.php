<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/fontawesome-free-5.15.3-web/css/all.min.css">
	<title>Edit Password</title>
</head>
<body>
	<div id="formWrapper">
		@if(Session::has('fail'))
		        <div class="alert alert-danger fixed-top" role="alert">
		            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
		            <i class="fas fa-exclamation-triangle"></i> {{Session::get('fail')}}
		        </div>
		    @endif
		@if(Session::has('success'))
		        <div class="alert alert-success fixed-top" role="alert">
		            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
		            <i class="fas fa-exclamation-triangle"></i> {{Session::get('success')}}
		        </div>
		    @endif
		@if(count($errors)>0)
        <div class="alert alert-danger fixed-top" role="alert" >
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true" class="fas fa-times"></span></button>
            <ul style="list-style:none">
                    @foreach($errors->all() as $error)
                    <li><span class="fas fa-exclamation-triangle"></span> {{$error}}</li>
                    @endforeach
                </ul>
        </div>
    	@endif
		<div id="form">
			<div>
				<h3 class="text-center">Edit Password</h3>
				<h5 class="text-center head">Admin Cireunfood.id</h5>
			</div>
			
			<form method="post" action="/admin/forgot">
				{{ csrf_field() }}
				<div class="form-item">
					<input type="email" name="email" class="form-style" required placeholder="Email" value="{{old('email')}}" autocomplete="off">
				</div>
                <div class="form-item">
					<input type="password" name="password" class="form-style" required placeholder="Password" autocomplete="off">
				</div>
				<div class="form-item">
					<input type="password" name="password_confirmation" class="form-style" required placeholder="Password Confirmation" autocomplete="off">
					<div class="row-5">
						<a href="/admin/register" role="button" class="btn btn-link login float-right mr-2">Daftar</a><br/>
					</div>
				</div>
				<div class="form-item">
					<input type="submit" class="login pull-right" value="Submit">
					<a href="/admin" class="register pull-right text-center" role="button">Back</a>
					<div class="clear-fix"></div>
				</div>
			</form>

		</div>
	</div>
	<script type="text/javascript" src="/js/popper.js"></script>
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/bootstrap.js"></script>
</body>
</html>