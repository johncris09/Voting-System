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
							<h1>Dashboard</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard</li>
							</ol>
						</div>
					</div>
				</div>
			</section>

			<!-- Main content -->

			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?php echo $student->num_rows(); ?></h3>

									<p>Student(s)</p>
								</div>
								<div class="icon">
									<i class="fa fa-graduation-cap"></i>
								</div>
								<a href="<?php echo base_url() . 'student' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-success">
								<div class="inner">
									<h3><?php echo $done_vote->num_rows(); ?></h3>

									<p>Voted</p>
								</div>
								<div class="icon">
									<i class="ion ion-checkmark"></i>
								</div>
								<a href="<?php echo base_url() . 'student' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>

						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-danger">
								<div class="inner">
									<h3><?php echo $not_vote->num_rows(); ?></h3>

									<p>Not Vote</p>
								</div>
								<div class="icon">
									<i class="fa fa-remove"></i>
								</div>
								<a href="<?php echo base_url() . 'student' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-warning">
								<div class="inner">
									<h3><?php echo $user->num_rows(); ?></h3>

									<p>User(s)</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="<?php echo base_url() . 'user' ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<h4>Vote Results</h4>
							<!-- President -->
							<div class="card card-success">
								<div class="card-header">
									<h3 class="card-title">President</h3>
								</div>
								<div class="card-body">
									<table class="table table-sm">
										<tr>
											<th>Vote</th>
											<th>Candidate</th>
										</tr>
										<?php
										if ($candidate->num_rows() > 0) :
											foreach ($candidate->result_array() as $row) :
												if (ucwords($row["position"]) == ucwords("president")) :
													?>
													<tr>
														<td>
															<?php echo $row["vote"]  ?>
														</td>
														<td>
															<?php echo ucwords($row["last_name"] . ', ' . $row["first_name"] . ' ' . $row["middle_name"]); ?>
														</td>
													</tr>
										<?php
												endif;
											endforeach;
										endif;
										?>
									</table>
								</div>
							</div>

							<!-- Vice President -->
							<div class="card card-success">
								<div class="card-header">
									<h3 class="card-title">Vice President</h3>
								</div>
								<div class="card-body">
									<table class="table table-sm">
										<tr>
											<th>Vote</th>
											<th>Candidate</th>
										</tr>
										<?php
										if ($candidate->num_rows() > 0) :
											foreach ($candidate->result_array() as $row) :
												if (ucwords($row["position"]) == ucwords("vice president")) :
													?>
													<tr>
														<td>
															<?php echo $row["vote"]  ?>
														</td>
														<td>
															<?php echo ucwords($row["last_name"] . ', ' . $row["first_name"] . ' ' . $row["middle_name"]); ?>
														</td>
													</tr>
										<?php
												endif;
											endforeach;
										endif;
										?>
									</table>
								</div>
							</div>


							<!-- Secretary -->
							<div class="card card-success">
								<div class="card-header">
									<h3 class="card-title">Secretary</h3>
								</div>
								<div class="card-body">
									<table class="table table-sm">
										<tr>
											<th>Vote</th>
											<th>Candidate</th>
										</tr>
										<?php
										if ($candidate->num_rows() > 0) :
											foreach ($candidate->result_array() as $row) :
												if (ucwords($row["position"]) == ucwords("secretary")) :
													?>
													<tr>
														<td>
															<?php echo $row["vote"]  ?>
														</td>
														<td>
															<?php echo ucwords($row["last_name"] . ', ' . $row["first_name"] . ' ' . $row["middle_name"]); ?>
														</td>
													</tr>
										<?php
												endif;
											endforeach;
										endif;
										?>
									</table>
								</div>
							</div>

							<!-- Treasurer -->
							<div class="card card-success">
								<div class="card-header">
									<h3 class="card-title">Treasurer</h3>
								</div>
								<div class="card-body">
									<table class="table table-sm">
										<tr>
											<th>Vote</th>
											<th>Candidate</th>
										</tr>
										<?php
										if ($candidate->num_rows() > 0) :
											foreach ($candidate->result_array() as $row) :
												if (ucwords($row["position"]) == ucwords("treasurer")) :
													?>
													<tr>
														<td>
															<?php echo $row["vote"]  ?>
														</td>
														<td>
															<?php echo ucwords($row["last_name"] . ', ' . $row["first_name"] . ' ' . $row["middle_name"]); ?>
														</td>
													</tr>
										<?php
												endif;
											endforeach;
										endif;
										?>
									</table>
								</div>
							</div>

							<!-- Auditor -->
							<div class="card card-success">
								<div class="card-header">
									<h3 class="card-title">Auditor</h3>
								</div>
								<div class="card-body">
									<table class="table table-sm">
										<tr>
											<th>Vote</th>
											<th>Candidate</th>
										</tr>
										<?php
										if ($candidate->num_rows() > 0) :
											foreach ($candidate->result_array() as $row) :
												if (ucwords($row["position"]) == ucwords("auditor")) :
													?>
													<tr>
														<td>
															<?php echo $row["vote"]  ?>
														</td>
														<td>
															<?php echo ucwords($row["last_name"] . ', ' . $row["first_name"] . ' ' . $row["middle_name"]); ?>
														</td>
													</tr>
										<?php
												endif;
											endforeach;
										endif;
										?>
									</table>
								</div>
							</div>

							<!-- Auditor -->
							<div class="card card-success">
								<div class="card-header">
									<h3 class="card-title">Auditor</h3>
								</div>
								<div class="card-body">
									<table class="table table-sm">
										<tr>
											<th>Vote</th>
											<th>Candidate</th>
										</tr>
										<?php
										if ($candidate->num_rows() > 0) :
											foreach ($candidate->result_array() as $row) :
												if (ucwords($row["position"]) == ucwords("auditor")) :
													?>
													<tr>
														<td>
															<?php echo $row["vote"]  ?>
														</td>
														<td>
															<?php echo ucwords($row["last_name"] . ', ' . $row["first_name"] . ' ' . $row["middle_name"]); ?>
														</td>
													</tr>
										<?php
												endif;
											endforeach;
										endif;
										?>
									</table>
								</div>
							</div>



							<!-- Senator -->
							<div class="card card-success">
								<div class="card-header">
									<h3 class="card-title">Senator</h3>
								</div>
								<div class="card-body">
									<table class="table table-sm">
										<tr>
											<th>Vote</th>
											<th>Candidate</th>
										</tr>
										<?php
										if ($candidate->num_rows() > 0) :
											foreach ($candidate->result_array() as $row) :
												if (ucwords($row["position"]) == ucwords("senator")) :
													?>
													<tr>
														<td>
															<?php echo $row["vote"]  ?>
														</td>
														<td>
															<?php echo ucwords($row["last_name"] . ', ' . $row["first_name"] . ' ' . $row["middle_name"]); ?>
														</td>
													</tr>
										<?php
												endif;
											endforeach;
										endif;
										?>
									</table>
								</div>
							</div>

						</div>

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
