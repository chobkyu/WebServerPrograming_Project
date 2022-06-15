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
        <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
        <!-- 최신버전 Alpha를 이용하고 싶다면 아래 스크립트를 사용 -->
         <!--<script src="https://cdn.jsdelivr.net/npm/hls.js@alpha"></script>--> 
         <style>
            video{
               transform: rotateY(180deg);
               -webkit-transform:rotateY(180deg); /* Safari and Chrome */
               
            }
</style>

    </head>

    <script>
        var myVideoStream = document.getElementById('myVideo')     // make it a global variable
        var camCode = 0;
        var audioCode = 0;
        var videoBool = 1;
        var audioBool = 1;
        
        function getVideo(){
            navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
          
            
            navigator.getMedia({video: true, audio: true},
                            
            function(stream) {
                myVideoStream.srcObject = stream   
                myVideoStream.play();
                camCode = 1;
                audioCode = 1;
            }, 
                            
            function(error) {
                alert('webcam not working');
            });
        }

        getVideo(); //방송 바로 시작

        function breakVideo(){  //캠 끄기
            navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
            if(camCode==0){
                videoBool = 1;
                camCode = 1;
            }
            else{
                videoBool = 0;
                camCode = 0;
            }

            if(audioCode==0){
                audioBool = 0;
            }
            else{
                audioBool = 1;
            }

            navigator.getMedia({video: videoBool, audio: audioBool},
                                    
                function(stream) {
                    myVideoStream.srcObject = stream   
                    myVideoStream.remove;
                                        
                }, 
                                    
                function(error) {
                    alert('webcam not working');
                });
        }

        function breakAudio(){  //오디오 끄기
            navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
            
            if(audioCode==0){
                audioBool = 1;
                audioCode = 1;
            }
            else{
                audioBool = 0;
                audioCode = 0;
            }

            if(camCode==0){
                videoBool = 0;
            }
            else{
                videoBool = 1;
            }

            navigator.getMedia({video: videoBool, audio: audioBool},  
                            
            function(stream) {
                myVideoStream.srcObject = stream   
                myVideoStream.play();
                
            }, 
                            
            function(error) {
            alert('webcam not working');
            });
        }

        //비디오 오디오 껐다켰다 하기
        function onoffVideo(){
            breakVideo();  
            if(camCode==0){
                document.getElementById("cam").value = "캠 켜기";
            }
            else{
                document.getElementById("cam").value = "캠 끄기";
            }
        }

        function onoffAudio(){
            breakAudio();
            if(audioCode==0){
                document.getElementById("audio").value = "오디오 시작";
            }
            else{
                document.getElementById("audio").value = "오디오 정지";
            }
        }

        function logFind(){
            var loginId = window.sessionStorage.getItem("userId");
            console.log(loginId);
            if(loginId===null){
                console.log("dsfdsaf");
                location.href="login.php";
            }
            else{
                alert(loginId);
            }
        }

        function offbroad(){
            <?php
                $seq = $_GET["seq"];

                $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
                $sql = "delete from broadCast where seq = $seq";
                $result = mysqli_query($con, $sql);
            ?>
            
            //채팅 기능 구현시 해당 방의 채팅도 모두 삭제 해야함

            location.href = "index.php";
                    
                
        }        
    

        const videoTag = document.getElementById("myVideo"); 
        const myMediaSource = new MediaSource(); 
        const url = URL.createObjectURL(myMediaSource); 

        videoTag.src = url;
        console.log(url);
        alert(url);
    </script>
    <?php
        $userId = $_GET["userId"];
        $broadName = $_GET["broadName"];

        

    ?>

    <body>
        <div>
                <nav class="prontbar">
                    <div class="bar_logo">
                        <a href="index.html">WebServerProject</a>
                    </div>
        
                
        
                    <div class="Login_menu"> 
                        <p onclick = "logFind()">login</p>
                    </div>
                </nav>    

             
        
        </div>

        <content>
            <div class ="webcam">
                <video id="myVideo" width="80%" height="100%" controls autoplay>
                    브라우저가 video 태그를 지원하지 않습니다.
                </video>
                
                <iframe src="chat.html" width="320" height="670"></iframe>

            </div>
            <div class = "info">
                <h1><?=$broadName?></h1>
                <h4><?=$userId?></h4> 
                
                <input type=button id = "cam" value="캠 정지" onclick="{onoffVideo()}">
                <input type=button id = "audio" value="오디오 정지" onclick="{onoffAudio()}">
                <input type=button id = "stop" value="방송 종료" onclick="{offbroad()}">
            </div>

           
        </content>
        <div align-left backgroudColor="blue">
            
        </div>
        

        <script src="Webcam.js"></script>
        
    </body>
</html>