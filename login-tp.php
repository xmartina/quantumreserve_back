<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login Template</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="login-tp.css">
</head>
<body>

<div class="bd-wrapper px-4 px-sm-1 h-100">
	<div class="container ">
		<div class="row my-5 my-sm-2">
			<!--			form container-->
			<div class="col-lg-6 my-5 my-sm-2 bg-white">
				<div class="card ">
					<div class="card-header bg-white d-flex align-items-end">
						<img src="https://dashboard.quantumreserve.online/uploads/21.png" alt="" class="logo-img"> <div class=" d-flex align-items-center px-3 py-2 mx-2  logo-info">INVESTMENT</div>
					</div>
					<div class="card-body">
						<div class="mb-5">
							<h3 class="font-weight-bolder">
								Welcome Prestigious User !
							</h3>
							<p class="login-info-2">use the form below to log in to your account</p>
						</div>

						<div class="ext-link-wrap mx-auto mb-3">
							<div class="row gx-5">
								<div class="col-6 bg-light py-2 mr-2 d-flex justify-content-between align-items-center">
									<div class="mr-3"><span class="material-symbols-outlined m-0 p-0">account_circle</span></div>
									<div class="m-0 pb-1">
										<a href="https://dashboard.quantumreserve.online/signup" class="text-dark m-0 p-0">Create Account</a>
									</div>
									<div class="m-0 p-0">
										<span class="material-symbols-outlined">chevron_right</span>
									</div>
								</div>
								<div class="col-6 ml-2 bg-light py-2 d-flex justify-content-between align-items-center">
									<div class="mr-3"><span class="material-symbols-outlined m-0 p-0">account_circle</span></div>
									<div class="m-0 pb-1">
										<a href="https://dashboard.quantumreserve.online/signup" class="text-dark m-0 p-0">Create Account</a>
									</div>
									<div class="m-0 p-0">
										<span class="material-symbols-outlined">chevron_right</span>
									</div>
								</div>
							</div>
						</div>


						<form action="/login" method="post">
							<div class="mb-3">
								<label for="username" class="form-label">Username</label>
								<input type="text" class="form-control" id="username" name="username"
									   placeholder="Enter your username">
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" class="form-control" id="password" name="password"
									   placeholder="Enter your password">
							</div>
							<div class="mb-3">
								<input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
								<label for="remember_me" class="form-check-label">Remember me</label>
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6"></div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
