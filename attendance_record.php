<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "sms");
$query = "update students set name='$_POST[name]";
$query_run = mysqli_query($connection, $query);

?>
<script type="text/javascript">
    alert("Attendance added successfully.");
    window.location.href = "admin_dashboard.php";
</script>