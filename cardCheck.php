<?php
    session_start();
    $userId = $_SESSION["userId"];

    $cardNum = $_POST['cardNum'];
    $cardPw = $_POST['cardPw'];
    $name = $_POST['name'];

    //카드사 데이터베이스에서 일치하는지
    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "cardComp");
    $sql = "select * from card where cardNum='$cardNum' && cardPw='$cardPw' && cardUser='$name'";
    $result = mysqli_query($con, $sql);
    $num_record = mysqli_num_rows($result);

    if(!$cardNum){
        echo(" 
            <script> 
            window.alert('카드 번호를 입력하세요') 
            history.go(-1) 
            </script>
        ");
        exit;
    }
    if(!$cardPw){
        echo(" 
            <script> 
            window.alert('카드 비밀번호를 입력하세요') 
            history.go(-1) 
            </script>
        ");
        exit;
    }
    if(!$name){
        echo(" 
            <script> 
            window.alert('이름을 입력하세요') 
            history.go(-1) 
            </script>
        ");
        exit;
    }
    if(!$num_record){
        echo(" 
            <script> 
            window.alert('정보가 일치하지 않습니다') 
            history.go(-1) 
            </script>
        ");
        exit;
    }
    else{//입력된 정보와 카드사 정보가 일치 한다면
        $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
        $sql = "select * from card where cardNum='$cardNum'";
        $result = mysqli_query($con, $sql);
        $num_record = mysqli_num_rows($result);
        if($num_record){
            echo(" 
            <script> 
            window.alert('이미 등록된 카드입니다') 
            history.go(-2) 
            </script>
        ");
        exit;
        }else{
            $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
            $sql = "insert into card (cardNum, cardUser, cardPw, userId) values('$cardNum', '$name', '$cardPw', '$userId')";
            $result = mysqli_query($con, $sql);
            echo(" 
            <script> 
            window.alert('등록되었습니다') 
            history.go(-2) 
            </script>
        ");
        exit;
        }
    }
?>