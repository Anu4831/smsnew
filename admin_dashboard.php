<!DOCTYPE html>
<html lang="en">

<head>

	<title>Admin Dashboard</title>
	<meta name=“viewport” content=“width=device-width, initial-scale=1, shrink-to-fit=no”>
	<link rel="stylesheet" href="css/styles-admin.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
	<!--	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css" rel="stylesheet" /> -->
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<script src="js/startTime.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

	<?php
	session_start();
	$name = "";
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "sms");
	$n = '1';
	?>
</head>

<body onload="startTime()">
	<div id="header">
		<!--	<strong> Admin Panel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> -->
		<div class="header_search">
			<form id="hd_search" action="" method="post" style="display:inline;">
				<input id="search-box" type="text" size="40" placeholder="Enter roll no." name="roll_no">
				<button id="search-btn" type="submit" name="search_by_roll_no_for_search" value="Search"><i class="fa fa-search"></i></button>
			</form>
		</div>



		<div class="header_main">
			<ul id='menu'>
				<li style="border-top-width: 0px;border-left-width: 0px;border-right-width: 0px;border-bottom-width: 0px">
					<img src="/SMS/image/gggg.png" width="48" height="46">
					<a href='#' style="padding: 10px 15px 0px 0px;"><?php echo $_SESSION['name']; ?></a>
					<ul style="padding-top:32px;right:0.7%;">
						<li><a href='#' style=" font-size: 16px;"><?php echo $_SESSION['email']; ?></a></li>
						<li><a href="logout.php" style=" font-size: 16px;">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>



	</div>
	<div id="left_side">
		<strong>
			<h2 style="font-family: lato ;">Student Management System</h2>

		</strong>
		<strong>
			<h3><a href="" style="color:white ;font-family: lato ;">Admin Dashboard</a></h3>
		</strong>
		<hr>
		<div id="left_side_cont">
			<form action="" method="post">
				<center>

					<div class="btn-group">
						<!-- Studewnts dropdown
						<div class="select" style="width:94%;">
							<form action="" method="post">
								<select id="dd-list">
									<option value="0" noselection>&#xf0c0; Manage Students</option>
									<option value="show_students">&#xf2b9; Total Students</option>
									<option value="add_new_student">&#xf0fe; Add Students</option>
									<option value="edit_student">&#xf044; Edit Students</option>
									<option value="delete_student">&#xf146; Remove Students</option>
								</select>
							</form>
						</div> -->

						<button class=" btn" role="button" name="edit_student" type="submit" value="edit_student"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Student</button>
						<button class="btn" role="button" name="add_new_student" type="submit" value="add_new_student"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Student</button>
						<button class="btn" role="button" name="delete_student" type="submit" value="delete_student"><i class="fa fa-user-times" aria-hidden="true"></i> Delete Student</button>
						<button class="btn" role="button" name="show_students" type="submit" value="show_students"><i class="fa fa-users" aria-hidden="true"></i> Total Students</button>
						<button class="btn" role="button" name="show_attendance" type="submit" value="show_attendance"><i class="fa fa-check-square-o" aria-hidden="true"></i> Show Attendance</button>
						<button class="btn" role="button" name="courses" type="submit" value="courses"><i class="fa fa-book" aria-hidden="true"></i>Courses</button>
						<button class="btn" role="button" name="edit_course" type="submit" value="edit_course"><i class="fa fa-book" aria-hidden="true"></i>Edit Course</button>
						<div class="selectt" style="width:94%;">
							<form action="" method="post">
								<select id="marks-dd-list">
									<option value="0" noselection>&#xf0c0; Manage Marks</option>
									<option value="show_marks"> Show Marks</option>
									<option value="add_new_marks"> Add Marks</option>
									<option value="edit_marks"> Edit Marks</option>
								</select>
							</form>
						</div>

						<button class="btn" role="button" name="show_marks" type="submit" value="show_marks" style="display: none;"><i class="fa fa-file-text-o" aria-hidden="true"></i> Show Marks</button>
						<button class="btn" role="button" name="add_new_marks" type="submit" value="add_new_marks" style="display: none;"><i class="fa fa-file-text-o" aria-hidden="true"></i>Add New Marks</button>
						<button class="btn" role="button" name="edit_marks" type="submit" value="edit_marks" style="display: none;"><i class="fa fa-file-text-o" aria-hidden="true"></i>Add New Marks</button>
					</div>
				</center>
			</form>
		</div>
	</div>
	<div id="right_side">
		<div id="demo">
			<!-- #Code for search student---Start-->
			<?php
			if (isset($_POST['search_by_roll_no_for_search'])) {
				$n = '0';
				$query = "select * from students where roll_no = '$_POST[roll_no]'";
				$query_run = mysqli_query($connection, $query);

				while ($row = mysqli_fetch_assoc($query_run)) {
			?>
					<style>
						.center {
							margin-top: 10%;
							margin-left: auto;
							margin-right: auto;
						}

						table {
							font-family: arial, sans-serif;
							border-collapse: collapse;
							width: 60%;
						}

						td,
						th {
							border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;
							padding-left: 20px;
						}

						tr:nth-child(even) {
							background-color: #dddddd;
						}
					</style>
					<table class="center">
						<tr>
							<td>
								<b>Name:</b>
							</td>
							<td>
								<?php echo $row['name'] ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Roll No:</b>
							</td>
							<td>
								<?php echo $row['roll_no'] ?>
							</td>
						</tr>


						<tr>
							<td>
								<b>Class:</b>
							</td>
							<td>
								<?php echo $row['class'] ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Phone:</b>
							</td>
							<td>
								<?php echo $row['phone'] ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td>
							<td>
								<?php echo $row['email'] ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td>
							<td>
								<?php echo $row['password'] ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Attendance:</b>
							</td>
							<td>
								<?php echo $row['attendance'] ?>
							</td>
						</tr>

					</table>
			<?php
				}
			}
			?>


			<!-- #Code for edit student details---Start-->
			<?php
			if (isset($_POST['edit_student'])) {
				$n = '0';
			?>
				<div id=staa>
					<style>
						input {
							padding: 4px 4px;
							margin: 2px 0;
							box-sizing: border-box;
							border-radius: 5px;
						}
					</style>
					<center>
						<form action="" method="post">
							&nbsp;&nbsp;<b>Enter Roll No: </b>&nbsp;&nbsp; <input type="text" name="roll_no">
							<input type="submit" name="search_by_roll_no_for_edit" value="Search">
						</form><br><br>
					</center>
				</div>
				<?php
			}
			if (isset($_POST['search_by_roll_no_for_edit'])) {
				$n = '0';
				$query = "select * from students where roll_no = $_POST[roll_no]";
				$query_run = mysqli_query($connection, $query);

				while ($row = mysqli_fetch_assoc($query_run)) {
				?>
					<form action="admin_edit_student.php" method="post">
						<style>
							.center {
								margin-top: 10%;
								margin-left: 200px;
								margin-right: auto;
							}

							input {
								width: 300%;
								width: 300%;
								padding: 4px 4px;
								margin: 2px 0;
								box-sizing: border-box;
								border-radius: 6px;
							}

							/* Chrome, Safari, Edge, Opera */
							input::-webkit-outer-spin-button,
							input::-webkit-inner-spin-button {
								-webkit-appearance: none;
								margin: 0;
							}

							/* Firefox */
							input[type="number"] {
								-moz-appearance: textfield;
							}
						</style>
						<table class="center">
							<tr>
								<td>
									<b>Roll No:</b>
								</td>
								<td>
									<input type="text" name="roll_no" value="<?php echo $row['roll_no'] ?>">
								</td>
							</tr>
							<tr>
								<td>
									<b>Name:</b>
								</td>
								<td>
									<input type="text" name="name" value="<?php echo $row['name'] ?>">
								</td>
							</tr>

							<tr>
								<td>
									<b>Class:</b>
								</td>
								<td>
									<input type="text" name="class" value="<?php echo $row['class'] ?>">
								</td>
							</tr>
							<tr>
								<td>
									<b>Mobile:</b>
								</td>
								<td>
									<input type="text" name="phone" value="<?php echo $row['phone'] ?>">
								</td>
							</tr>
							<tr>
								<td>
									<b>Email:</b>
								</td>
								<td>
									<input type="text" name="email" value="<?php echo $row['email'] ?>">
								</td>
							</tr>
							<tr>
								<td>
									<b>Password:</b>
								</td>
								<td>
									<input type="password" name="password" value="<?php echo $row['password'] ?>">
								</td>
							</tr>
							<br>
							<tr>
								<td></td>
								<td>
									<input type="submit" value="Save" style="width: 100px; background-color: #708090; ">
								</td>
							</tr>
						</table>
					</form>
			<?php
				}
			}
			?>
			<!--code for add new students--->
			<?php
			if (isset($_POST['add_new_student'])) {
				$n = '0';
			?>
				<center>
					<h2>Fill the given details</h2>
				</center>
				<form action="add_student.php" method="post">
					<style>
						.center {
							margin-top: 0%;
							margin-left: 200px;
							margin-right: auto;
						}

						input {
							width: 280%;
							width: 280%;
							padding: 4px 4px;
							margin: 2px 0;
							box-sizing: border-box;
							border-radius: 5px;
						}

						/* Chrome, Safari, Edge, Opera */
						input::-webkit-outer-spin-button,
						input::-webkit-inner-spin-button {
							-webkit-appearance: none;
							margin: 0;
						}

						/* Firefox */
						input[type="number"] {
							-moz-appearance: textfield;
						}
					</style>
					<table class="center">
						<tr>
							<td>
								<b>Roll No:</b>
							</td>
							<td>
								<input type="number" name="roll_no" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td>
							<td>
								<input type="text" name="name" required>
							</td>
						</tr>

						<tr>
							<td>
								<b>Class:</b>
							</td>
							<td>
								<input type="number" name="class" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Phone:</b>
							</td>
							<td>
								<input type="number" name="phone" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td>
							<td>
								<input type="email" name="email" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td>
							<td>
								<input type="password" name="password" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Attendance:</b>
							</td>
							<td>
								<input type="number" value="0" name="attendance" required>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><br><input type="submit" name="add" value="Add Student" style="width: 100px; background-color: #708090; "></td>
						</tr>
					</table>
				</form>
			<?php
			}
			?>
			<!-- #Code for Delete student details---Start-->
			<?php
			if (isset($_POST['delete_student'])) {
				$n = '0';
			?>
				<div id=staa>
					<style>
						input {
							padding: 4px 4px;
							margin: 2px 0;
							box-sizing: border-box;
							border-radius: 5px;
						}
					</style>
					<center>
						<form action="delete_student.php" method="post">
							&nbsp;&nbsp;<b>Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
							<input type="submit" name="search_by_roll_no_for_delete" value="Delete">
						</form><br><br>
					</center>
				</div>
			<?php
			}
			?>


			<!--code for add new courses--->
			<?php
			if (isset($_POST['courses'])) {
				$n = '0';
			?>
				<center>
					<h2>Fill the given details</h2>
				</center>
				<style>
					input {
						width: 200%;
						width: 200%;
						padding: 4px 4px;
						margin: 2px 0;
						box-sizing: border-box;
						border-radius: 5px;
					}
				</style>
				<form action="add_courses.php" method="post">
					<center>
						<table>
							<tr>
								<td>
									<b>Course ID:</b>
								</td>
								<td>
									<input type="text" name="cid" placeholder="Course ID" required style="width: 96%;">
								</td>
							</tr>
							<tr>
								<td>
									<b>Course Name:</b>
								</td>
								<td>
									<input type="text" name="cname" placeholder="Course Name" required style="width: 96%;">
								</td>
							</tr>
							<tr>
								<td></td>
								<td><br><input type="submit" name="add" value="Add Courses" style="width: 100px; background-color: #708090; "></td>
							</tr>
						</table>
					</center>
				</form>

				<div>
					<h2>All Courses</h2>
					<div class="table-responsive">
						<center>
							<table id="stytable">

								<tr id="stytr">
									<thead>
										<tr id="stytr">
											<td id='stytd' <b>Course ID</b></td>
											<td id='stytd'><b>Course Name</b></td>
										</tr>
									</thead>

									<tbody>

										<?php
										$connection = mysqli_connect("localhost", "root", "");
										$db = mysqli_select_db($connection, "sms");
										$query = 'SELECT * FROM courses';
										$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
										while ($row = mysqli_fetch_assoc($result)) {

											echo '<tr id="stytr">';
											echo '<td id="stytd">' . $row['id'] . '</td>';
											echo '<td id="stytd">' . $row['course'] . '</td>';
											echo '</tr> ';
										}
										?>

									</tbody>

							</table>
						</center>
					</div>

				</div>


		</div>

	</div>
	</div>
<?php
			}
