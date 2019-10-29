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
					<form method="post" id="update_student_form"> 
						<div class="card-body">
							<div class="form-group"> 
								<input type="hidden" class="form-control" value="<?php echo $student['student_id'] ?>" name="student_id" id="student_id" >
							</div>
							<div class="form-group">
								<label for="id_number">ID #</label>
								<input type="text" class="form-control" value="<?php echo $student['id_number'] ?>"  name="id_number" id="id_number" placeholder="ID #" required>
							</div>
							<div class="form-group">
								<label for="last_name">Last Name</label>
								<input type="text" class="form-control" value="<?php echo $student['last_name'] ?>"  name="last_name" id="last_name" placeholder="Last Name" required>
							</div>
							<div class="form-group">
								<label for="first_name">First Name</label>
								<input type="text" class="form-control"  value="<?php echo $student['first_name'] ?>"   name="first_name" id="first_name" placeholder="First Name" required>
							</div>
							<div class="form-group">
								<label for="middle_name">Middle Name</label>
								<input type="text" class="form-control" value="<?php echo $student['middle_name'] ?>"  name="middle_name" id="middle_name" placeholder="Middle Name" >
							</div>
							<div class="form-group">
								<label for="id_number">Gender</label>
								<select name="gender" class="form-control" id="gender" required> 
									<option value="">Select</option>
									<option value="Male" <?php echo ($student['gender'] == 'Male') ? "selected" : ""; ?>>Male</option>
									<option value="Female" <?php echo ($student['gender'] == 'Female') ? "selected" : ""; ?>>Female</option>
								</select>  
							</div>
							<div class="form-group">
								<label for="birthdate">Birthdate</label>
								<input type="date" class="form-control" value="<?php echo $student['birthdate'] ?>" name="birthdate" id="birthdate" placeholder="Birthdate" required>
							</div>
							<div class="form-group">
								<label for="mobile_number">Mobile #</label>
								<input type="text" class="form-control" value="<?php echo $student['mobile_number'] ?>" name="mobile_number" id="mobile_number" placeholder="Mobile #" required>
							</div>
							<div class="form-group">
								<label for="department">Department</label>
								<select name="department" class="form-control" class="department" id="department" required>
									<option value="">Select</option>
									<?php
									if($department->num_rows() > 0 ):
										foreach($department->result_array() as $row):
											if($student_department['department_id'] == $row['department_id'] )
											{
												$selected = "selected";
											}else{
												$selected = "";
											}
											echo '
												<option value="'.$row['department_id'].'" '.$selected.'>'.$row['department_code'].'</option>
											';
										endforeach;
									endif;
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="year_level">Year Level</label>
								<select name="year_level" class="form-control" class="year_level" id="year_level" required>
									<option value="">Select</option> 
									<?php 
									if($year_level->num_rows() > 0 ):
										foreach($year_level->result_array() as $row):
											if($student['year_level'] == $row['year_level_id'] )
											{
												$selected = "selected";
											}else{
												$selected = "";
											}
											echo '
												<option value="'.$row['year_level_id'].'" '.$selected.'>'.$row['year_level'].'</option>
											';
										endforeach;
									endif;
									?>
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
