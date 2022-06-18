<!--채팅창에서 별풍쏘기 버튼 누르면 제일 처음 오는 페이지-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoot</title>
    <link rel="stylesheet" href="payment.css">
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<?php
    session_start();
    $userId = $_SESSION["userId"];
    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
    $sql = "select * from member where UserId='$userId'";
    $result = mysqli_query($con, $sql);   
    $num_record = mysqli_num_rows($result);
    $memberBoard=mysqli_fetch_array($result);
    $balloon=$memberBoard['Balloon'];
    $seq = $_GET['seq'];
    $_SESSION['seq'] = $seq;
?>
<script>
    function charge(){
        location.href='payment.php'
    }
</script>
<body>
    <section class="login-form">
        <h1></h1>
        <form name="member_form" method="post" action="shootCheck.php"> 
            <div class="int-area">
                <h3 type="text" name="info" id="info"
                autocomplete="off" required>ID : <?= $userId?> &nbsp;&nbsp;&nbsp;&nbsp;잔여별풍 : <?= $balloon?></h3>
            </div>
            <div class="int-area">
                <h3 type="text" name="cost" id="cost"
                autocomplete="off" required>별풍선</h3>
                <input type="text"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" name='textInput' id='textInput'/><span id="info">개</span>
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
               <button id="shoot" type="submit">쏘기</button>
           </div>
        </form>
            <div class="btn-area">
                <button id="charge" onclick="charge()">충전</button>
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

