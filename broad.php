<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bj.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Electrolize&display=swap" rel="stylesheet">
        <title>webcam</title>
        

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
         최신버전 Alpha를 이용하고 싶다면 아래 스크립트를 사용 -->
         <!--<script src="https://cdn.jsdelivr.net/npm/hls.js@alpha"></script>--> 
    </head>
    <?php
        session_start();
        $id = $_SESSION["userId"];
        if($id == null){
            echo "
                <script>
                    alert('로그인 해주세요');
                    location.href='login.php';
                </script>
            ";
        }

        $userId = $_GET["userId"];
        $broadName = $_GET["broadName"];
        $seq = $_GET["seq"];
       
        $_SESSION['seq'] = $seq;
    ?>

    <body>
        <div class="all_webcam">
            <div class ="webcam">
                <iframe src = "test.php?userId=<?=$userId?>&broadName=<?=$broadName?>&seq=<?=$seq?>" id="bjVideo" scrolling ="no">
                    브라우저가 video 태그를 지원하지 않습니다.
                </iframe>
                
                <!--<iframe src="http://www.mk.co.kr" width="320" height="670"></iframe>-->
            </div>
        </div>
        <script src="Webcam.js"></script>
        
    </body>
</html>