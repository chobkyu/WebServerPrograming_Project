<?php

    session_start();
    $userId = $_SESSION['userId'];
    $id = $_GET['userId'];

    if($id != $userId){
        echo "
            <script>
                alert('권한이 없습니다');
                return false;
            </script>

        ";
    }

    //방송한 시간 구하기
    $seq = $_GET["seq"];
    $dateEnd = date("Y-m-d H:i:s");
    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
    $sql = "select * from broadCast where seq=$seq";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $dateStart = $row['time'];
    $date = date_diff($dateStart, $dateEnd);

    $sql = "select * from member where UserId='$userId'";
    $result1 = mysqli_query($con,$sql);
    $row= mysqli_fetch_array($result1);
    $orignDate = $row['RunTime'];

    $orignDate = $orignDate + $date;

    $sql1 = "update member set RunTime =  $orignDate where UserId= '$id'";
    mysqli_query($con, $sql1);
    
    //채팅지우기
    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
    $sql = "delete from tableforchat where seq=$seq";
    mysqli_query($con, $sql);
    
    
    
    
    
    
    
    //추천수 합치기
    
    
    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
	$sql = "select * from broadCast where seq= $seq";
	$result = mysqli_query($con, $sql); 
	$row = mysqli_fetch_array($result);
	$recommend = $row['recommend'];
    
    
    $sql1 = "select * from member where UserId= '$id'";
    $result1 = mysqli_query($con, $sql1);
    $row = mysqli_fetch_array($result1);
    $memberRecommend = $row['recommend'];
    $memberRecommend = $memberRecommend + $recommend;
   
    $sql1 = "update member set recommend =  $memberRecommend where UserId= '$id'";
    mysqli_query($con, $sql1);
     //방송 데이터 삭제
    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
    $sql = "delete from broadCast where seq = $seq";
    $result = mysqli_query($con, $sql);
   
    echo "
        <script>
            location.href = 'index.php';
        </script>
    ";
?>