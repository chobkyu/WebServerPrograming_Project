<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css">
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<?php
    session_start( );

    
?>
<script>
    var userSession = "<?= $_SESSION["userId"] ?>";


    if(userSession != ""){  
        alert("되었습니다");
        history.go(-1);
    }
    function login(){
        console.log("log in!!");
        var userId = document.getElementById("id").value;
        var userPw = document.getElementById("pw").value;

        console.log(userId);
        console.log(userPW);

        if(userId=""){
            alret("아이디를 입력해주세요");
            return false;
        }
        if(userPw=""){
            alret("비밀번호를 입력해주세요");
            return false;
        }
        
        alret("로그인이 완료되었습니다.");
        
    }    
</script>

<body>
   
    <section class="login-form">
    <h1></h1>
    <div class="bar_logo">
        <a href="index.php">WebServerProject</a>
    </div>
    <form name="member_form" method="post" action="loginSite.php"> 
        <div class="int-area">
            <input type="text" name="id" id="id"
            autocomplete="off" required>
            <label for="id">USER NAME</label>
        </div>

        <div class="int-area">
            <input type="password" name="pw" id="pw"
            autocomplete="off" required>
            <label for="pw">PASSWORD</label>
        </div>
        
       <div class="btn-area">
           <button type="submit" onclick="login()">LOGIN</button>
       </div>
    </form>

    <div class="caption">
        <a href="creat.php">Create Account</a>
    </div>

    <div class="caption">
        <a href="forgot.php">Forgot Password?</a>
    </div>
    </section>

</body>
</html>