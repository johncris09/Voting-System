$(document).ready(function () {

	/**
	 * Login
	 * @function $('#login').submit()    this will add new department
	 */

	$('#login').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url     : "login/sign_in",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					window.location.href = "voting_system";
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				console.info(xhr.responseText);
			},
		});
	});


	/**
	 * Department
	 * @function load_department()                     this will display the data into the page
	 * @function $('#add_department_form').submit()    this will add new department
	 * @function $('#update_department_form').submit() this will update the selected department
	 * @function $('a.delete_department').click()      this will delete the selected department
	 * 
	 */


	/**
	 * Load Department
	 * display all the data into the page
	 */
	function load_department() {
		$.ajax({
			url     : "department/load_department",
			method  : "POST",
			dataType: "json",
			success : function (data) {
				// console.info(data);
				$('#department_list').html(data);
				$('#department_data').dataTable({
					"scrollY": 200,
					"scrollX": true,
				});
			}
		});
	}

	load_department();

	// Add Department
	$('#add_department_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url     : "insert_department",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#add_department_form')[0].reset();
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				notify('A Database Error Occurred', 'Duplicate entry  for department', 'fa fa-info', 'blue', 'btn-info');
			},
		});
	});

	// Update Department
	$('#update_department_form').on('submit', function (event) {
		event.preventDefault();
		var department_id = $('#department_id').val();
		$.ajax({
			url     : "../update_department/" + department_id,
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
		});
	});

	// Delete Department
	$(document).on('click', 'a.delete_department', function () {
		var department_id = $(this).attr('id');
		confirm_delete('department/delete_department/', department_id);
	});


	/**
	 * Year Level
	 * @function load_year_level()                     this will display the data into the page
	 * @function $('#add_year_level_form').submit()    this will add new year Level
	 * @function $('#update_year_level_form').submit() this will update the selected year Level
	 * @function $('a.delete_year_leve').click()       this will delete the selected year level
	 */


	/**
	 * Load Year Level
	 * display all the data into the page
	 */
	function load_year_level() {
		$.ajax({
			url     : "year_level/load_year_level",
			method  : "POST",
			dataType: "json",
			success : function (data) {
				$('#year_level_list').html(data);
				$('#year_level_data').dataTable({
					"scrollY": 200,
					"scrollX": true,
				});
			},
		});
	}

	load_year_level();


	// Add Year Level
	$('#add_year_level_form').on('submit', function (event) {
		event.preventDefault();
		var year_level = $('#year_level').val();
		$.ajax({
			url     : "insert_year_level",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#add_year_level_form')[0].reset();
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				notify('A Database Error Occurred', 'Duplicate entry \'' + year_level + '\' for year level', 'fa fa-info', 'blue', 'btn-info');
			},
		});
	});


	// Update year level
	$('#update_year_level_form').on('submit', function (event) {
		event.preventDefault();
		var year_level_id = $('#year_level_id').val();
		$.ajax({
			url     : "../update_year_level/" + year_level_id,
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				console.info(xhr.responseText);
			},
		});
	});

	// Delete year_level
	$(document).on('click', 'a.delete_year_level', function () {
		var year_level_id = $(this).attr('id');
		confirm_delete('year_level/delete_year_level/', year_level_id);
	});


	/**
	 * Student
	 * @function load_student()                     this will display the data into the page
	 * @function $('#add_student_form').submit()    this will add new year Level
	 * @function $('#update_student_form').submit() this will update the selected year Level
	 * @function $('a.delete_year_leve').click()       this will delete the selected year level
	 */


	/**
	 * Load Student
	 * display all the data into the page
	 */
	function load_student() {
		$.ajax({
			url     : "student/load_student",
			method  : "POST",
			dataType: "json",
			success : function (data) {
				$('#student_list').html(data);
				$('#student_data').dataTable({
					"scrollY": 200,
					"scrollX": true,
				});
			},
			error: function (xhr, status, error) {
				// $.alert(xhr.responseText);
			},

		});
	}

	load_student();

	// Get Year Level 
	$('select[name="department"]').on('change', function () {
		var department_id = $(this).val();
		var student_id    = $('#student_id').val();
		var path          = '';
		if (student_id != undefined) {
			path = '../';
		}

		if (department_id != '') {
			$.ajax({
				url     : path + "../year_level/get_year_level_by_department/" + department_id,
				method  : "POST",
				data    : $(this).serialize(),
				dataType: "json",
				success : function (data) {
					$('select[name="year_level"]').html(data);
				},
				error: function (xhr, status, error) {
					// console.info(xhr.responseText);
					console.info(this.url);
				},
			});
		} else {
			$('#year_level').html('<option value="">Select</option>');
		}
	});


	// Add Student
	$('#add_student_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url     : "insert_student",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#add_student_form')[0].reset();
					$('#id_number').focus();
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				// console.info(xhr.responseText)
				notify('A Database Error Occurred', 'Duplicate entry', 'fa fa-info', 'blue', 'btn-info');
			},
		});
	});


	// Update Student
	$('#update_student_form').on('submit', function (event) {
		event.preventDefault();
		var student_id = $('#student_id').val();
		$.ajax({
			url     : "../update_student/" + student_id,
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				console.info(xhr.responseText);
			},
		});
	});

	// Delete Student
	$(document).on('click', 'a.delete_student', function () {
		var student_id = $(this).attr('id');
		confirm_delete('student/delete_student/', student_id);
	});


	/**
	 * Positio
	 * @function load_position()                     this will display the data into the page
	 * @function $('#add_position_form').submit()    this will add new position
	 * @function $('#update_position_form').submit() this will update the selected position
	 * @function $('a.delete_position').click()      this will delete the selected position
	 */


	/**
	 * Load Position
	 * display all the data into the page
	 */
	function load_position() {
		$.ajax({
			url     : "position/load_position",
			method  : "POST",
			dataType: "json",
			success : function (data) {
				// console.info(data);
				$('#position_list').html(data);
				$('#position_data').dataTable({
					"scrollY": 200,
					"scrollX": true,
				});
			}
		});
	}

	load_position();

	// Add Position
	$('#add_position_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url     : "insert_position",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				console.info(data);

				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#add_position_form')[0].reset();
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				notify('A Database Error Occurred', 'Duplicate entry  for position', 'fa fa-info', 'blue', 'btn-info');
			},
		});
	});

	// Update position
	$('#update_position_form').on('submit', function (event) {
		event.preventDefault();
		var position_id = $('#position_id').val();
		$.ajax({
			url     : "../update_position/" + position_id,
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
		});
	});

	// Delete position
	$(document).on('click', 'a.delete_position', function () {
		var position_id = $(this).attr('id');
		confirm_delete('position/delete_position/', position_id);
	});



	/**
	 * Organization
	 * @function load_organization()                     this will display the data into the page
	 * @function $('#add_organization_form').submit()    this will add new organization
	 * @function $('#update_organization_form').submit() this will update the selected organization
	 * @function $('a.delete_organization').click()      this will delete the selected organization
	 */


	/**
	 * Load organization
	 * display all the data into the page
	 */
	function load_organization() {
		$.ajax({
			url     : "organization/load_organization",
			method  : "POST",
			dataType: "json",
			success : function (data) {
				// console.info(data);
				$('#organization_list').html(data);
				$('#organization_data').dataTable({
					"scrollY": 200,
					"scrollX": true,
				});
			}
		});
	}

	load_organization();

	// Add organization
	$('#add_organization_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url     : "insert_organization",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#add_organization_form')[0].reset();
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				notify('A Database Error Occurred', 'Duplicate entry  for organization', 'fa fa-info', 'blue', 'btn-info');
			},
		});
	});

	// Update organization
	$('#update_organization_form').on('submit', function (event) {
		event.preventDefault();
		var organization_id = $('#organization_id').val();
		$.ajax({
			url     : "../update_organization/" + organization_id,
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
		});
	});

	// Delete organization
	$(document).on('click', 'a.delete_organization', function () {
		var organization_id = $(this).attr('id');
		confirm_delete('organization/delete_organization/', organization_id);
	});


	/**
	 * Department
	 * @function load_candidate()                     this will display the data into the page
	 * @function $('#add_candidate_form').submit()    this will add new candidate
	 * @function $('#update_candidate_form').submit() this will update the selected candidate
	 * @function $('a.delete_year_leve').click()       this will delete the selected candidate
	 */


	/**
	 * Load candidate
	 * display all the data into the page
	 */
	function load_candidate() {
		$.ajax({
			url     : "candidate/load_candidate",
			method  : "POST",
			dataType: "json",
			success : function (data) {
				$('#candidate_list').html(data);
				var table = $('#candidate_data').DataTable({
					// "scrollY": 200,
					// "scrollX": true,
				});

				$("#candidate_data tfoot th").each(function (i) {
					var select = $('<select><option value=""></option></select>')
						.appendTo($(this).empty())
						.on('change', function () {
							var val = $(this).val();

							table.column(i)
								.search(val ? '^' + $(this).val() + '$' : val, true, false)
								.draw();
						});

					table.column(i).data().unique().sort().each(function (d, j) {
						select.append('<option value="' + d + '">' + d + '</option>')
					});
				});
			},
			error: function (xhr, status, error) {
				// console.info(xhr.responseText);
			},
		});
	}

	load_candidate();


	// Add candidate
	$('#add_candidate_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url     : "insert_candidate",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#add_candidate_form')[0].reset();
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				notify('A Database Error Occurred', 'Duplicate entry candidate', 'fa fa-info', 'blue', 'btn-info');
			},
		});
	});


	// Update candidate
	$('#update_candidate_form').on('submit', function (event) {
		event.preventDefault();
		var candidate_id = $('#candidate_id').val();
		$.ajax({
			url     : "../update_candidate/" + candidate_id,
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				console.info(xhr.responseText);
			},
		});
	});

	// Delete candidate
	$(document).on('click', 'a.delete_candidate', function () {
		var candidate_id = $(this).attr('id');
		confirm_delete('candidate/delete_candidate/', candidate_id);
	});



	/**
	 * user
	 * @function load_user()                     this will display the data into the page
	 * @function $('#add_user_form').submit()    this will add new user
	 * @function $('#update_user_form').submit() this will update the selected user
	 * @function $('a.delete_user').click()      this will delete the selected user
	 */


	/**
	 * Load user
	 * display all the data into the page
	 */
	function load_user() {
		$.ajax({
			url     : "user/load_user",
			method  : "POST",
			dataType: "json",
			success : function (data) {
				// console.info(data);
				$('#user_list').html(data);
				$('#user_data').dataTable({
					"scrollY": 200,
					"scrollX": true,
				});
			},
			error(xhr) {
				// console.info(xhr.responseText)
			}
		});
	}

	load_user();

	// Add user
	$('#add_user_form').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url     : "insert_user",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#add_user_form')[0].reset();
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				notify('A Database Error Occurred', 'Duplicate entry  for user', 'fa fa-info', 'blue', 'btn-info');
			},
		});
	});

	// Update user
	$('#update_user_form').on('submit', function (event) {
		event.preventDefault();
		var user_id = $('#admin_id').val();
		$.ajax({
			url     : "../update_user/" + user_id,
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
					$('#password').val("");
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
		});
	});

	// Delete user
	$(document).on('click', 'a.delete_user', function () {
		var admin_id = $(this).attr('id');
		confirm_delete('user/delete_user/', admin_id);
	});


	// Student part 
	$('input.senator').on('click', function () {
		var count = 0;
		// count if already select 8 senators
		$('input.senator').each(function () {
			if ($(this).prop("checked") == true) {
				count++;
			}
		});
		// check if already select 8 senators
		if (count > 8) {
			notify('Warning', '8 senators only', 'fa fa-info', 'blue', 'btn-info')
			$(this).prop("checked", false);
		}
	});

	// Vote
	$('#vote').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url     : "voting_system/vote",
			method  : "POST",
			data    : $(this).serialize(),
			dataType: "json",
			success : function (data) {
				if (data.response) {
					notify(data.title, data.content, data.icon, data.type, data.btnClass, "voting_system/logout");
				} else {
					notify(data.title, data.content, data.icon, data.type, data.btnClass);
				}
			},
			error: function (xhr, status, error) {
				notify('A Database Error Occurred', 'Duplicate entry candidate', 'fa fa-info', 'blue', 'btn-info');
			},
		});
	});









	/**
	 * Confirm action for the user specially in delete data
	 * @param  {string} url Url used for ajax
	 * @param  {number} id  identifier of that specific data ex. ID
	 */
	function confirm_delete(url, id) {
		$.confirm({
			title            : 'Delete',
			content          : 'Are you sure you want to delete this data?',
			columnClass      : 'col-md-4 col-md-offset-8 col-xs-4 col-xs-offset-8',
			containerFluid   : true,                                                  // this will add 'container-fluid' instead of 'container'
			icon             : 'fa fa-question',
			theme            : 'modern',
			closeIcon        : true,
			animation        : 'top',
			closeAnimation   : 'bottom',
			typeAnimated     : true,
			backgroundDismiss: true,
			type             : 'red',
			buttons          : {
				ok: {
					text    : 'Ok',
					btnClass: "btn-danger",
					keys    : ['enter'],
					action  : function () {
						$.ajax({
							url     : url + id,
							method  : "POST",
							data    : $(this).serialize(),
							dataType: "json",
							success : function (data) {
								if (data.response) {
									notify(data.title, data.content, data.icon, data.type, data.btnClass);
								} else {
									notify(data.title, data.content, data.icon, data.type, data.btnClass);
								}
								load_department();
								load_position();
								load_organization();
								load_year_level();
								load_student();
								load_candidate();
								load_user();
							},
							error: function (xhr, status, error) {
								notify('A Database Error Occurred', 'Cannot delete or update. This data is used in the other operation', 'fa fa-info', 'blue', 'btn-info');
							},
						});
					}
				},
				close: function () {}
			}
		});
	}


	/**
	 * Jquery Confirm  plugin
	 * => it is used to notify the user 
	 * @param {string} title                    Title of the dialog
	 * @param {string} content                  Content for the dialog
	 * @param {string} icon                     Icon class prepended before the title. ex: 'fa fa-icon'
	 * @param {string} type                     Colors the modal to give the user a hint of success/failure/warning,available options are: 'blue, green, red, orange, purple & dark'
	 * @param {string} [btnClass='btn-warning'] class for the button
	 */
	function notify(title, content, icon, type, btnClass = 'btn-warning', okAction = "") {
		$.confirm({
			title            : title,
			content          : content,
			columnClass      : 'col-md-4 col-md-offset-8 col-xs-4 col-xs-offset-8',
			containerFluid   : true,                                                  // this will add 'container-fluid' instead of 'container'
			icon             : icon,
			theme            : 'modern',
			closeIcon        : true,
			animation        : 'top',
			closeAnimation   : 'bottom',
			typeAnimated     : true,
			backgroundDismiss: true,
			type             : type,
			buttons          : {
				Ok: {
					text    : 'Ok',
					btnClass: btnClass,
					keys    : ['enter'],
					action  : function () {
						if (okAction != "") {
							window.location.href = okAction;
						}
					}
				},
				close: function () {}
			}
		});
	}
});
