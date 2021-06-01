<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/fontawesome-free-5.15.3-web/css/all.min.css">
	<title>Register</title>
</head>
<body>
	<div id="formWrapper">
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
				<h3 class="text-center">Register</h3>
				<h5 class="text-center head">Admin Cireunfood.id</h5>
			</div>
			<form method="post" action="{{route('register')}}">
				{{ csrf_field() }}
				<div class="form-item">
					<input type="text" name="forename" class="form-style {{$errors->has('forename')?'is-invalid':''}}" required placeholder="Name" value="{{old('forename')}}" autocomplete="off">
				</div>
                <div class="form-item">
					<input type="email" name="email" class="form-style {{$errors->has('email')?'is-invalid':''}}" required placeholder="Email" value="{{old('email')}}" autocomplete="off">
				</div>
				<div class="form-item">
					<input type="password" name="password" class="form-style {{$errors->has('password')?'is-invalid':''}}" required placeholder="Password">
				</div>
                <div class="form-item">
					<input type="password" name="password_confirmation" class="form-style {{$errors->has('password_confirmation')?'is-invalid':''}}" required placeholder="Password Confirmation">
				</div>
				<div class="form-item">
					<input type="submit" class="login pull-right" value="Register">
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