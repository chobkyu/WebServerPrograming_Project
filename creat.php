<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>    
    <section class="login-form">
        <h1></h1>
        <div class="bar_logo">
            <a href="">Creat Account</a>
        </div>
        <form name="member_form" method="post" action="member_insert.php"> 
            <div class="int-area">
                <input type="text" name="id" id="forgot_id"
                autocomplete="off" required>
                <label for="forgot_id">ID</label>
            </div>
    
            <div class="int-area">
                <input type="password" name="pw" id="forgot_pw"
                autocomplete="off" required>
                <label for="forgot_pw">PASSWORD</label>
            </div>


            <div class="int-area">
                <input type="text" name="name" id="forgot_id"
                autocomplete="off" required>
                <label for="forgot_id">NAME</label>
            </div>


            <div class="int-area">
                <input type="text" name="email" id="forgot_pw"
                autocomplete="off" required>
                <label for="forgot_pw">Email</label>
            </div>


            <div class="int-area">
                <input type="text" name="answer" id="forgot_pw"
                autocomplete="off" required>
                <label id="creat_answer" type="text" onclick='change()'>ANSWER</label>
            </div>

            
           <div class="btn-area">
               <button type="submit" onclick="location.href='test.php'">Sign in</button>
            
           </div>
        </form>
    </section>

        <script> 
          
          function change() {
              const ans= document.getElementById('creat_answer');
              ans.innerText = '당신이 가장 좋아하는 차량은?'
          }
            
        
               </script>


</body>
</html>