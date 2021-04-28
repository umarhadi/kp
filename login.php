<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Umar Hadi Siswanto">

	<title>Login Kasir - CV. Mahardika Komputer</title>

	<link href="dist/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>
	<div class="hk-wrapper">
		<div class="hk-pg-wrapper hk-auth-wrapper">

			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 pa-0">
						<div class="auth-form-wrap pt-xl-0 pt-70">
							<div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
								<h1 class="display-5 text-center mb-40">CV. Mahardika Komputer</h1>
								<form action="" method="POST">
									<h5 class="display-8 text-center mb-20">Selamat datang:)</h5>
									<?php
									@ob_start();
									session_start();
									if (isset($_POST['proses'])) {
										require 'config.php';

										$user = strip_tags($_POST['user']);
										$pass = strip_tags($_POST['pass']);

										$sql = 'select member.*, login.user, login.pass
															from member inner join login on member.id_member = login.id_member
															where user =? and pass = md5(?)';
										$row = $config->prepare($sql);
										$row->execute(array($user, $pass));
										$jum = $row->rowCount();
										if ($jum > 0) {
											$hasil = $row->fetch();
											$_SESSION['admin'] = $hasil;
											echo '<script>window.location="index.php"</script>';
										} else {
											echo '<div class="alert alert-danger alert-wth-icon alert-dismissible fade show" role="alert">
															<span class="alert-icon-wrap"><i class="zmdi zmdi-lock-outline"></i></span> Username atau password salah.
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>';
										}
									}
									?>
									<div class="form-group">
										<input class="form-control" type="text" name="user" placeholder="Username" autofocus required>
									</div>
									<div class="form-group">
										<div class="input-group">
											<input class="form-control" name="pass" type="password" placeholder="Password">
											<div class="input-group-append">
												<span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
											</div>
										</div>
									</div>
									<button class="btn btn-primary btn-block" type="submit" name="proses">Login <i class="zmdi zmdi-sign-in"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="vendors/jquery/dist/jquery.min.js"></script>
	<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

</html>