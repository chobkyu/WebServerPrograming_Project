<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot</title>
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    
    <section class="login-form">
        <h1></h1>
        <div class="bar_logo">
            <a href="login.html">FORGOT</a>
        </div>
        <form name=forgotId method="post" action="forgotPw.php">
            <div class="int-area">
                <input type="text" name="forgot_id" id="forgot_id"
                autocomplete="off" required>
                <label for="forgot_id">NAME</label>
            </div>
            
            <div class="int-area">
                <input type="text" name="forgot_email" id="forgot_pw"
                autocomplete="off" required>
                <label id="forgot_email"type="text">Email</label>
            </div>

            <div class="int-area">
                <input type="text" name="forgot_answer" id="forgot_answer"
                autocomplete="off" required>
                <label id="forgot_answer" type="text" onclick='change()'>ANSWER</label>
            </div>

                        
           <div class="btn-area">
               <button type="submit">Sign in</button>
            
           </div>
        </form>
    </section>

        <script> 
            function change() {
              const ans= document.getElementById('forgot_answer');
              ans.innerText = '당신이 가장 좋아하는 차량은?'
          }
            
           
           
        </script>


</body>
</html>