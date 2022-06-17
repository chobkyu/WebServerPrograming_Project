<?php
    session_start();
    $userId = $_SESSION['userId'];
    $cost = $_POST['textInput'];
    $seq = $_SESSION['seq'];

    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
    $sql = "select * from member where UserId='$userId'";
    $result = mysqli_query($con, $sql);   
    $num_record = mysqli_num_rows($result);
    $memberBoard=mysqli_fetch_array($result);
    $balloon=$memberBoard['Balloon'];
    $DonationBalloon = $memberBoard['DonationBalloon'];
    $DonatedBalloon = $memberBoard['DonatedBalloon'];

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
        
        $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
        $sql = "select * from broadCast where seq=$seq";
        $result = mysqli_query($con, $sql);
        $castBoard = mysqli_fetch_array($result);
        $caster = $castBoard['userId'];//방송 중인 사람의 아이디

        //도네 받은 별풍 추가
        $aDonatedBalloon = $DonatedBalloon + $cost;
        $sql = "update member set DonatedBalloon='$aDonatedBalloon' where userId='$caster'";
        $result = mysqli_query($con, $sql); 
        
        //방송인 별풍 추가
        $aballoon = $balloon + $cost;
        $sql = "update member set Balloon='$aballoon' where userId='$caster'";
        $result = mysqli_query($con, $sql);

        //채팅창에 띄우기
        date_default_timezone_set('Asia/Seoul');
        $Date = date('Y년 m월 d일 H시 i분', time());
        $sql = "insert into tableforchat (chatuser, chattext, chattime, seq) values('$userId','(1771249) \n$cost 개!!','$Date','$seq')";
        $result = mysqli_query($con, $sql);


        echo(" 
            <script> 
                location.href='paymentConfirm.php'
            </script>
        ");
    }
?>