<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>card regist</title>
    <link rel="stylesheet" href="payment.css">
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<?php
    session_start();
    $userId = $_SESSION["userId"];
    $seq = $_SESSION['seq'];
?>
<body>
    <section class="login-form">
        <h1></h1>
        <div class="bar_logo">
            <a>카드 등록</a>
        </div>
        <form name="member_form" method="post" action="cardCheck.php"> 
            <div class="int-area">
                <h3 type="text" name="id" id="id"
                autocomplete="off" required><?= $userId?>님 반갑습니다</h3>
            </div>
            <div class="int-area">
                <h3 type="text" name="cost" id="cost"
                autocomplete="off" required>카드 번호</h3>
                <input type="text" name="cardNum" id="cardNum" placeholder="- 없이 입력"/>
            </div>
            <div class="int-area">
                <h3 type="text" name="cost" id="cost"
                autocomplete="off" required>카드 비밀번호</h3>
                <input type="password" name="cardPw" id="cardPw"/>
            </div>
            <div class="int-area">
                <h3 type="text" name="cost" id="cost"
                autocomplete="off" required>이름</h3>
                <input type="text" name="name" id="name"/>
            </div>
           <div class="btn-area">
               <button type="submit">등록</button>
           </div>
        </form>
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