?>
<!-- #Code for edit course---Start-->
<?php
if (isset($_POST['edit_course'])) {
	$n = '0';
?>
	<div id=staa>
		<center>
			<form action="" method="post">
				&nbsp;&nbsp;<b>Enter Course Id : </b>&nbsp;&nbsp; <input type="text" name="course_id">
				<input type="submit" name="search_by_course_id_for_edit" value="Search">
			</form><br><br>
		</center>
	</div>
	<?php
}
if (isset($_POST['search_by_course_id_for_edit'])) {
	$n = '0';
	$query = "select * from courses where id = $_POST[course_id]";
	$query_run = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($query_run)) {
	?>

		<style>
			.center {
				margin-top: 10%;
				margin-left: 200px;
				margin-right: auto;
			}

			input {
				width: 300%;
				width: 300%;
				padding: 4px 4px;
				margin: 2px 0;
				box-sizing: border-box;
				border-radius: 20px;
			}
		</style>
		<form action="edit_courses.php" method="post">


			<table class="center">
				<tr>
					<td>
						<b>Course ID</b>
					</td>
					<td>

						<input type="text" name="id" value="<?php echo $row['id'] ?>">

					</td>
				</tr>
				<tr>
					<td>
						<b>Course Name:</b>
					</td>
					<td>
						<input type="text" name="course" value="<?php echo $row['course'] ?>">
					</td>
				</tr>

				<td>
					<input type="submit" name="edit" value="Save">
				</td>
				</tr>
			</table>
		</form>
<?php
	}
}
?>


