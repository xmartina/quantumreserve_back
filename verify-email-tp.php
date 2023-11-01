<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Signup Template</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="login-tp.css">
</head>
<body>

<div class="bd-wrapper px-4 px-sm-1 h-100">
	<div class="container ">
		<div class="row my-5 my-sm-2">
			<!--			form container-->
			<div class="col-lg-6 px-0 mx-0 my-5 my-sm-2 bg-white">
				<div class="card">
					<div class="card-header bg-white d-flex align-items-end">
						<img src="https://dashboard.quantumreserve.online/uploads/21.png" alt="" class="logo-img">
						<div class=" d-flex align-items-center px-3 py-2 mx-2  logo-info">INVESTMENT</div>
					</div>
					<div class="card-body">
						<div class="mb-5">
							<div class="signup-dd mb-3 d-flex justify-content-center px-3 py-2">Signup Page</div>
							<h3 class="font-weight-bolder">
								Welcome Prestigious User !
							</h3>
							<p class="login-info-2">use the form below to create an account</p>
						</div>

						<div class="ext-link-wrap mx-auto mb-3">
							<div class="row ddd gx-5">
								<div
									class="col-7 px-2 bg-light py-2 mr-2 d-flex justify-content-between align-items-center">
									<div class="mr-3"><span
											class="material-symbols-outlined m-0 p-0">account_circle</span></div>
									<div class="m-0 pb-1">
										<a href="https://dashboard.quantumreserve.online/signup"
										   class="text-dark m-0 p-0">Login</a>
									</div>
									<div class="m-0 p-0">
										<span class="material-symbols-outlined">chevron_right</span>
									</div>
								</div>
							</div>
						</div>


						<form action="/login" method="post">
							<div class="mb-3">
								<div class="row">
									<div class="col-lg-6">
										<label for="username" class="form-label">First Name</label>
										<input type="text" class="form-control" id="username" name="username"
											   placeholder="Enter your username">
									</div>
									<div class="col-lg-6">
										<label for="username" class="form-label">Last Name</label>
										<input type="text" class="form-control" id="username" name="username"
											   placeholder="Enter your username">
									</div>
								</div>
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" class="form-control" id="email" name="password"
									   placeholder="Enter Email">
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Phone Number</label>
								<input type="tel" class="form-control" id="phoneit" aria-describedby="phone"
									   name="phone"
									   placeholder="Enter Phone">
							</div>
							<div class="mb-3">
								<div class="row">
									<div class="col-lg-6">
										<label for="password" class="form-label">Password</label>
										<input type="password" class="form-control" id="password" name="password"
											   placeholder="Enter your password">
									</div>
									<div class="col-lg-6">
										<label for="password" class="form-label">Confirm Password</label>
										<input type="password" class="form-control" id="password" name="password"
											   placeholder="Enter your password">
									</div>
								</div>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Referral Code</label>
								<input type="password" class="form-control" id="password" name="password"
									   placeholder="Referral Code">
							</div>
							<button type="submit" class="btn mb-4 w-75 btn-primary">Signup</button>
							<div class="py-3"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6 d-none d-lg-block d-xl-block bg-dark dd mx-0 px-0">
				<div
					class="login-head my-5 p-4 d-flex align-items-center flew-column justify-content-center text-center">
					<div class="who-we">who we are</div>
					<h3 class="">we are investment</h3>
					<div class="px-5 ac justify-self-end align-self-end">
						<img
							src="https://affirm.uicore.co/business-consultant/wp-content/uploads/sites/2/2021/09/business-consultant-side-2.webp"
							alt="" class="h-auto w-100 rounded">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
