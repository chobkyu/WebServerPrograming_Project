<?php
    $id=$_POST["id"];
    $pw=$_POST["pw"];

    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");//공백란에 디비 비번 입력 
    $sql = "select * from member where UserId='$id'and Userpw='$pw'"; 
    $result = mysqli_query($con, $sql); 
    $num_match = mysqli_num_rows($result); 


    if (!$num_match) 
    {
        echo(" 
            <script> 
                window.alert('아이디 혹은 비밀번호가 일치하지 않습니다.') 
                history.go(-1) 
            </script>
        "); 
        exit;

    }
    else{
        session_start( );
        $_SESSION["userId"] = $id;
        
        echo("
            
            <script>
                alert(\"로그인 되었습니다\");
                location.href='index.php' 
            </script>
        ");
    }

?>