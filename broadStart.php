<?php

    
    session_start();
    
    $userId=$_SESSION["userId"];
    $broadName=$_POST["broadName"];
    $broadInfo=$_POST["broadInfo"];
    $category=$_POST["category"];
    $date = date("Y-m-d H:i:s");

 
   

    $con = mysqli_connect("localhost","root","tjwjd4921!","broad");
    $sql = "insert into broadcast(userId,broadName,broadInfo,category,date)";
    $sql .="values ('$userId','$broadName','$broadInfo','$category','$date')";
    $result = mysqli_query($con,$sql);

    echo"
        <script>
            alert(\"방송을 시작합니다\");
            location.href = \"test.php\";
        </script>
    ";
?>
