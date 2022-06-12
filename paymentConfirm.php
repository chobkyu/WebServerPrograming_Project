<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confrim</title>
    <link rel="stylesheet" href="payment.css">
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<script>
    function popClose(){
        window.opener = window.location.href; self.close();
    }
    setTimeout("popClose()", 3000);
</script>
<body>
    <section class="login-form">
        <h1></h1>
        <div class="bar_logo">
            <a>Confirm</a>
        </div>
        <form name="member_form" method="post" action="loginSite.php"> 
            <div class="int-area">
                <h3 type="text" name="id" id="id"
                autocomplete="off" required>감사합니다</h3>
            </div>
            <div class="int-area">
                <h3 type="text" name="confirm" id="confirm"
                autocomplete="off" required>후원이 성공적으로 완료되었습니다.</h3>
            </div>
            <div class="int-area">
                <h5 type="text" name="confirm" id="confirm"
                autocomplete="off" required>3초 후에 창이 자동으로 닫힙니다.</h5>
            </div>
        </form>
        </section>
</body>
</html>
