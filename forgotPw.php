<?php
    $id = $_POST['forgot_id'];
    $email = $_POST['forgot_email'];
    $answer = $_POST['forgot_answer'];

    $con = mysqli_connect("localhost", "root", "tjwjd4921!","login");
    $sql = "select * from mem where id='$id' and email='$email' and answer='$answer'";
    $result = mysqli_query($con, $sql);

    $num_match = mysqli_num_rows($result);

    if (!$num_match) //매칭된게 없을 경우
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

        $row = mysqli_fetch_array($result);
               
        echo("
            <script>
                console.log('$id');
                
                location.href = 'ForgotRecord.php?option=$id';
            </script>
        ");
        
    }



?>