<?php
if (isset($_POST['show_students'])) {
	$n = '0';
?>
	<center>
		<h2>Total Students</h2>
	</center>

<?php
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "sms");
	$query = "select * from students";
	$query_run = mysqli_query($connection, $query);

	echo "<center><form action='add_student.php' method='post'>
	<table style='width: 50%;
	 border-collapse: collapse;
	 padding left:40px id='stytable';
	 '>
							<thead>
							<tr id='stytr'>
								<td id='stytd' ><b>Roll No.</b></td>
								<td id='stytd'><b>Name</b></td>
								<td id='stytd'><b>Class</b></td>
								<td id='stytd'><b>Total Days</b></td>
								<td id='stytd'><b>Present Days</b></td>
								
							</tr>
							</thead>";
	while ($row = mysqli_fetch_assoc($query_run)) {
		echo "<tr id='stytr'>";
		echo "<td id='stytd'>" . $row['roll_no'] . "</td>";
		echo "<td id='stytd'>" . $row['name'] . "</td>";
		echo "<td id='stytd'>" . $row['class'] . "</td>";
		echo "<td id='stytd'>45</td>";
		echo "<td id='stytd'>" . $row['attendance'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</form>";
	echo "</center>";
}
?>


<?php
if (isset($_POST['show_attendance'])) {
	$n = '0';
?>
	<center>
		<h2>Total Students</h2>
	</center>

<?php
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "sms");
	$query = "select * from students";
	$query_run = mysqli_query($connection, $query);

	echo "<center><form action='add_student.php' method='post'>
	<table style='width: 50%;
	 border-collapse: collapse;
	 padding left:40px; id='stytable'
	 '>
	 <style>input {

		padding: 4px 4px;
		margin: 2px 0;
		box-sizing: border-box;
		border-radius: 5px;
	}</style>
							<thead>
							<tr id='stytr'>
								<td id='stytd'><b>Roll No.</b></td>
								<td id='stytd'><b>Name</b></td>
								<td id='stytd'><b>Class</b></td>
								<td id='stytd'><b>Total Days</b></td>
								<td id='stytd'><b>Present Days</b></td>
								<td id='stytd'><b>Present</b></td>
							</tr>
							</thead>";
	while ($row = mysqli_fetch_assoc($query_run)) {
		echo "<tr id='stytr'>";
		echo "<td id='stytd'>" . $row['roll_no'] . "</td>";
		echo "<td id='stytd'>" . $row['name'] . "</td>";
		echo "<td id='stytd'>" . $row['class'] . "</td>";
		echo "<td id='stytd'>45</td>";
		echo "<td id='stytd'>" . $row['attendance'] . "</td>";
		echo "<td id='stytd'><input type='checkbox' name='present' ></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo '<input type="submit" name="submit" value="submit">';
	echo "</form>";
	echo "</center>";
}
?>

<?php
if (isset($_POST['show_marks'])) {
	$n = '0';
?>
	<center>
		<h2>Students Marks</h2>
	</center>
<?php
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "sms");
	$query = "select * from students";
	$query_run = mysqli_query($connection, $query);
	$connection1 = mysqli_connect("localhost", "root", "");
	$db1 = mysqli_select_db($connection1, "sms");
	$query1 = "select * from marks";
	$query_run1 = mysqli_query($connection1, $query1);
	$row1 = mysqli_fetch_assoc($query_run1);


	echo "<center> <table style='style='width: 50%;
	border-collapse: collapse;
	padding left:40px;id='stytable''>
							<thead>
							<tr id='stytr'>
								<td id='stytd'><b>Roll NO.</b></td>
								<td id='stytd'><b>Class</b></td>
								<td id='stytd'><b>Name</b></td>
								<td id='stytd'><b>English</b></td>
								<td id='stytd'><b>Nepali</b></td>
								<td id='stytd'><b>Science</b></td>
								<td id='stytd'><b>Maths</b></td>
								<td id='stytd'><b>Social</b></td>
								<td id='stytd'><b>Computer</b></td>
								<td id='stytd'><b>Result</b></td>
							</tr>
							</thead>";
	while ($row = mysqli_fetch_assoc($query_run)) {
		if ($row['s_no'] == $row1['s_no']) {
			echo "<tr id='stytr'>";
			echo "<td id='stytd'>" . $row['roll_no'] . "</td>";
			echo "<td id='stytd'>" . $row['class'] . "</td>";
			echo "<td id='stytd'>" . $row['name'] . "</td>";
			echo "<td id='stytd'>" . $row1['english'] . "</td>";
			echo "<td id='stytd'>" . $row1['nepali'] . "</td>";
			echo "<td id='stytd'>" . $row1['science'] . "</td>";
			echo "<td id='stytd'>" . $row1['math'] . "</td>";
			echo "<td id='stytd'>" . $row1['social'] . "</td>";
			echo "<td id='stytd'>" . $row1['computer'] . "</td>";
			echo "<td id='stytd'>";
			if ($row1['computer'] < "35" || $row1['english'] < "35" || $row1['nepali'] < "35" || $row1['science'] < "35" || $row1['math'] < "35" || $row1['social'] < "35" || $row1['computer'] < "35") {
				echo "<a style='color:red;'>Fail</a>";
			} else {

				echo "<a style='color:green;'>Pass</a>";
			}
			echo "</td>";
			$row1 = mysqli_fetch_assoc($query_run1);
		} else {
			echo "<td id='stytd'> student/marks is not added. </td>";
		}
		echo "</tr>";
	}


	echo "</table>";
	echo "</center>";
}
?>


