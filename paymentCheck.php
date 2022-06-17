<?php
    session_start();
    $userId = $_SESSION['userId'];
    $cardPw = $_POST['cardPw'];
    $cost = $_POST['textInput'];
    $seq = $_SESSION['seq'];

    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
    $sql = "select * from card where userId='$userId'";
    $result = mysqli_query($con, $sql);
    $num_record = mysqli_num_rows($result);
    $cardBoard = mysqli_fetch_array($result);
    $cardNum = $cardBoard['cardNum'];
    $cardPwFboard = $cardBoard['cardPw'];
    
    if(!$cardPw){
        echo(" 
            <script> 
            window.alert('카드 비밀번호를 입력하세요') 
            history.go(-1) 
            </script>
        ");
        exit;
    }
    if(!$cost){
        echo(" 
            <script> 
            window.alert('금액을 입력하세요') 
            history.go(-1) 
            </script>
        ");
        exit;
    }
    if(!$num_record){
        echo(" 
        <script> 
        window.alert('등록된 카드가 없습니다. 카드를 등록하세요.') 
        history.go(-1) 
        </script>
        ");
    exit;
    }
    if($cardPwFboard != $cardPw){
        echo(" 
        <script> 
        window.alert('비밀번호가 일치하지 않습니다.') 
        history.go(-1) 
        </script>
        ");
    exit;
    }

    //카드사 금액 계산
    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "cardComp");
    $sql = "select * from card where cardNum='$cardNum'";
    $result = mysqli_query($con, $sql);
    $num_record = mysqli_num_rows($result);
    $EcardBoard = mysqli_fetch_array($result);
    $cardMoney = $EcardBoard['cardMoney'];

    if($cost>$cardMoney){
        echo(" 
        <script> 
        window.alert('결제 실패!. 카드 잔액 부족') 
        history.go(-1) 
        </script>
        ");
    exit;
    }
    if($cardMoney>=$cost){
        $remainMoney = $cardMoney - $cost;
        $sql = "update card set cardMoney='$remainMoney' where cardNum='$cardNum'";
        $result = mysqli_query($con, $sql);

        $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
        $sql = "select * from member where userId='$userId'";
        $result = mysqli_query($con, $sql);
        $num_record = mysqli_num_rows($result);
        $memberBoard = mysqli_fetch_array($result);
        $balloon = $memberBoard['Balloon'];
        $aballoon = $balloon+$cost;
        $sql = "update member set Balloon='$aballoon' where userId='$userId'";
        $result = mysqli_query($con, $sql);

        echo(" 
        <script> 
        window.alert('결제되었습니다!') 
        location.href='shootBalloon.php?seq=$seq'
        </script>
        ");
    }
?>