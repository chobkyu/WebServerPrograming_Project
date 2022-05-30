<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Electrolize&display=swap" rel="stylesheet">
        <title>webcam</title>
        

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
         최신버전 Alpha를 이용하고 싶다면 아래 스크립트를 사용 -->
         <!--<script src="https://cdn.jsdelivr.net/npm/hls.js@alpha"></script>--> 
    </head>
    <body>
        <div >
                <nav class="prontbar">
                    <div class="bar_logo">
                        <a href="">WebServerProject</a>
                    </div>
        
                
        
                    <div class="Login_menu"> 
                        <a href="login.php">login</a>
                    </div>
                </nav>    

             
        
        </div>

        <content>
            <div class ="webcam">
                <video id="myVideo" width="80%" height="100%" controls autoplay>
                    브라우저가 video 태그를 지원하지 않습니다.
                </video>
                
                <iframe src="http://www.mk.co.kr" width="320" height="670"></iframe>

            </div>
            <div class = "info">
                <h1>방송이름</h1>
                <h4>방송인 이름</h4> 
                <input type=button value="방송시작" onclick="{getVideo()}"> <!--일단 이거 여기 해놓고 나중에 관리자 페이지로 이동-->
            </div>

           
        </content>
        <div align-left backgroudColor="blue">
            
        </div>
        

        <script src="Webcam.js"></script>
        
    </body>
</html>