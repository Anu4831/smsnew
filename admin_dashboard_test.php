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
			<div class="custom-select" style="width:180px;">

			</div>
			<div class="select" style="width:180px;">
				<form action="" method="post">
					<select id="language-list">
						<option value="delete_student">JavaScript</option>
						<option value="show_students">PHP</option>
						<option value="delete_student">Csharp</option>
						<option value="delete_student">Java</option>
						<option value="delete_student">Node.js</option>
					</select>
				</form>
			</div>



			<form action="" method="post">
				<center>
					<div class="btn-group">
						<div class="custom-select" style="width:180px;">

							<form action="" method="post">
								<select name="data" onchange="this.form.submit();">
									<option value="1">&#xf0c0; Manage Students</option>
									<option value="show_students">&#xf2b9; Total Students</option>
									<option value="2">&#xf0fe; Add Students</option>
									<option value="3"> &#xf044; Edit Students</option>
									<option value="4"> &#xf146; Remove Students</option>
								</select>
							</form>
							<noscript><input type=”submit” value=”Submit”></noscript>

						</div>
						<button class="btn" role="button" name="edit_student" type="submit" value="edit_student"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Student</button>
						<button class="btn" role="button" name="add_new_student" type="submit" value="add_new_student"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Student</button>
						<button class="btn" role="button" name="delete_student" type="submit" value="delete_student"><i class="fa fa-user-times" aria-hidden="true"></i> Delete Student</button>
						<button class="btn" role="button" name="show_students" type="submit" value="show_students"><i class="fa fa-users" aria-hidden="true"></i> Total Students</button>
						<button class="btn" role="button" name="show_attendance" type="submit" value="show_attendance"><i class="fa fa-check-square-o" aria-hidden="true"></i> Show Attendance</button>
						<button class="btn" role="button" name="attendance_record" type="submit" value="attendance_record"><i class="fa fa-check-square-o" aria-hidden="true"></i> Attendance Record</button>
						<button class="btn" role="button" name="courses" type="submit" value="courses"><i class="fa fa-book" aria-hidden="true"></i>Courses</button>
						<div class="custom-select" style="width:180px;">
							<select class="fa">
								<option value="">&#xf02d; Manage Course</option>
								<option value="">&#xf2b9; Add Course</option>
								<option value=""> &#xf2bb; Edit Course</option>
							</select>
						</div>

						<button class="btn" role="button" name="show_marks" type="submit" value="show_marks"><i class="fa fa-file-text-o" aria-hidden="true"></i> Show Marks</button>
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
				<center>
					<form action="" method="post">
						&nbsp;&nbsp;<b>Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
						<input type="submit" name="search_by_roll_no_for_edit" value="Search">
					</form><br><br>

				</center>
				<?php
			}
			if (isset($_POST['search_by_roll_no_for_edit'])) {
				$n = '0';
				$query = "select * from students where roll_no = $_POST[roll_no]";
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
					<form action="admin_edit_student.php" method="post">


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
									<b>Phone:</b>
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
							<tr>
								<td>
									<b>Attendance:</b>
								</td>
								<td>
									<input type="number" name="attendance" value="<?php echo $row['attendance'] ?>">
								</td>
							</tr>
							<td></td>
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
			<!-- #Code for Delete student details---Start-->
			<?php
			if (isset($_POST['delete_student'])) {
				$n = '0';
			?>
				<center>
					<form action="delete_student.php" method="post">
						&nbsp;&nbsp;<b>Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
						<input type="submit" name="search_by_roll_no_for_delete" value="Delete">
					</form><br><br>
				</center>
			<?php
			}
			?>



			<?php
			if (isset($_POST['courses'])) {
				$n = '0';
			?>




			<?php
			}
			?>

			<!--code for add new students--->
			<?php
			if (isset($_POST['add_new_student'])) {
				$n = '0';
			?>
				<center>
					<h4>Fill the given details</h4>
				</center>
				<form action="add_student.php" method="post">
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
							<td><br><input type="submit" name="add" value="Add Student"></td>
						</tr>
					</table>
				</form>
			<?php
			}
			?>


			<?php
			if (isset($_POST['show_students'])) {
				$n = '0';
			?>
				<center>
					<h4>Total Students</h4>
				</center>

			<?php
				$connection = mysqli_connect("localhost", "root", "");
				$db = mysqli_select_db($connection, "sms");
				$query = "select * from students";
				$query_run = mysqli_query($connection, $query);
				echo "<table style='width: 100%; border-collapse: collapse;'>
							<thead>
							<tr>
								<td id='id'><b>Roll NO.</b></td>
								<td id='id'><b>Name</b></td>
								<td id='id'><b>Class</b></td>
								<td id='id'><b>Total Days</b></td>
								<td id='id'><b>Present Days</b></td>
							</tr>
							</thead>";
				while ($row = mysqli_fetch_assoc($query_run)) {
					echo "<tr>";
					echo "<td id='id'>" . $row['roll_no'] . "</td>";
					echo "<td id='id'>" . $row['name'] . "</td>";
					echo "<td id='id'>" . $row['class'] . "</td>";
					echo "<td id='id'>45</td>";
					echo "<td id='id'>" . $row['attendance'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			?>
			<?php
			if (isset($_POST['show_marks'])) {
				$n = '0';
			?>
				<center>
					<h4>Students Marks</h4>
				</center>
				<div id="left_side_cont">
					<form action="" method="post">
						<table>
							<tr>
								<td>
									<input type="submit" name="add_new_marks" value="Add New Marks"> <br><br>
								</td>
								<td>
									<input type="submit" name="edit_marks" value="Edit Marks"> <br><br>
								</td>
							</tr>
						</table>

					</form>
				</div>
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


				echo "<table style='width: 100%; border-collapse: collapse;'>
							<thead>
							<tr>
								<td id='id'><b>Roll NO.</b></td>
								<td id='id'><b>Class</b></td>
								<td id='id'><b>Name</b></td>
								<td id='id'><b>English</b></td>
								<td id='id'><b>Nepali</b></td>
								<td id='id'><b>Science</b></td>
								<td id='id'><b>Maths</b></td>
								<td id='id'><b>Social</b></td>
								<td id='id'><b>Computer</b></td>
								<td id='id'><b>Result</b></td>
							</tr>
							</thead>";
				while ($row = mysqli_fetch_assoc($query_run)) {
					if ($row['s_no'] == $row1['s_no']) {
						echo "<tr>";
						echo "<td id='id'>" . $row['roll_no'] . "</td>";
						echo "<td id='id'>" . $row['class'] . "</td>";
						echo "<td id='id'>" . $row['name'] . "</td>";
						echo "<td id='id'>" . $row1['english'] . "</td>";
						echo "<td id='id'>" . $row1['nepali'] . "</td>";
						echo "<td id='id'>" . $row1['science'] . "</td>";
						echo "<td id='id'>" . $row1['math'] . "</td>";
						echo "<td id='id'>" . $row1['social'] . "</td>";
						echo "<td id='id'>" . $row1['computer'] . "</td>";
						echo "<td id='id'>";
						if ($row1['computer'] < "35" || $row1['english'] < "35" || $row1['nepali'] < "35" || $row1['science'] < "35" || $row1['math'] < "35" || $row1['social'] < "35" || $row1['computer'] < "35") {
							echo "<a style='color:red;'>Fail</a>";
						} else {

							echo "<a style='color:green;'>Pass</a>";
						}
						echo "</td>";
						$row1 = mysqli_fetch_assoc($query_run1);
					} else {
						echo "<td id='id'> student/marks is not added. </td>";
					}
					echo "</tr>";
				}


				echo "</table>";
			}
			?>



			<?php
			if (isset($_POST['add_new_marks'])) {
				$n = '0';
			?>
				<center>
					<h4>Fill the given details</h4>
				</center>
				<form action="add_marks.php" method="post">
					<table>
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
							<td><br><input type="submit" name="add" value="Add Marks"></td>
						</tr>
					</table>
				</form>
			<?php
			}
			?>


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

						<p>Total Attendance:
							<Strong>
								<?php
								$connection = mysqli_connect("localhost", "root", "");
								$db = mysqli_select_db($connection, "sms");
								$q = "select * FROM teachers";
								$res = mysqli_query($connection, $q);
								echo mysqli_num_rows($res);
								?>
							</Strong>
						</p>

					</div>
				</div>

			<?php } ?>

		</div>

	</div>


	<script>
		$(document).ready(function() {
			$('#language-list').on('change', function() {
				var language = $(this).val();
				$("button[name='" + language + "']").click();
			});
		});
	</script>
</body>

</html>





