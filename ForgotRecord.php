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
<?php
    $option = $_GET["option"];
    
    echo("
        <script>
            alert($option+\"   dsfasdf\");
        </script>
    "
    );
?>
<body>
    
    <section class="login-form">
        <h1>  </h1>
        <div class="bar_logo">
            <a href="login.html">Your PassWord</a>
        </div>
        <form action="">
            <div class="int-area">
                <input type="text" name="forgot_id" id="forgot_id"
                autocomplete="off" value="<?= $option?>" required>
               
            </div>
           
                        
           <div class="btn-area">
               <button ><a href="login.php">Sign in</a></button>
            
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