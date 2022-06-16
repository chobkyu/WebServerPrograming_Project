<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="건호" content="width=device-width, initial-scale=1.0">
    <title>Free_Board</title>
    <link rel="stylesheet" href="Free_view.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Electrolize&display=swap" rel="stylesheet">
<script
     src="https://kit.fontawesome.com/af4e1eff79.js"
     crossorigin="anonymous"></script>

</head>
<body>
      
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
     

<?php

    $seq = $_GET["seq"];
    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
    $sql = "select * from qna where seq = '$seq'";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);
    $title = $row["title"];
    $content = $row["content"];
    $userId = $row["userId"];
    $time = $row["time"];
?>
<div class="BackGround">
</div> <!-----BackGround-->
<div class="Main">
    <div class="title">
        <h2>1</h2>
        <h1>QnA_View</h1>
    </div>
    
    <div class="bar2"><h1 class="write_title2">작성 제목</h1></div>
    <div class="search-input"><?=$title?></div>

    <div class="bar3"> <h1 class="write_title2">작성 내용</h1></div>
    <div class="content_table">
        <?=$content?>
    </div>
    <div class="wab">
        <div class="WriterAndbtn">
            <div id="revise">수정</div>
            <div id="delete">삭제</div>
        </div>
    </div>
    <div class="Writer">
        <?=$userId?>
    </div>

    <?php
        $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");//공백란에 디비 비번 입력 
        $sql = "select * from qnaComment where qnaNum=$seq"; 
        $result = mysqli_query($con, $sql);
        $total_rows = mysqli_num_rows($result); 
    ?>

    <div id="form-commentInfo"> 
        <div id="comment-count">댓글 <span id="count"><?=$total_rows?></span></div>
        <form name ="QnA_comment" method = "post" action = "QnAEnroll.php">
            <input type="text" name = "comment" id="comment-input" placeholder="댓글을 입력해 주세요."> 
            <input name ="seq" hidden value="<?=$seq?>">
            <input name ="option" hidden value="comment">
            <button id="submit">등록</button>
            <div id=comments> </div>
        </form>

        <?php
            $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");//공백란에 디비 비번 입력 
        
            $sql ="select * from qnaComment where qnaNum='$seq'";
            $result = mysqli_query($con,$sql);
            $total_rows = mysqli_num_rows($result); 
            $i=0;
            while($i<$total_rows){
                $row = $result->fetch_assoc();
                $id = $row["userId"];
                $text = $row["text"];
                $time = $row["time"];
                echo"
                    <div class=\"coment_writer\">
                        <div class=\"inline\">$id</div>
                        <div class=\"inline\">$time</div>
                            
                        <div class=\"conment_box\">
                            $text
                        </div>
                        <div class=\"pull-right\">
                            
                            <div id=\"delete\">삭제</div>
                        </div>
                    </div>
                ";
                $i++;
            }
        ?>





<div class="paging">
    <a href="#" class="num ">1</a>
    <a href="#" class="num ">2</a>
    <a href="#" class="num ">3</a>
    <a href="#" class="num"> &gt; </a>
    <a href="#" class="bt">마지막</a>
</div>

</div> <!---------form-commentInfo-->
</div> <!-------con-->


</body>

<script>

</script>



</html>