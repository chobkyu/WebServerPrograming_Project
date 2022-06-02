<?php
    $id=$_POST["id"];
    $pw=$_POST["pw"];

    $con = mysqli_connect("localhost", "root", "tjwjd4921!", "login");//공백란에 디비 비번 입력 
    $sql = "select * from mem where id='$id'"; 
    $result = mysqli_query($con, $sql); 
    $num_match = mysqli_num_rows($result); 
    if (!$num_match) 
    {
        echo(" 
            <script> 
            window.alert('등록되지 않은 아이디입니다!') 
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
                location.href = 'test.php';
            </script>
        ");
    }

?>