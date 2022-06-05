<?php
    $cardNum = $_POST['cardNum'];
    $cardPw = $_POST['cardPw'];
    $cost = $_POST['textInput'];

    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "cxzaq159357!", "project");
    $sql = "select * from card where cardNum='$cardNum' && cardPw='$cardPw'";
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
    if(!$cost){
        echo(" 
            <script> 
            window.alert('금액을 입력하세요') 
            history.go(-1) 
            </script>
        ");
        exit;
    }

    if($num_record){
        $cardBoard=mysqli_fetch_array($result);
        $money = $cardBoard['cardMoney'];

        if($cost>$money){
            echo(" 
            <script> 
            window.alert('결제 실패 : 잔액 부족')
            history.go(-1) 
            </script>
        ");
        exit;
        }else{
            $remainMoney = $money-$cost;
            $sql = "update card set cardMoney='$remainMoney' where cardNum='$cardNum'";
            $result = mysqli_query($con, $sql);
            echo("
                <script>
                location.href = 'paymentConfirm.php';
                </script>
            ");
        }
    }else{
        echo(" 
            <script> 
            window.alert('정보가 일치하지 않습니다') 
            history.go(-1) 
            </script>
        ");
        exit;
    }

?>