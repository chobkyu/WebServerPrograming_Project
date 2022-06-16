<?php
include 'login.php';
?>

<!doctype html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>PHP</title>
</head>
<body>
    <?php
    session_destroy();
    echo '<h1>로그아웃 하였습니다.</h1>';
    ?>
    </body>
</html>