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
    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");//공백란에 디비 비번 입력 
    
    $sql ="select userId from member order by recommend desc limit 3";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
?>

<body>
   
    <section class="login-form">
    <h1></h1>
    <div class="bar_logo">
        <a href="index.html">Ranking</a>
    </div>
   
        <div class="int-area">
            <input type="text" name="id" id="id"
            autocomplete="off" value= "<?=$row[0]?>">
            <label for="id">1st</label>
        </div>

        <div class="int-area">
            <input type="text" name="pw" id="pw"
            autocomplete="off" value = "<?=$row[1]?>">
            <label for="pw">2nd</label>
        </div>

        <div class="int-area">
            <input type="text" name="pw" id="pw"
            autocomplete="off" value = "<?=$row[2]?>">
            <label for="pw">3rd</label>
        </div>
        
       <div class="btn-area">
           <button type="submit" onclick="location.href='index.php'">Back</button>
       </div>
    

   

    
    </section>

</body>
</html>