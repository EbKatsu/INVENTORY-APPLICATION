<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Login</title>
	<link href="<?= base_url('sb-admin') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="sb-admin/img/Logo.png" rel="shortcut icon">
</head>

<body class="">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-sm-10 col-md-9">

				<div class="">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-12">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">

                                    <h1 class="h4 text-gray-900 mb-4">Ceklist Perangkat Lunak dan Jaringan IT</h1>
										<img src="sb-admin/img/Logo.png" style = "width: 200px" alt="">
										
									</div>
									<br>
									<form class="user" method="POST" action="<?= base_url('login') ?>">
										<div class="form-group">
											<input type="text" class="form-control" id="username" placeholder="Username" autocomplete="off" required name="username">
										</div>
										<div class="form-group">
											<input type="password" class="form-control" id="password" placeholder="Password" required name="password">
										</div>

                                        <button type="submit" class="btn btn-primary btn-block" style= "background-color:darkorange;" name="login">
											Masuk
										</button>
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>
    </body>

</html>