<!--code for adding new marks-->



<?php
if (isset($_POST['add_new_marks'])) {
	$n = '0';
?>

	<center>
		<h2>Add Marks</h2>
	</center>
	<form action="add_marks.php" method="post">
		<style>
			.center {
				margin-top: 0%;
				margin-left: 200px;
				margin-right: auto;
			}

			input {
				width: 300%;
				width: 300%;
				padding: 4px 4px;
				margin: 2px 0;
				box-sizing: border-box;
				border-radius: 5px;
			}

			/* Chrome, Safari, Edge, Opera */
			input::-webkit-outer-spin-button,
			input::-webkit-inner-spin-button {
				-webkit-appearance: none;
				margin: 0;
			}

			/* Firefox */
			input[type="number"] {
				-moz-appearance: textfield;
			}
		</style>

		<table class="center">
			<tr>
				<td>
					<b>Roll No:</b>
				</td>
				<td>
					<input type="number" name="s_no" required>
				</td>
			</tr>
			<tr>
				<td>
					<b>English:</b>
				</td>
				<td>
					<input type="number" name="english" required>
				</td>
			</tr>

			<tr>
				<td>
					<b>Nepali:</b>
				</td>
				<td>
					<input type="number" name="nepali" required>
				</td>
			</tr>
			<tr>
				<td>
					<b>Science:</b>
				</td>
				<td>
					<input type="number" name="science" required>
				</td>
			</tr>
			<tr>
				<td>
					<b>Maths:</b>
				</td>
				<td>
					<input type="number" name="maths" required>
				</td>
			</tr>
			<tr>
				<td>
					<b>Social:</b>
				</td>
				<td>
					<input type="number" name="social" required>
				</td>
			</tr>
			<tr>
				<td>
					<b>Computer:</b>
				</td>
				<td>
					<input type="number" name="computer" required>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><br><input type="submit" name="add" value="Add Marks" style="width: 100px; background-color: #708090; "></td>
			</tr>
		</table>
	</form>
<?php
}
?>

