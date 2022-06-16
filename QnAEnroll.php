<?php
    session_start();
    $id = $_SESSION["userId"];
    $option = $_POST["option"];
    
    $date = date("Y-m-d H:i:s");


    if($option=="enroll"){  //QnA 등록
        $title = $_POST["title"];
        $content = $_POST["content"];

        $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");//공백란에 디비 비번 입력 
        $sql = "insert into qna(title, content, userId, time) values ('$title', '$content', '$id', '$date')"; 
        mysqli_query($con, $sql); 
    
        echo "
            <script>
                alert('글이 등록 되었습니다');

                location.href = 'QnA.php';
            </script>
        ";

    }

   
    if($option == "comment"){  //QnA 댓글 등록
        $seq = $_POST["seq"];
        
        $comment = $_POST["comment"];
        
  
        $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");//공백란에 디비 비번 입력 
        $sql = "insert into qnaComment(userId, text, qnaNum, time) values ('$id', '$comment', '$seq', '$date')"; 
        mysqli_query($con, $sql); 
        echo "
        <script>
            alert('댓글이 등록되었습니다');
            location.href = 'QnA_view.php?seq=$seq';
        </script>
    ";
    }

    if($option == "freeComment"){  //자유게시판 댓글 등록
        $seq = $_POST["seq"];
        
        $comment = $_POST["comment"];
        $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");//공백란에 디비 비번 입력 
        $sql = "insert into freeComment(userId, text, freeNum, time) values ('$id', '$comment', '$seq', '$date')"; 
        mysqli_query($con, $sql); 
        echo "
        <script>
            alert('댓글이 등록되었습니다');
            location.href = 'comunication_view.php?seq=$seq';
        </script>
        ";
    }

    if($option == "enrollFree"){ //자유게시판 등록
        $title = $_POST["title"];
        $content = $_POST["content"];

        $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");//공백란에 디비 비번 입력 
        $sql = "insert into freeBoard(title, content, userId, time) values ('$title', '$content', '$id', '$date')"; 
        mysqli_query($con, $sql); 
    
        echo "
            <script>
                alert('글이 등록 되었습니다');

                location.href = 'comunication.php';
            </script>
        ";
    }

    if($option == "eventEnroll"){ //이벤트 등록
        $title = $_POST["title"];
        $content = $_POST["content"];

        $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");//공백란에 디비 비번 입력 
        $sql = "insert into event(title, content, userId, time) values ('$title', '$content', '$id', '$date')"; 
        mysqli_query($con, $sql); 
    
        echo "
            <script>
                alert('글이 등록 되었습니다');

                location.href = 'event.php';
            </script>
        ";
    }

    if($option == "eventComment"){ //이벤트 댓글 등록
        $seq = $_POST["seq"];
        
        $comment = $_POST["comment"];
        $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");//공백란에 디비 비번 입력 
        $sql = "insert into eventComment(userId, text, eventNum, time) values ('$id', '$comment', '$seq', '$date')"; 
        mysqli_query($con, $sql); 
        echo "
        <script>
            alert('댓글이 등록되었습니다');
            location.href = 'event_view.php?seq=$seq';
        </script>
        ";
    }
?>