<?php
    $id = $_POST["id"];
    $password = $_POST["pw"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $answer = $_POST["answer"];

    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");//공백란에 디비 비번 입력 
    $sql = "insert into member(UserId, UserPw, UserNickName, UserEmail, UserQuestion) "; 
    $sql .= "values('$id', '$password', '$name', '$email', '$answer')"; 
    mysqli_query($con, $sql); // $sql에 저장된 명령 실행 ⑥

    mysqli_close($con);

    echo "
    <script> 
        alert(\"회원가입이 완료되었습니다 \");
        location.href = 'login.php'; 
    </script>
    ";


?>