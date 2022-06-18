<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>개인 방송국</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <?php
        session_start();
        $userSession = $_SESSION["userId"];
       
    ?>

    <script>
        var userSession = "<?=$userSession?>"
        if(userSession==""){
            alert("먼저 로그인 해주세요");
            location.href = "login.php";
        }
    </script>
<body>
    <div class="left"></div>

    <div class="all_myPage">
        <header id="serviceHeader_myPage">
            <h1 id="Bugi_Logo_myPage">
            <a href="index.php"><img src="https://ifh.cc/g/Orc8FH.png"></a>  
            </h1>
        </header>
        
        <div class="contents">
            <form name="broad_start" method="post" action="broadStart.php" enctype="multipart/form-data"> 
            <!--방송 정보 등록 내용-->
                <div class="contents-body">
                    <div class="body-board">
                            <div class = "board_head" >방송 정보 등록*</div>
                            <div class="board_content input_board">

                                <div class="input_part">
                                    <p>방송 제목 입력</p>
                                    <div class = "input_plus">
                                        <div class="inp_right_div">
                                            <div class="input_part_right inp_default">
                                                <input type="text" name="broadName">
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="input_part">
                                    <p>방송정보</p>
                                    <div class="inp_right_div">
                                        <div class="input_part_right inp_default">
                                            <textarea class="bjcontent"name="broadInfo"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="input_part"><p>방송 카테고리</p>
                                    <select name="category">
                                        <option value="game">게임</option>
                                        <option value="work">운동</option>
                                        <option value="other">기타</option>
                                    </select>
                                </div>
                                

                            </div>

                            
                    </div>
                    <br>
                    <div class="body-board">
                        <div class="board_head"> 사진 등록
                        </div>
                        
        
                        <div class="board_content input_board">
        
                            <div class="input_part"><p>썸네일</p>
                                <div class="input_plus">
                                    <div class="inp_right_div">
                                        <div id="photo_zone"></div>
                                        <input type="file" accept="image/*" name="upfile" id="uploadFile" class="inp_btn"
                                        onchange="setThumbnail(event);"/>
                                       <!-- <label for="uploadFile" class="btn inp_btn">찾기</label> -->
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                        
                    </div>
                   

                    <button class="btn" type="submit">방송시작</button>
                </div>
                
            </form>

            
        </div>
    </div><!--all_mypage-->

    <div class="right"></div>
</body>

<script>
    function setThumbnail(event) {
      var reader = new FileReader();

      reader.onload = function(event) {
        var img = document.createElement("img");
        img.setAttribute("src", event.target.result);
        document.querySelector("div#photo_zone").appendChild(img);
      };

      reader.readAsDataURL(event.target.files[0]);
    }
  </script>

</html>