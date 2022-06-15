<?php

    session_start();
    
    $userId=$_SESSION["userId"];
    $broadName=$_POST["broadName"];
    $broadInfo=$_POST["broadInfo"];
    $category=$_POST["category"];
    $date = date("Y-m-d H:i:s");

 


    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
    $sql = "insert into broadCast(userId,name,date,category,broadInfo,recommend)";
    $sql .="values ('$userId','$broadName','$date','$category','$broadInfo',0)";
    mysqli_query($con,$sql);
    

    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
    $sql1 = "select * from broadCast where userId = '$userId' and name =  '$broadName'";
    $result1 = mysqli_query($con, $sql1);
    $row = mysqli_fetch_array($result1);
    $seq = $row["seq"];
    mysqli_close($con);
    echo"
        <script>
            alert(\"$seq\");
            alert(\"방송을 시작합니다\");
            location.href = \"test.php?userId=$userId&broadName=$broadName&seq=$seq\";
        </script>
    ";
?>
