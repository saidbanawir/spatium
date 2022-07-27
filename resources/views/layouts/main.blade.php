<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" href="/img/spatium.png" type="image/png">
	<title>Spatium</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<script type="text/javascript" src="/js/js.js"></script>
{{-- trix editor --}}
<link rel="stylesheet" href="/css/trix.css" type="text/css">
<script type="text/javascript" src="/js/trix.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="/js/js.js"></script>
<style>
	trix-toolbar [data-trix-button-group="file-tools"]{
	  display: none;
	}
  </style>

<nav class="navbar navbar-expand-lg sticky-top navbar-dark" style="background:#505BDA;">
	<div class="container">
	  <a class="navbar-brand mb-0 h1" href="/"><img src="/img/spatium.png" width="30px"> Spatium</a>
	  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
		<div class="navbar-nav d-flex">
			<li class="nav-item"><a class="btn btn-outline-light" href="/posts"><i class="bi bi-search"></i> Cari Pekerjaan</a></li>
			<ul class="navbar-nav">
				@auth
				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				  {{ auth()->user()->nama }}
				</a>
				<ul class="dropdown-menu">
					@if (auth()->user()->role !='Pelamar')
					<li><a class="dropdown-item" href="/dashboard"><i class="bi bi-house-door"></i> Dashboard</a></li>
					@else
					<li><a class="dropdown-item" href="/history"><i class="bi bi-clock-history"></i> History</a></li>
					<li><a class="dropdown-item" href="{{ route('mycv.edit') }}"><i class="bi bi-file-earmark-person"></i> My CV</a></li>
					<li><a class="dropdown-item" href="{{ route('myprofiles.edit') }}"><i class="bi bi-gear"></i> My Profile</a></li>
					@endif

					<li><a class="dropdown-item" href="{{ route('passwords.edit') }}"><i class="bi bi-gear"></i> Change Password</a></li>
				  <li>
					<li><hr class="dropdown-divider"></li>

					<form method="POST" action="/logout">
						@csrf
						<button type="submit" onclick="return confirm('You want logout ?')" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Sign Out</button>
					  </form>
				  </li>
				</ul>
				</li>
			@else
			<li class="nav-item"><a class="nav-link" href="/login">Sign In</a></li>
			<li class="nav-item"><a class="nav-link" href="/regis">Sign Up</a></li>
		  </ul>
		  @endauth
		</div>
	  </div>
	</div>
  </nav>
<body>
	<div class="container mt-4">
		@yield('container')
	</div>
	
</body>
<footer>
	<div class="container">
		<footer class="py-5">
		  <div class="row">
			<div class="col-2">
				<h5>Sub Menu</h5>
			  <ul class="nav flex-column">
				  <li class="nav-item mb-2"><a href="/dashboard" class="nav-link p-0 text-muted">Dashboard</a></li>
				  <li class="nav-item mb-2"><a href="/" class="nav-link p-0 text-muted">Home</a></li>
				  <li class="nav-item mb-2"><a href="/posts" class="nav-link p-0 text-muted">Cari Pekerjaan</a></li>
			  </ul>
			</div>
	  
			<div class="col-2">
			  <h5>Social Media</h5>
			  <ul class="nav flex-column">
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><i class="bi bi-facebook" style="color: #4267B2;"></i> Facebook</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><i class="bi bi-whatsapp" style="color: #25D366;"></i> Whatsapp</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><i class="bi bi-instagram"></i> Instagram</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><i class="bi bi-twitter" style="color: #1DA1F2;"></i> Twitter</a></li>
				<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"><i class="bi bi-linkedin" style="color: #2867B2;"></i> Linkedin</a></li>
			  </ul>
			</div>
	  
			<div class="col-6 offset-1">
			  <form>
				<h5>Spatium <img src="/img/spatium.png" width="30px"></h5>
				<p>Spatium adalah sebuah website yang merupakan aplikasi wadah untuk melakukan pencarian lowongan pekerjaan, 
					yang mana memudahkan masyarakat Indonesia untuk mencari pekerjaan.
				</p>
			  </form>
			</div>
		  </div>
	  
		  <div class="d-flex justify-content-center border-top">
			<p>© 2022 Spatium, Inc. All rights reserved.</p>
			<ul class="list-unstyled d-flex">
			  <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
			  <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
			  <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
			</ul>
		  </div>
		</footer>
	  </div>
</footer>
</html>