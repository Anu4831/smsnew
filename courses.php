<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "sms");
$query = "insert into courses values($_POST[id],$_POST[course],
$_POST[date_created]
)";
$query_run = mysqli_query($connection, $query);
?>
<script type="text/javascript">
    alert("Courses registered  successfully.");
    window.location.href = "admin_dashboard.php";
</script>