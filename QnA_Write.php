<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="건호" content="width=device-width, initial-scale=1.0">
    <title>Free_Write</title>
    <link rel="stylesheet" href="Free_Write.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Electrolize&display=swap" rel="stylesheet">
<script
     src="https://kit.fontawesome.com/af4e1eff79.js"
     crossorigin="anonymous"></script>

</head>

<?php
    session_start();
    $id = $_SESSION["userId"];
?>
<body>
      

    
<div class="all">
    <header class="back_color"></header><!----3.23--->
    <footer class="back_color2"></footer><!---3.23-->
    <ul class="bar_menu">
        <li class="bar_logo">
            <i class="fa-solid fa-car-crash"></i>
            <a href="index.php"><b>BugiTV</b></a>
        </li>
        <li><a href="rank.php">Ranking</a></li>
        <li><a href="comunication.php">Community </a></li>
        <li><a href="QnA.php">QnA</a></li>
        <li><a href="event.php">Event</a></li>

    </ul>    
     
<br>


<div class="BackGroundBox_Psfixed">
    <div class="title">
        <h1>Free_Write</h1>
    </div>

    <section>
        <form name ="QnA_form" method = "post" action = "QnAEnroll.php">
            <div class="bar1">&nbsp<h5 class="write_title1">*표는 필수 입력사항입니다.</h5></div>

            <div class="bar2"><h1 class="write_title2">작성 제목*</h1></div>
            <input type="search-input" class="search-input" name="title">

            <div class="bar3"> <h1 class="write_title2">작성 내용*</h1></div>
            <table class="content_table">
                <tr>
                    <td>
                        <textarea class="content" name="content">
                        </textarea>
                    </td>
                </tr>
            </table>
            

            <div class="hr"><?=$id?></div>
            <input name ="option" hidden value="enroll">
            <button type = "submit" class="d-btn" onclick="location.href='QnAEnroll.php'">등록</button >   
    </form>

</section>



</div> <!-------con-->



    
 </div>    <!-------all_tb---3.23------->

 
</div>
</body>

<script>

</script>



</html>