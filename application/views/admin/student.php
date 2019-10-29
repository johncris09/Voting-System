<!DOCTYPE html>
<html>

<head>
	<?php include __DIR__ . ("\..\\include\meta_data.php"); ?>
	<?php include __DIR__ . ("\..\\include\css.php"); ?>
	<style>
		th,td {
			white-space: nowrap;
		}
	</style>
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
								<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
								<li class="breadcrumb-item active">Student</li>
							</ol>
						</div>
					</div>
				</div>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Student List</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="card-body">
						<a href="<?php echo base_url() . 'student/add_student' ?>" class="btn btn-primary float-right" title="Add student">Add student</a>
						<div id="student_list"></div>
					</div>
				</div>
			</section>
		</div>
		<?php include __DIR__ . ("\..\\layout\\footer.php"); ?>
		<?php include __DIR__ . ("\..\\layout\\sidebar-right.php"); ?>
	</div>
	<?php include __DIR__ . ("\..\\include\js.php"); ?>
</body>

</html>
