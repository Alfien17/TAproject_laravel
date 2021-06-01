<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/fontawesome-free-5.15.3-web/css/all.min.css">
    <title>Login</title>
  </head>
  <body class="bg-dark">
	<section class="form my-4 mx-5">
    <div class="container-login">
      <div class="row no-gutters">
        <div class="col-lg-5">
          <img src="/assets/login/login.jpg" class="img img-fluid h-100" alt="">
        </div>
        <div class="col-lg-7 px-5 pt-5">
          <h2 class="py-3">Login dulu yuk sebelum belanja!</h2>
          <!-- Bagian Judul -->
          <h4>@yield('judul_halaman')</h4>
          <!-- Bagian Konten -->
          @yield('konten')
        </div>
      </div>
    </div>
  </section>
	<script type="text/javascript" src="/js/popper.js"></script>
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
  </body>
</html>