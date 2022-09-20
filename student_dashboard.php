<!DOCTYPE html>
<html lang="en">

<head>

	<title>Student Dashboard</title>
	<meta name=“viewport” content=“width=device-width, initial-scale=1, shrink-to-fit=no”>
	<link rel="stylesheet" href="css/styles-admin.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<script src="js/startTime.js"></script>



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

		<!--<div class="header_search">
			<form id="hd_search" action="" method="post" style="display:inline;">
				<input id="search-box" type="text" size="40" placeholder="Enter roll no." name="roll_no">
				<button id="search-btn" type="submit" name="search_by_roll_no_for_search" value="Search"><i class="fa fa-search"></i></button>
			</form>
		</div>
-->



		<div class="header_main">
			<ul id='menu'>
				<li style="border-top-width: 0px;border-left-width: 0px;border-right-width: 0px;border-bottom-width: 0px">
					<img src="/SMS/image/icons/student-icon.png" width="42" height="38">
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
			<h3><a href="" style="color:white ;font-family: lato ;">Student Dashboard</a></h3>
		</strong>
		<hr>
		<div id="left_side_cont">
			<form action="" method="post">
				<center>
					<div class="btn-group">
						<button class="btn" role="button" name="edit_detail" type="submit" value="edit_detail"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Detail</button>
						<button class="btn" role="button" name="show_detail" type=" submit" value="show_detail"><i class="fa fa-users" aria-hidden="true"></i> Show Details</button>

						<button class="btn" role="button" name="courses" type="submit" value="courses"><i class="fa fa-book" aria-hidden="true"></i>Courses</button>
						<button class="btn" role="button" name="show_marks" type="submit" value="show_marks"><i class="fa fa-file-text-o" aria-hidden="true"></i> Show Marks</button>


					</div>
				</center>
			</form>
		</div>
	</div>
	<div id="right_side">
		<div id="demo">


			<?php
			if (isset($_POST['show_detail'])) {
				$n = '0';
				$query = "select * from students where email = '$_SESSION[email]'";
				$query_run = mysqli_query($connection, $query);
				while ($row = mysqli_fetch_assoc($query_run)) {
			?>

					<center>
						<h2>My Details</h2>
					</center>
					<style>
						.center {
							margin-top: 0%;
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
							text-align: center;
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


				<?php
				}
			}
				?>
				<!--EDit details-->
				<?php
				if (isset($_POST['edit_detail'])) {
					$n = '0';
					$query = "select * from students where email = '$_SESSION[email]'";
					$query_run = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($query_run)) {
				?>
						<center>
							<h2>Edit Your details</h2>
						</center>
						<form action="edit_student.php" method="post">
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
									border-radius: 6px;
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
				<!--Attendance-->
				<?php
				if (isset($_POST['show_attendance'])) {
					$n = '0';
				?>
					<center>
						<h2>Attendance</h2>
					</center>

				<?php
					$connection = mysqli_connect("localhost", "root", "");
					$db = mysqli_select_db($connection, "sms");
					$query = "select * from students";
					$query_run = mysqli_query($connection, $query);
					$query1 = "select * from students where email = '$_SESSION[email]'";
					$query_run1 = mysqli_query($connection, $query1);
					$row1 = mysqli_fetch_assoc($query_run1);
					echo "<center><table style='width: 92%; border-collapse: collapse;' id='stytable'>
							<thead>
							<tr id='stytr'>
								<td id='stytd'><b>Roll NO.</b></td>
								<td id='stytd'><b>Name</b></td>
								<td id='stytd'><b>Class</b></td>
								
							</tr>
							</thead>";
					while ($row = mysqli_fetch_assoc($query_run)) {
						if ($row['roll_no'] == $row1['roll_no']) {
							echo "<tr id='stytr'>";
							echo "<td id='stytd'>" . $row['roll_no'] . "</td>";
							echo "<td id='stytd'>" . $row['name'] . "</td>";
							echo "<td id='stytd'>" . $row['class'] . "</td>";

							echo "</tr>";
						}
					}
					echo "</table></center>";
				}
				?>



				<!--courses-->
				<?php
				if (isset($_POST['courses'])) {
					$n = '0';
				?>
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



					<?php
				}
					?>




					<?php
					if (isset($_POST['show_marks'])) {
						$n = '0';
					?>
						<center>
							<h2>Marks</h2>
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
						$query2 = "select * from students where email = '$_SESSION[email]'";
						$query_run2 = mysqli_query($connection, $query2);
						$row2 = mysqli_fetch_assoc($query_run2);


						echo "<center><table style='width: 92%; border-collapse: collapse;' id='stytable'>
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
								if ($row['roll_no'] == $row2['roll_no']) {
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
								}
								$row1 = mysqli_fetch_assoc($query_run1);
							} else {
								echo "<td id='stytd'> sn no doesnt match </td>";
							}
							echo "</tr>";
						}


						echo "</table></center>";
					}
					?>

					<?php if ($n == '1') { ?>
						<div id="clockdate">
							<div class="clockdate-wrapper">
								<div id="clock"></div>
								<div id="date"></div>
							</div>
						</div>
					<?php } ?>
					</div>



</body>

</html>