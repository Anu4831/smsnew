<!DOCTYPE html>
<html lang="en">

<head>

	<title>Teacher Dashboard</title>
	<meta name=“viewport” content=“width=device-width, initial-scale=1, shrink-to-fit=no”>
	<link rel="stylesheet" href="css/styles-admin.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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




		<div class="header_main">
			<ul id='menu'>
				<li style="border-top-width: 0px;border-left-width: 0px;border-right-width: 0px;border-bottom-width: 0px">
					<img src="/SMS/image/t.png" width="42" height="38">
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
			<h3><a href="" style="color:white ;font-family: lato ;">Teacher Dashboard</a></h3>
		</strong>
		<hr>
		<div id="left_side_cont">
			<form action="" method="post">
				<center>
					<div class="btn-group">

						<button class="btn" role="button" name="show_attendance" type="submit" value="show_attendance"><i class="fa fa-check-square-o" aria-hidden="true"></i> Attendance</button>
						<button class="btn" role="button" name="courses" type="submit" value="courses"><i class="fa fa-book" aria-hidden="true"></i>Courses</button>

						<button class="btn" role="button" name="show_students" type="submit" value="show_students"><i class="fa fa-users" aria-hidden="true"></i> Total Students</button>
						<button class="btn" role="button" name="attendance_record" type="submit" value="attendance_record"><i class="fa fa-check-square-o" aria-hidden="true"></i> Attendance Record</button>
					</div>
				</center>
			</form>
		</div>
	</div>
	<div id="right_side">
		<div id="demo">


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

					echo "<center>
	<table style='width: 50%;
	 border-collapse: collapse;
	 padding left:40px id='stytable';
	 '>
							<thead>
							<tr id='stytr'>
								<td id='stytd' ><b>Roll No.</b></td>
								<td id='stytd'><b>Name</b></td>
								<td id='stytd'><b>Class</b></td>
								
								
							</tr>
							</thead>";
					while ($row = mysqli_fetch_assoc($query_run)) {
						echo "<tr id='stytr'>";
						echo "<td id='stytd'>" . $row['roll_no'] . "</td>";
						echo "<td id='stytd'>" . $row['name'] . "</td>";
						echo "<td id='stytd'>" . $row['class'] . "</td>";

						echo "</tr>";
					}
					echo "</table>";
					echo "</form>";
					echo "</center>";
				}
				?>


				<!--show attendance-->


				</style>
				<script type="text/javascript">
					function getatt(value) {
						if (value == true) {
							document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) - 1;
							document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) + 1;
						} else {
							document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) + 1;
							document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) - 1;
						}
					}
				</script>

				<?php
				if (isset($_POST['show_attendance'])) {
					$n = '0';
					include "att.php";
				?>
					<tr>
						<td>
							<form action="getattendance.php" method="post">
								<table width="180px" align="left" style="">
									<tr>
										<td> Select date : <br />
											<?php
											$dt = getdate();
											$day = $dt["mday"];
											$month = date("m");
											$year = $dt["year"];

											echo "<select name='cdate'>";
											for ($a = 1; $a <= 31; $a++) {
												if ($day == $a)
													echo "<option value='$a' selected='selected'>$a</option>";
												else
													echo "<option value='$a' >$a</option>";
											}
											echo "</select><select name='cmonth'>";
											for ($a = 1; $a <= 12; $a++) {
												if ($month == $a)
													echo "<option value='$a' selected='selected'>$a</option>";
												else
													echo "<option value='$a' >$a</option>";
											}
											echo "</select><select name='cyear'>";
											for ($a = 2010; $a <= $year; $a++) {
												if ($year == $a)
													echo "<option value='$a' selected='selected'>$a</option>";
												else
													echo "<option value='$a' >$a</option>";
											}
											echo "</select>";
											?>
										</td>
									</tr>
								</table>

								<table width="400" border="2" align="left" bordercolor="#7393B3" bgcolor="#C7B6B1" style="margin-left:20px;">
									<tr>
										<td colspan="3" bgcolor="#7393B3">
											<div align="center"><strong><span class="style2"> Attendance</span></strong></div>
										</td>
									</tr>
									<tr bgcolor="#4682B4">
										<td width="114"><span class="style7">Roll no</span></td>
										<td width="152"><span class="style7">Name</span></td>
										<td width="110"><span class="style7">Present</span></td>
									</tr>
									<?php
									include "att.php";
									extract($_POST);
									$query = "select *from `students` order by `s_no`";
									$s = 0;
									$result = mysqli_query($con, $query) or die("select error");
									while ($rec = mysqli_fetch_array($result)) {
										$s = $s + 1;
										echo ' <tr>
							  <td width="114">' . $rec["roll_no"] . '</td>
							  <td width="152">' . $rec["name"] . '</td>
							  <td width="110"><input type=checkbox name=' . $rec["s_no"] . ' onclick="getatt(this.checked);"/></td>
							</tr>';
									}
									?>
									<tr>
										<td colspan="3">
											<div align="center">
												<input type="submit" value="Get Attendance" name="btnsubmit" />
												&nbsp;&nbsp;
											</div>
										</td>
									</tr>
								</table>
							</form>

							<table width="100px" align="right" style="margin-right:30px">
								<tr>
									<td> Total Absent : <input type="text" id="txtAbsent" value="<?php print $s; ?>" size="10" disabled="disabled" /></td>
								</tr>
								<tr>
									<td> Total Present : <input type="text" id="txtPresent" value="0" size="10" disabled="disabled" /></td>
								</tr>
								<tr>
									<td> Total Student : <input type="text" id="txtStudent" value="<?php print $s; ?>" size="10" disabled="disabled" /></td>
								</tr>
							</table>

						</td>
					</tr>
					</table>

				<?php
				}
				?>


				<!--Atttendance Record-->
				<?php
				if (isset($_POST['attendance_record'])) {

					$n = '0';
					include "att.php";
				?>

					<tr>
						<td>
							<div align="center">
								<form action="" method="post">
									<table width="606" border="2" align="center" bordercolor="#7393B3" bgcolor="#7393B3">
										<tr>
											<td colspan="3" align="center">
												<h3>Search Roll No Wise Records Here</h3>
											</td>
										</tr>
										<tr>
											<td width="308" bgcolor="4682B4">
												<div align="center"><strong><span class="style2">Enter the Roll no</span></strong></div>
											</td>
											<td width="144" bgcolor="4682B4"><span class="style6">
													<input type="text" name="rno" />
												</span></td>
											<td width="130" bgcolor="4682B4"><input type="submit" value="View Information" name="btnsubmit" /></td>
										</tr>
									</table>
								</form>
							</div>
						</td>
					</tr>
				<?php
					if (isset($_POST["btnsubmit"])) {
						include "att.php";
						extract($_POST);
						$query = "select * from `students` where roll_no = " . $rno . " limit 1";

						$result = mysqli_query($con, $query) or die("select error error");
						while ($rec = mysqli_fetch_array($result)) {
							echo '<tr><td colspan="2"><table width="400" border="2" align="center" bordercolor="#7393B3"" bgcolor="#7393B3"">
				<tr>
				  <td width="160" bgcolor="#7393B3""><span class="style2">Roll No</span></td>
				  <td width="160" bgcolor="#7393B3""><span class="style2">Name</span></td>';
							$query1 = "select * from `attendance` where `s_no` = " . $rec["s_no"] . " order by date";
							$result1 = mysqli_query($con, $query1) or die("select error error");
							while ($rec1 = mysqli_fetch_array($result1)) {
								echo '<td bgcolor="#9999CC" class=style2>' . $rec1["date"] . '</td>';
							}
							echo '</tr>
				<tr>
				  <td width="222"><span class="style6">' . $rec["roll_no"] . '</span></td>
				  <td width="222"><span class="style6">' . $rec["name"] . '</span></td>';
							$query1 = "select *from `attendance` where `s_no` = " . $rec["s_no"] . " order by date";
							$result1 = mysqli_query($con, $query1) or die("select error error");
							while ($rec1 = mysqli_fetch_array($result1)) {
								echo '<td>';
								if ($rec1["attendance"] == 0)
									echo "Absent";
								else
									echo "Present";
								echo '</td>';
							}

							echo '
				</tr>
								
			  </table></td></tr>';
						}
					} else {
						include "att.php";
						extract($_POST);
						$query = "select * from `students` ";

						$result = mysqli_query($con, $query) or die("select error error");
						while ($rec = mysqli_fetch_array($result)) {
							echo '<tr><td colspan="2"><table width="90%" border="2" align="center" bordercolor="#7393B3"" bgcolor="#C7B6B1">
				<tr>
				  <td width="160" bgcolor="#9999CC"><span class="style2">Roll No</span></td>
				  <td width="160" bgcolor="#9999CC"><span class="style2">Name</span></td>';
							$query1 = "select * from `attendance` where `s_no` = " . $rec["s_no"] . " order by date";
							$result1 = mysqli_query($con, $query1) or die("select error error");
							while ($rec1 = mysqli_fetch_array($result1)) {
								echo '<td bgcolor="#9999CC" class=style2>' . $rec1["date"] . '</td>';
							}
							echo '</tr>
				<tr>
				  <td width="222"><span class="style6">' . $rec["roll_no"] . '</span></td>
				  <td width="222"><span class="style6">' . $rec["name"] . '</span></td>';
							$query1 = "select *from `attendance` where `s_no` = " . $rec["s_no"] . " order by date";
							$result1 = mysqli_query($con, $query1) or die("select error error");
							while ($rec1 = mysqli_fetch_array($result1)) {
								echo '<td>';
								if ($rec1["attendance"] == 0)
									echo "Absent";
								else
									echo "Present";
								echo '</td>';
							}

							echo '
				</tr>
								
			  </table></td></tr>';
						}
					}
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