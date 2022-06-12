<?php
    session_start();
    $userId = $_SESSION['userId'];
    $cost = $_POST['textInput'];

    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
    $sql = "select * from member where UserId='$userId'";
    $result = mysqli_query($con, $sql);   
    $num_record = mysqli_num_rows($result);
    $memberBoard=mysqli_fetch_array($result);
    $balloon=$memberBoard['Balloon'];
    $DonationBalloon = $memberBoard['DonationBalloon'];

    if(!$cost){
        echo("
            <script> 
            window.alert('개수를 입력하세요') 
            history.go(-1) 
            </script>
        ");
        exit;
    }
    if($cost>$balloon){
        echo(" 
            <script> 
            window.alert('별풍선이 부족합니다. 충전해주세요') 
            history.go(-1) 
            </script>
        ");
        exit;
    }
    if($balloon>=$cost){
        $rballoon = $balloon-$cost;
        $sql = "update member set Balloon='$rballoon' where userId='$userId'";
        $result = mysqli_query($con, $sql);
        $aDonationBalloon = $DonationBalloon + $cost;
        $sql = "update member set DonationBalloon='$aDonationBalloon' where userId='$userId'";
        $result = mysqli_query($con, $sql);

        echo(" 
            <script> 
                location.href='paymentConfirm.php'
            </script>
        ");

    }
?>