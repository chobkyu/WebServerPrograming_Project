<?php
     
     $seq = $_GET["seq"];

     $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
     $sql = "delete from broadCast where seq = $seq";
     $result = mysqli_query($con, $sql);
    
     echo "
        <script>
            location.href = 'index.php';
        </script>
     ";
?>