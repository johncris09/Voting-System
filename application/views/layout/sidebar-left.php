<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="<?php echo base_url(); ?>" class="brand-link">
		<img src="<?php echo base_url() . 'assets/dist/img/logo.png' ?>" alt="AdminLTE Logo"
			class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Voting System</span>
	</a>
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="info">
				<a href="<?php echo base_url() . "user/edit_user/" . $this->session->userdata('admin_id');  ?>" class="d-block text-center">
					Welcome
				<?php
					echo ucfirst($this->session->userdata('username'));
				?>
				</a>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<?php 
					if($this->session->userdata('admin_id') != ""){
				?>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>" class="nav-link">
						<i class="nav-icon fa fa-dashboard"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-building-o"></i>
						<p>
							Department
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() . 'department/add_department' ?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Department</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() . 'department' ?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>View Department</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-tree"></i>
						<p>
							Year Level
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() . 'year_level/add_year_level' ?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Year Level</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() . 'year_level' ?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>View Year Level</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-graduation-cap"></i>
						<p>
							Student
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() . 'student/add_student' ?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Student</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() . 'student' ?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>View student</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-table"></i>
						<p>
							Position
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() . 'position/add_position';?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Position</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() . 'position'?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>View Position</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-sitemap"></i>
						<p>
							Organization
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() . 'organization/add_organization'; ?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Organization</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() . 'organization'; ?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>View Organization</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-table"></i>
						<p>
							Candidate
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() . 'candidate/add_candidate'?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Candidate</p>
							</a>
						</li>
						<li class="nav-item">
							<a  href="<?php echo base_url() . 'candidate'?>"  class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>View Candidate</p>
							</a>
						</li>
					</ul>
				</li>
				
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-users"></i>
						<p>
							User
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() . 'user/add_user'?>" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add User</p>
							</a>
						</li>
						<li class="nav-item">
							<a  href="<?php echo base_url() . 'user'?>"  class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>View User</p>
							</a>
						</li>
					</ul>
				</li>

				<?php
					}else{
				?>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>" class="nav-link">
						<i class="nav-icon fa fa-dashboard"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<?php
					}
				?>
				
			</ul>
		</nav>
	</div>
</aside>
