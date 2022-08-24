<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "sms");
$query = "update marks set english=$_POST[english],
nepali=$_POST[nepali],science=$_POST[science],math=$_POST[math],
social=$_POST[social],computer=$_POST[computer] where s_no=$_POST[s_no]";
$query_run = mysqli_query($connection, $query);
?>
<script type="text/javascript">
    alert("Marks edited successfully.");
    window.location.href = "admin_dashboard.php";
</script>