<!--code for editing marks-->


<?php
if (isset($_POST['edit_marks'])) {
	$n = '0';
?>
	<div id=staa>

		<center>
			<style>
				.inputt {
					width: 150px;
					padding: 4px 4px;
					margin: 2px 0;
					box-sizing: border-box;
					border-radius: 5px;
				}

				input {

					padding: 4px 4px;
					margin: 2px 0;
					box-sizing: border-box;
					border-radius: 5px;
				}
			</style>
			<form action="" method="post">
				&nbsp;&nbsp;<b>Enter Roll No. To Edit: </b>&nbsp;&nbsp; <input type="text" name="s_no" class="inputt">
				<input type="submit" name="search_by_s_no_for_edit" value="Search">
			</form><br><br>
		</center>
	</div>
	<?php
}
if (isset($_POST['search_by_s_no_for_edit'])) {
	$n = '0';
	$query = "select * from marks where s_no = $_POST[s_no]";
	$query_run = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($query_run)) {
	?>
		<form action="admin_edit_marks.php" method="post">
			<style>
				.center {
					margin-top: 10%;
					margin-left: 200px;
					margin-right: auto;
				}

				input {
					width: 300%;
					width: 300%;
					padding: 4px 4px;
					margin: 2px 0;
					box-sizing: border-box;
					border-radius: 6px;
				}

				/* Chrome, Safari, Edge, Opera */
				input::-webkit-outer-spin-button,
				input::-webkit-inner-spin-button {
					-webkit-appearance: none;
					margin: 0;
				}

				/* Firefox */
				input[type="number"] {
					-moz-appearance: textfield;
				}
			</style>
			<table class="center">
				<tr>
					<td>
						<b>Roll No:</b>
					</td>
					<td>
						<input type="number" name="s_no" value="<?php echo $row['s_no'] ?>">
					</td>
				</tr>
				<tr>
					<td>
						<b>English:</b>
					</td>
					<td>
						<input type="number" name="english" value="<?php echo $row['english'] ?>">
					</td>
				</tr>

				<tr>
					<td>
						<b>Nepali:</b>
					</td>
					<td>
						<input type="number" name="nepali" value="<?php echo $row['nepali'] ?>">
					</td>
				</tr>
				<tr>
					<td>
						<b>Science:</b>
					</td>
					<td>
						<input type="number" name="science" value="<?php echo $row['science'] ?>">
					</td>
				</tr>
				<tr>
					<td>
						<b>Math:</b>
					</td>
					<td>
						<input type="number" name="math" value="<?php echo $row['math'] ?>">
					</td>
				</tr>
				<tr>
					<td>
						<b>Social:</b>
					</td>
					<td>
						<input type="number" name="social" value="<?php echo $row['social'] ?>">
					</td>
				</tr>
				<tr>
					<td>
						<b>Computer:</b>
					</td>
					<td>
						<input type="number" name="computer" value="<?php echo $row['computer'] ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td><br><input type="submit" name="update" value="Update Marks"></td>
				</tr>
			</table>
		</form>
<?php
	}
}
?>
<!--for clock-->
<?php if ($n == '1') { ?>
	<div id="clockdate">
		<div class="clockdate-wrapper">
			<div id="clock"></div>
			<div id="date"></div>
		</div>
	</div>
	<div id="main_infos">
		<div id="infos"><img src="/SMS/image/icons/students.png" width="210" height="115">
			<p style="padding-top:5px ;">Total Students:
				<Strong>
					<?php
					$connection = mysqli_connect("localhost", "root", "");
					$db = mysqli_select_db($connection, "sms");
					$q = "select * FROM students";
					$res = mysqli_query($connection, $q);
					echo mysqli_num_rows($res);
					?>
				</Strong>
			</p>

		</div>
		<div id="infos"><img src="/SMS/image/icons/course.png" width="120" height="120">

			<p>Total Course:
				<Strong>
					<?php
					$connection = mysqli_connect("localhost", "root", "");
					$db = mysqli_select_db($connection, "sms");
					$q = "select * FROM students";
					$res = mysqli_query($connection, $q);
					echo mysqli_num_rows($res);
					?>
				</Strong>
			</p>

		</div>
		<div id="infos"><img src="/SMS/image/icons/attendance.png" width="120" height="120">

			<p>Total Days:
				<Strong>
					<!--	<?php
							$connection = mysqli_connect("localhost", "root", "");
							$db = mysqli_select_db($connection, "sms");
							$q = "select * FROM teachers";
							$res = mysqli_query($connection, $q);
							echo mysqli_num_rows($res);
							?> -->
					45
				</Strong>
			</p>

		</div>
	</div>

<?php } ?>

</div>

</div>


<script>
	/*
	$(document).ready(function() {
		$('#dd-list').on('change', function() {
			var ddlist = $(this).val();
			$("button[name='" + ddlist + "']").click();
		});
	}); */
	$(document).ready(function() {
		$('#marks-dd-list').on('change', function() {
			var marksddlist = $(this).val();
			$("button[name='" + marksddlist + "']").click();
		});
	});
</script>
</body>

</html>