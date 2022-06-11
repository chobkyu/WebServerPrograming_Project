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

<script>
    function create(){
        console.log("sign up");

        var id = document.getElementById("create_id").value;
        var pw = document.getElementById("create_pw").value;
        var name = document.getElementById("create_name").value;
        var email = document.getElementById("create_email").value;
        var answer = document.getElementById("create_answer").value;
       

        if(id==""){
            alert("아이디를 입력해주세요");
            return false;

        }

        if(pw==""){
            alert("비밀번호를 입력해주세요");
            return false;
        }

        if(name==""){
            alert("이름을 입력해주세요");
            return false;
        }

        if(email==""){
            alert("이메일을 입력해주세요");
            return false;
        }

       
        if(answer==""){
            alert("답변을 입력해주세요");
            return false;
        }

        alert("다시 로그인 해주세요");
        location.href='login.php'
    }
</script>
<body>    
    <section class="login-form">
        <h1></h1>
        <div class="bar_logo">
            <a href="">Creat Account</a>
        </div>
        <form name="member_form" method="post" action="member_insert.php"> 
            <div class="int-area">
                <input type="text" name="id" id="create_id"
                autocomplete="off" required>
                <label for="forgot_id">ID</label>
            </div>
    
            <div class="int-area">
                <input type="password" name="pw" id="create_pw"
                autocomplete="off" required>
                <label for="forgot_pw">PASSWORD</label>
            </div>


            <div class="int-area">
                <input type="text" name="name" id="create_name"
                autocomplete="off" required>
                <label for="forgot_id">NAME</label>
            </div>


            <div class="int-area">
                <input type="text" name="email" id="create_email"
                autocomplete="off" required>
                <label for="forgot_pw">Email</label>
            </div>

        
            <div class="int-area">
                <input type="text" name="answer" id="create_answer"
                autocomplete="off" required>
                <label id="creat_answer" type="text" onclick='change()'>ANSWER</label>
            </div>

            
           <div class="btn-area">
               <button type="submit" onclick="create()">Sign in</button>
            
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