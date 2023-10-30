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

<div class="bd-wrapper px-4 py-4 py-sm-1 px-sm-1 ">
	<div class="container ">
		<div class="row ">
			<!--			form container-->
			<div class="col-lg-6 bg-white min-vh-100 h-100">
				<div class="card min-vh-100 h-100">
					<div class="card-header">
						<h3>Login</h3>
					</div>
					<div class="card-body">
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
