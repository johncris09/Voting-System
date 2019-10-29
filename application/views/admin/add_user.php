<!DOCTYPE html>
<html>

<head>
	<?php include __DIR__ . ("\..\\include\meta_data.php"); ?>
	<?php include __DIR__ . ("\..\\include\css.php"); ?>
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include __DIR__ . ("\..\\layout\header.php"); ?>
		<?php include __DIR__ . ("\..\\layout\sidebar-left.php"); ?>
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>User</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Add User</li>
							</ol>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Add User</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<form method="post" id="add_user_form">
						<div class="card-body">
							<div class="form-group">
								<label for="last_name">Last Name</label>
								<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required autofocus>
							</div>
							<div class="form-group">
								<label for="first_name">First Name</label>
								<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
							</div>
							<div class="form-group">
								<label for="middle_name">Middle Name</label>
								<input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name">
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Password">
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary float-right">Submit</button>
						</div>
					</form>
				</div>
			</section>
		</div>
		<?php include __DIR__ . ("\..\\layout\\footer.php"); ?>
		<?php include __DIR__ . ("\..\\layout\\sidebar-right.php"); ?>
	</div>
	<?php include __DIR__ . ("\..\\include\js.php"); ?>
</body>

</html>
