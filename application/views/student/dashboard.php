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
							<h1>Vote</h1>
						</div> 
					</div>
				</div>
			</section> 
			<section class="content">  
				<form id="vote" method="post">
					
					<!-- President -->
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">President</h3>
						</div>
						<div class="card-body">
						<?php 
							if($candidate->num_rows() > 0):
								foreach($candidate->result_array() as $row): 
									if(ucwords($row["position"]) == ucwords("president")):
						?>
								<div class="form-group">
									<label>
										<input type="radio" value="<?php echo $row['candidate_id'] ?>" name="<?php echo lcfirst($row["position"]); ?>" class="minimal">
										<?php echo ucwords($row["last_name"] . ', ' . $row["first_name"] . ' ' . $row["middle_name"]); ?>
									</label>
								</div>
						<?php
									endif;
								endforeach;
							endif;
						?>
						</div>
					</div>

					<!-- Vice President -->
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">Vice President</h3>
						</div>
						<div class="card-body">
						<?php 
							if($candidate->num_rows() > 0):
								foreach($candidate->result_array() as $row): 
									if(ucwords($row["position"]) == ucwords("vice president")):
						?>
								<div class="form-group">
									<label>
										<input type="radio" value="<?php echo $row['candidate_id'] ?>" name="<?php echo lcfirst($row["position"]); ?>"  class="minimal">
										<?php echo ucwords($row["last_name"] . ', ' . $row["first_name"] . ' ' . $row["middle_name"]); ?>
									</label>
								</div>
						<?php
									endif;
								endforeach;
							endif;
						?>
						</div>
					</div>

					<!-- Secretary -->
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">Secretary</h3>
						</div>
						<div class="card-body">
						<?php 
							if($candidate->num_rows() > 0):
								foreach($candidate->result_array() as $row): 
									if(ucwords($row["position"]) == ucwords("secretary")):
						?>
								<div class="form-group">
									<label>
										<input type="radio" value="<?php echo $row['candidate_id'] ?>" name="<?php echo lcfirst($row["position"]); ?>"  class="minimal">
										<?php echo $row["candidate_id"]  . ' ' . ucwords($row["last_name"] . ', ' . $row["first_name"] . ' ' . $row["middle_name"]); ?>
									</label>
								</div>
						<?php
									endif;
								endforeach;
							endif;
						?>
						</div>
					</div>

					<!-- Treasurer -->
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">Treasurer</h3>
						</div>
						<div class="card-body">
						<?php 
							if($candidate->num_rows() > 0):
								foreach($candidate->result_array() as $row): 
									if(ucwords($row["position"]) == ucwords("treasurer")):
						?>
								<div class="form-group">
									<label>
										<input type="radio" value="<?php echo $row['candidate_id'] ?>" name="<?php echo lcfirst($row["position"]); ?>"  class="minimal">
										<?php echo $row["candidate_id"]  . ' ' . ucwords($row["last_name"] . ', ' . $row["first_name"] . ' ' . $row["middle_name"]); ?>
									</label>
								</div>
						<?php
									endif;
								endforeach;
							endif;
						?>
						</div>
					</div>

					<!-- Auditor -->
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">Auditor</h3>
						</div>
						<div class="card-body">
						<?php 
							if($candidate->num_rows() > 0):
								foreach($candidate->result_array() as $row):
									if(ucwords($row["position"]) == ucwords("auditor")):
						?>
								<div class="form-group">
									<label>
										<input type="radio" value="<?php echo $row['candidate_id'] ?>" name="<?php echo lcfirst($row["position"]); ?>"  class="minimal">
										<?php echo $row["candidate_id"]  . ' ' . ucwords($row["last_name"] . ', ' . $row["first_name"] . ' ' . $row["middle_name"]); ?>
									</label>
								</div>
						<?php
									endif;
								endforeach;
							endif;
						?>
						</div>
					</div>

					<!-- Senator -->
					<div class="card card-success">
						<div class="card-header">
							<h3 class="card-title">Senator (8)</h3>
						</div>
						<div class="card-body">
						<?php 
							if($candidate->num_rows() > 0):
								foreach($candidate->result_array() as $row):
									if(ucwords($row["position"]) == ucwords("senator")):
						?>
								<div class="form-group">
									<label>
										<input type="checkbox" value="<?php echo $row['candidate_id'] ?>" name="<?php echo lcfirst($row["position"]); ?>[]"  class="minimal senator">
										<?php echo $row["candidate_id"]  . ' ' .ucwords($row["last_name"] . ', ' . $row["first_name"] . ' ' . $row["middle_name"]); ?>
									</label>
								</div>
						<?php
									endif;
								endforeach;
							endif;
						?>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary btn-block">Vote</button>
					</div>
				</form>
				
			</section>
		</div>
		<?php include __DIR__ . ("\..\\layout\\footer.php"); ?>
		<?php include __DIR__ . ("\..\\layout\\sidebar-right.php"); ?>
	</div>
	<?php include __DIR__ . ("\..\\include\js.php"); ?>
</body>

</html>
