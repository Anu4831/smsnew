<!DOCTYPE html>
<html lang="en">

<head>

    <title>Student Login </title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>
    <div id='stars2'></div>
    <div class="container">
        <img src="image/login.jpg" />
        <h2>Student Login Page</h2><br>
        <form action="" method="post">
            <div class="form-input">
                <input type="text" name="email" placeholder="email" required />
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="password" required />
            </div>
            <input type="submit" name="submit" value="LOGIN" class="btn-login" />
        </form>
    </div>
    <!--
    <center><br><br>
    <h3> Student Login Page</h3> <br>
    <form action="" method="POST">
        Email:<input type="text" name="email" required ><br><br>
        Password:<input type="password" name="password" required ><br><br>
        <input type="submit" name="submit" >
    </form><br>
    -->
    <div class="outcome">
        <?php
        session_start();
        if (isset($_POST['submit'])) {
            $conn = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($conn, "sms");

            // $query = "select * from login where email = '$_POST[email]'";
            $query = "select * from students";
            $query_run = mysqli_query($conn, $query);
            $i = 1;
            while ($row = mysqli_fetch_assoc($query_run)) {
                if ($row['email'] == $_POST['email'] && $row['password'] == $_POST['password']) {
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                    header("Location: student_dashboard.php");
                } else {
                    if ($i == 1) {
                        echo "Email and Password doesnt match";
                        $i = 0;
                    }
                }
            }
        }
        ?>
    </div>


    </center>
    <style>
        html {
            height: 100%;
            background: radial-gradient(ellipse at bottom, #1b2735 0%, #090a0f 100%);
            overflow: hidden;
        }

        *body {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;

        }

        #stars2 {
            width: 2px;
            height: 2px;
            background: transparent;
            box-shadow: 1752px 443px #FFF, 1061px 1151px #FFF, 1923px 430px #FFF, 1455px 427px #FFF, 640px 396px #FFF, 139px 205px #FFF, 1911px 1824px #FFF, 22px 1163px #FFF, 914px 781px #FFF, 1286px 753px #FFF, 1907px 813px #FFF, 163px 1937px #FFF, 1665px 1048px #FFF, 1101px 325px #FFF, 1761px 379px #FFF, 849px 1301px #FFF, 1633px 1386px #FFF, 978px 1847px #FFF, 483px 1768px #FFF, 561px 1174px #FFF, 1763px 586px #FFF, 1481px 1551px #FFF, 350px 791px #FFF, 715px 761px #FFF, 477px 1757px #FFF, 832px 171px #FFF, 1459px 279px #FFF, 294px 1569px #FFF, 269px 610px #FFF, 1669px 1470px #FFF, 1488px 674px #FFF, 1929px 1575px #FFF, 1250px 870px #FFF, 382px 1290px #FFF, 810px 1627px #FFF, 1919px 1289px #FFF, 1486px 1717px #FFF, 423px 53px #FFF, 208px 600px #FFF, 1649px 1603px #FFF, 53px 1933px #FFF, 882px 624px #FFF, 1744px 227px #FFF, 1407px 942px #FFF, 1084px 375px #FFF, 1342px 271px #FFF, 765px 1012px #FFF, 1717px 1869px #FFF, 782px 176px #FFF, 659px 573px #FFF, 1140px 1958px #FFF, 1671px 301px #FFF, 560px 1881px #FFF, 1925px 905px #FFF, 1408px 1482px #FFF, 1224px 1590px #FFF, 1441px 1655px #FFF, 821px 187px #FFF, 625px 153px #FFF, 1702px 1664px #FFF, 516px 275px #FFF, 775px 1514px #FFF, 1357px 659px #FFF, 1072px 1529px #FFF, 1430px 419px #FFF, 608px 1827px #FFF, 683px 471px #FFF, 721px 925px #FFF, 1899px 335px #FFF, 1076px 398px #FFF, 547px 648px #FFF, 564px 285px #FFF, 829px 1128px #FFF, 1917px 1315px #FFF, 310px 1834px #FFF, 3px 914px #FFF, 1786px 1585px #FFF, 172px 1573px #FFF, 465px 497px #FFF, 1721px 29px #FFF, 1129px 1281px #FFF, 1768px 330px #FFF, 1210px 1865px #FFF, 924px 1545px #FFF, 29px 370px #FFF, 752px 1512px #FFF, 227px 1461px #FFF, 1639px 431px #FFF, 1984px 544px #FFF, 1141px 1440px #FFF, 1580px 856px #FFF, 614px 1494px #FFF, 160px 1933px #FFF, 376px 520px #FFF, 1971px 778px #FFF, 339px 53px #FFF, 1611px 1770px #FFF, 61px 887px #FFF, 1373px 1639px #FFF, 1348px 743px #FFF, 414px 1639px #FFF, 1863px 1191px #FFF, 751px 1791px #FFF, 545px 1989px #FFF, 63px 535px #FFF, 1184px 937px #FFF, 326px 1027px #FFF, 519px 225px #FFF, 69px 1932px #FFF, 1500px 113px #FFF, 1297px 1710px #FFF, 98px 10px #FFF, 1619px 1398px #FFF, 135px 568px #FFF, 1014px 290px #FFF, 393px 1659px #FFF, 1747px 1079px #FFF, 1883px 1399px #FFF, 310px 1743px #FFF, 1670px 8px #FFF, 887px 1989px #FFF, 936px 920px #FFF, 1791px 997px #FFF, 1370px 879px #FFF, 508px 1471px #FFF, 1758px 1504px #FFF, 1484px 789px #FFF, 1576px 1374px #FFF, 51px 1557px #FFF, 693px 182px #FFF, 673px 1964px #FFF, 761px 1089px #FFF, 1210px 916px #FFF, 1595px 1860px #FFF, 1594px 526px #FFF, 66px 262px #FFF, 1112px 739px #FFF, 893px 1217px #FFF, 327px 1218px #FFF, 681px 67px #FFF, 1598px 746px #FFF, 174px 887px #FFF, 278px 1555px #FFF, 1826px 353px #FFF, 1193px 1858px #FFF, 830px 1585px #FFF, 395px 78px #FFF, 163px 1234px #FFF, 1978px 212px #FFF, 1984px 1116px #FFF, 1735px 1123px #FFF, 1411px 976px #FFF, 812px 1404px #FFF, 980px 518px #FFF, 65px 704px #FFF, 108px 1030px #FFF, 86px 175px #FFF, 939px 1352px #FFF, 999px 1979px #FFF, 1097px 619px #FFF, 1079px 370px #FFF, 213px 1984px #FFF, 194px 154px #FFF, 1599px 77px #FFF, 697px 480px #FFF, 187px 545px #FFF, 1303px 1761px #FFF, 1465px 1601px #FFF, 564px 14px #FFF, 672px 1111px #FFF, 1489px 359px #FFF, 454px 1368px #FFF, 300px 855px #FFF, 909px 169px #FFF, 736px 652px #FFF, 1513px 382px #FFF, 1175px 1471px #FFF, 1021px 900px #FFF, 1164px 412px #FFF, 465px 1211px #FFF, 313px 990px #FFF, 1687px 609px #FFF, 1441px 441px #FFF, 1095px 1325px #FFF, 4px 1178px #FFF, 1735px 784px #FFF, 1691px 1507px #FFF, 708px 1002px #FFF, 1337px 1234px #FFF, 85px 997px #FFF, 587px 1730px #FFF, 298px 230px #FFF, 111px 635px #FFF, 475px 1651px #FFF, 1218px 193px #FFF, 1389px 1830px #FFF, 842px 1173px #FFF, 476px 1490px #FFF, 349px 1271px #FFF, 1826px 1343px #FFF;
            animation: animStar 100s linear infinite;
        }

        #stars2:after {
            content: " ";
            position: absolute;
            top: 2000px;
            width: 2px;
            height: 2px;
            background: transparent;
            box-shadow: 1752px 443px #FFF, 1061px 1151px #FFF, 1923px 430px #FFF, 1455px 427px #FFF, 640px 396px #FFF, 139px 205px #FFF, 1911px 1824px #FFF, 22px 1163px #FFF, 914px 781px #FFF, 1286px 753px #FFF, 1907px 813px #FFF, 163px 1937px #FFF, 1665px 1048px #FFF, 1101px 325px #FFF, 1761px 379px #FFF, 849px 1301px #FFF, 1633px 1386px #FFF, 978px 1847px #FFF, 483px 1768px #FFF, 561px 1174px #FFF, 1763px 586px #FFF, 1481px 1551px #FFF, 350px 791px #FFF, 715px 761px #FFF, 477px 1757px #FFF, 832px 171px #FFF, 1459px 279px #FFF, 294px 1569px #FFF, 269px 610px #FFF, 1669px 1470px #FFF, 1488px 674px #FFF, 1929px 1575px #FFF, 1250px 870px #FFF, 382px 1290px #FFF, 810px 1627px #FFF, 1919px 1289px #FFF, 1486px 1717px #FFF, 423px 53px #FFF, 208px 600px #FFF, 1649px 1603px #FFF, 53px 1933px #FFF, 882px 624px #FFF, 1744px 227px #FFF, 1407px 942px #FFF, 1084px 375px #FFF, 1342px 271px #FFF, 765px 1012px #FFF, 1717px 1869px #FFF, 782px 176px #FFF, 659px 573px #FFF, 1140px 1958px #FFF, 1671px 301px #FFF, 560px 1881px #FFF, 1925px 905px #FFF, 1408px 1482px #FFF, 1224px 1590px #FFF, 1441px 1655px #FFF, 821px 187px #FFF, 625px 153px #FFF, 1702px 1664px #FFF, 516px 275px #FFF, 775px 1514px #FFF, 1357px 659px #FFF, 1072px 1529px #FFF, 1430px 419px #FFF, 608px 1827px #FFF, 683px 471px #FFF, 721px 925px #FFF, 1899px 335px #FFF, 1076px 398px #FFF, 547px 648px #FFF, 564px 285px #FFF, 829px 1128px #FFF, 1917px 1315px #FFF, 310px 1834px #FFF, 3px 914px #FFF, 1786px 1585px #FFF, 172px 1573px #FFF, 465px 497px #FFF, 1721px 29px #FFF, 1129px 1281px #FFF, 1768px 330px #FFF, 1210px 1865px #FFF, 924px 1545px #FFF, 29px 370px #FFF, 752px 1512px #FFF, 227px 1461px #FFF, 1639px 431px #FFF, 1984px 544px #FFF, 1141px 1440px #FFF, 1580px 856px #FFF, 614px 1494px #FFF, 160px 1933px #FFF, 376px 520px #FFF, 1971px 778px #FFF, 339px 53px #FFF, 1611px 1770px #FFF, 61px 887px #FFF, 1373px 1639px #FFF, 1348px 743px #FFF, 414px 1639px #FFF, 1863px 1191px #FFF, 751px 1791px #FFF, 545px 1989px #FFF, 63px 535px #FFF, 1184px 937px #FFF, 326px 1027px #FFF, 519px 225px #FFF, 69px 1932px #FFF, 1500px 113px #FFF, 1297px 1710px #FFF, 98px 10px #FFF, 1619px 1398px #FFF, 135px 568px #FFF, 1014px 290px #FFF, 393px 1659px #FFF, 1747px 1079px #FFF, 1883px 1399px #FFF, 310px 1743px #FFF, 1670px 8px #FFF, 887px 1989px #FFF, 936px 920px #FFF, 1791px 997px #FFF, 1370px 879px #FFF, 508px 1471px #FFF, 1758px 1504px #FFF, 1484px 789px #FFF, 1576px 1374px #FFF, 51px 1557px #FFF, 693px 182px #FFF, 673px 1964px #FFF, 761px 1089px #FFF, 1210px 916px #FFF, 1595px 1860px #FFF, 1594px 526px #FFF, 66px 262px #FFF, 1112px 739px #FFF, 893px 1217px #FFF, 327px 1218px #FFF, 681px 67px #FFF, 1598px 746px #FFF, 174px 887px #FFF, 278px 1555px #FFF, 1826px 353px #FFF, 1193px 1858px #FFF, 830px 1585px #FFF, 395px 78px #FFF, 163px 1234px #FFF, 1978px 212px #FFF, 1984px 1116px #FFF, 1735px 1123px #FFF, 1411px 976px #FFF, 812px 1404px #FFF, 980px 518px #FFF, 65px 704px #FFF, 108px 1030px #FFF, 86px 175px #FFF, 939px 1352px #FFF, 999px 1979px #FFF, 1097px 619px #FFF, 1079px 370px #FFF, 213px 1984px #FFF, 194px 154px #FFF, 1599px 77px #FFF, 697px 480px #FFF, 187px 545px #FFF, 1303px 1761px #FFF, 1465px 1601px #FFF, 564px 14px #FFF, 672px 1111px #FFF, 1489px 359px #FFF, 454px 1368px #FFF, 300px 855px #FFF, 909px 169px #FFF, 736px 652px #FFF, 1513px 382px #FFF, 1175px 1471px #FFF, 1021px 900px #FFF, 1164px 412px #FFF, 465px 1211px #FFF, 313px 990px #FFF, 1687px 609px #FFF, 1441px 441px #FFF, 1095px 1325px #FFF, 4px 1178px #FFF, 1735px 784px #FFF, 1691px 1507px #FFF, 708px 1002px #FFF, 1337px 1234px #FFF, 85px 997px #FFF, 587px 1730px #FFF, 298px 230px #FFF, 111px 635px #FFF, 475px 1651px #FFF, 1218px 193px #FFF, 1389px 1830px #FFF, 842px 1173px #FFF, 476px 1490px #FFF, 349px 1271px #FFF, 1826px 1343px #FFF;
        }

        .container {
            width: 20%;
            height: 25%;
            text-align: center;
            margin: 0 auto;
            background-color: rgba(220, 222, 244, 0.2);
            margin-top: 8%;

        }

        .container img {
            width: 70px;
            height: 70px;
            margin-top: -60px;
        }

        input[type="text"],
        input[type="password"] {
            margin-top: 10px;
            height: 25px;
            width: 180px;
            font-size: 14px;
            margin-bottom: 20px;
            background-color: #fff;
            padding-left: 40px;
        }

        .form-input::before {
            content: "\f007";
            font-family: "FontAwesome";
            padding-left: 10px;
            padding-top: 12px;
            position: absolute;
            font-size: 25px;
            color: #2980b9;
        }

        .form-input:nth-child(2)::before {
            content: "\f023";
        }

        .btn-login {
            padding: 10px 20px;
            border: none;
            background-color: #27ae60;
            color: #fff;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .outcome {
            padding: 10px 20px;
            margin-top: 4px;
            font-family: "FontAwesome";
            text-align: center;
            font-size: 18px;
            color: white;
            margin-left: auto;
            margin-right: auto;
            width: 20%;
            height: 2%;
            background: transparent;
        }
    </style>

</body>

</html>