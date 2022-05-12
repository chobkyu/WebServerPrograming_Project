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
<body>
   
    <section class="login-form">
    <h1></h1>
    <div class="bar_logo">
        <a href="index.html">WebServerProject</a>
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
           <button type="submit">LOGIN</button>
       </div>
    </form>

    <div class="caption">
        <a href="creat.php">Create Account</a>
    </div>

    <div class="caption">
        <a href="forgot.html">Forgot Password?</a>
    </div>
    </section>
    <script> 
 let id = document.querySelector('#id')
        let pw = document.querySelector('#pw')
        let btn = document.querySelector('#btn')

        btn.addEventListener('click', () => {
            if(id.value == "") {
                label = id.nextElementSibling
                label.classList.add('warning')
                setTimeout(() => {
                    label.classList.remove('warning')
                }, 1500)
            } else if(pw.value == "") {
                label = pw.nextElementSibling
                label.classList.add('warning')
                setTimeout(() => {
                    label.classList.remove('warning')
                }, 1500)
            }
        })
        
    </script>
</body>
</html>