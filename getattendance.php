


<?php
if (isset($_POST["btnsubmit"])) {
    include "att.php";

    $date = $_POST["cyear"] . "-" . $_POST["cmonth"] . "-" . $_POST["cdate"];

    $query = "select * from `students` ";
    $result = mysqli_query($con, $query) or die("select error");
    while ($rec = mysqli_fetch_array($result)) {
        $sno = $rec["s_no"];
        if (isset($_POST[$sno])) {
            $query1 = "INSERT INTO  `attendance`(`s_no` ,  `date` ,  `attendance`) VALUES('$sno','$date','1')";
        } else {
            $query1 = "INSERT INTO  `attendance`(`s_no` ,  `date` ,  `attendance`) VALUES('$sno','$date','0')";
        }
        mysqli_query($con, $query1) or die("insert error" . $sno);;
        print "<script>";
        print "alert('Attendance get successfully....');";
        print "self.location='teacher_dashboard.php';";
        print "</script>";
    }
} else {
    header("Location:teacher_dashboard.php");
}
?>

