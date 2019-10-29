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
							<h1>Candidate</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Edit Candidate</li>
							</ol>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Edit Candidate</h3>
						
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<form method="post" id="update_candidate_form">
						<div class="card-body">
							<div class="form-group">
								<input type="hidden" value="<?php echo $candidate['candidate_id'] ?>" name="candidate_id" id="candidate_id" class="form-control">
							</div>
							<div class="form-group">
								<label for="candidate">Candidate Name</label>
								<select  class="form-control" name="candidate" id="candidate" required>
									<option value="">Select Name</option>
									<?php
									if($student->num_rows() > 0 ):
										
										foreach($student->result_array() as $row):
											if($candidate['candidate'] == $row['student_id'])
											{
												$selected = "selected";
											}else{
												$selected = "";
											}
											echo '
												<option value="'.$row['student_id'].'" '.$selected.'>'.ucwords($row['last_name'] .', '.$row['first_name'] . ' ' . $row['middle_name']).'</option>
											';
										endforeach;
									endif;
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="position">Position</label>
								<select  class="form-control" name="position" id="position" required>
									<option value="">Select Position</option>
									<?php
									if($position->num_rows() > 0 ):
										foreach($position->result_array() as $row):
											if($candidate['position_id'] == $row['position_id'])
											{
												$selected = "selected";
											}else{
												$selected = "";
											}
											echo '
												<option value="'.$row['position_id'].'" '.$selected.'>'.ucwords($row['position']).'</option>
											';
										endforeach;
									endif;
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="organization">Organization</label>
								<select  class="form-control" name="organization" id="organization" required>	
									<option value="">Select Organization</option>
									<?php
									if($organization->num_rows() > 0 ):
										foreach($organization->result_array() as $row):
											if($candidate['organization_id'] == $row['organization_id'])
											{
												$selected = "selected";
											}else{
												$selected = "";
											}
											echo '
												<option value="'.$row['organization_id'].'" '.$selected.'>'.ucwords($row['organization']).'</option>
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
