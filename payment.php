<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <link rel="stylesheet" href="payment.css">
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<?php
    session_start();
    $userId = $_SESSION["userId"];
    $seq = $_SESSION['seq'];
?>
<script>
    function regist(){
        location.href="registCard.php";
    }
</script>
<body>
    <section class="login-form">
        <h1></h1>
        <div class="bar_logo">
            <a>결제 및 충전</a>
        </div>
        <form name="member_form" method="post" action="paymentCheck.php"> 
            <div class="int-area">
                <h3 type="text" name="id" id="id"
                autocomplete="off" required><?= $userId?>님 반갑습니다</h3>
            </div>
            <div class="int-area">
                <h3 type="text" name="cost" id="cost"
                autocomplete="off" required>카드 비밀번호</h3>
                <input type="text" name="cardPw" id="cardPw"/>
            </div>
            <div class="int-area">
                <h3 type="text" name="cost" id="cost"
                autocomplete="off" required>결제 금액</h3>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" name='textInput' id='textInput'/><span id="info">원</span>
                <select name='selectOption' id='selectOption'>
                    <option value="">직접 입력</option>
                    <option value="100">100</option>
                    <option value="500">500</option>
                    <option value="1000">1000</option>
                    <option value="5000">5000</option>
                    <option value="10000">10000</option>
                </select>
            </div>
           <div class="btn-area">
               <button type="submit">결제 및 충전</button>
           </div>
        </form>
        <div class="btn-area">
            <button id="charge" onclick="regist()">카드 등록</button>
        </div>
        </section>
        
</body>
<script>//option 값이 input 창으로 들어가게
    $(function(){
        var idval = $('#textInput');
        $('#selectOption').change(function(){
            var element = $(this).find('option:selected');
            var myTag = element.attr('value');
            idval.val(myTag);
        });
    });
</script>
</html>
