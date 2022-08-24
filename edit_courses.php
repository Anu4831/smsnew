<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "sms");
$query = "update courses set course='$_POST[course]',id=$_POST[id] where id=$_POST[id]";
$query_run = mysqli_query($connection, $query);

?>
<script type="text/javascript">
    alert("Details Edited succesfully");
    window.location.href = "admin_dashboard.php";
</script>