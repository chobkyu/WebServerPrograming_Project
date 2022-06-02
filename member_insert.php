<?php
    $id = $_POST["id"];
    $password = $_POST["pw"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $answer = $_POST["answer"];

    $con = mysqli_connect("localhost", "root", "", "login");//공백란에 디비 비번 입력 
    $sql = "insert into mem(id, pass, name, email, answer) "; 
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