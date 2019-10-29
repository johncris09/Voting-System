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
							<h1>Student</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Add Student</li>
							</ol>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Add Student</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<form method="post" id="add_student_form">
						<div class="card-body">
							<div class="form-group">
								<label for="id_number">ID #</label>
								<input type="text" class="form-control" name="id_number" id="id_number" placeholder="ID #" required autofocus>
							</div>
							<div class="form-group">
								<label for="last_name">Last Name</label>
								<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
							</div>
							<div class="form-group">
								<label for="first_name">First Name</label>
								<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
							</div>
							<div class="form-group">
								<label for="middle_name">Middle Name</label>
								<input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name" >
							</div>
							<div class="form-group">
								<label for="id_number">Gender</label>
								<select name="gender" class="form-control" id="gender" required>
									<option value="">Select</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>  
							</div>
							<div class="form-group">
								<label for="birthdate">Birthdate</label>
								<input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="Birthdate" required>
							</div>
							<div class="form-group">
								<label for="mobile_number">Mobile #</label>
								<input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile #" required>
							</div>
							<div class="form-group">
								<label for="department">Department</label>
								<select name="department" class="form-control"  id="department" required>
									<option value="">Select</option>
									<?php
									if($department->num_rows() > 0 ):
										foreach($department->result_array() as $row):
											echo '
												<option value='.$row['department_id'].'>'.$row['department_code'].'</option>
											';
										endforeach;
									endif;
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="year_level">Year Level</label>
								<select name="year_level" class="form-control" id="year_level" required>
									<option value="">Select</option> 
								</select>
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
