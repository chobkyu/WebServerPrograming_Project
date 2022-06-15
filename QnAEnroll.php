<?php
    session_start();
    $id = $_SESSION["userId"];

    $title = $_POST["title"];
    $content = $_POST["content"];
    $date = date("Y-m-d H:i:s");

    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");//공백란에 디비 비번 입력 
    $sql = "insert into qna(title, content, userId, time) values ('$title', '$content', '$id', '$date')"; 
    mysqli_query($con, $sql); 
    
    echo "
        <script>
            alert('글이 등록 되었습니다');

            location.href = 'QnA.php';
        </script>
    ";
?>