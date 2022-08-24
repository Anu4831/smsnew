<?php
$cid = $_POST['cid'];
$cname = $_POST['cname'];
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "sms");
$query = "INSERT INTO courses
               (`id`, `course`, `date_created`)
               VALUES ('" . $cid . "','" . $cname . "',CURRENT_TIMESTAMP)";

$query_run = mysqli_query($connection, $query) or die('<script type="text/javascript">
alert("Course ID is already Registered,Please use another ID");
window.location = "admin_dashboard.php";
</script>');
?>
<script type="text/javascript">
    alert("Courses registered  successfully.");
    window.location.href = "admin_dashboard.php";
</script>