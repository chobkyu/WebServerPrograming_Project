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

        <div>
            <nav class = "prontbar">
                <div class = "bar_logo">
                    <a href = "">WebServerProject</a>
                </div>

                <div class="Login_menu">
                    <a href = "login.php">login</a> <!--수정 예정-->
                </div>
            </nav>

        
        </div>

        <header class="nav-left" role="banner">
            <nav class = "nav" role="navigation">
                <ul class="nav__list">
                    <li>
                        <input id="group-1" type="checkbox" hidden />
                        <label for ="group-1">방송 카테고리</label>
                        <ul class="group-list">
                            <li>게임</li>
                            <li>운동</li>
                            <li>보이는 라디오</li>
                            <li>기타</li>
                        </ul>
                    </li>
                    <br>
                    <li>
                        <input id="group-2" type="checkbox" hidden />
                        <label for="group-2">Category2</label>
                    </li>
                    <br>
                    <li>
                        <input id="group-3" type="checkbox" hidden />
                        <label for="group-3">Category2</label>
                    </li>
                </ul>
            </nav>
        </header>
        
        <div class="contents">
            <!--BJ이름 나오게 출력할거-->
            <div class = "header">
                <p><?=$userSession?></p>
            </div>
           
            <form name="broad_start" method="post" action="broadStart.php"> 
            <!--방송 정보 등록 내용-->
                <div class="contents-body">
                    
                    <div class="body-board">
                            <div class = "board_head" >
                                <p> 방송 정보 등록 &nbsp; *</p>
                            </div>
                            <hr>

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
                                    <p>방송정보</p>&nbsp;&nbsp;

                                    <div class="input_part">
                                        <div class="input_right_div">
                                            <div class="input_part_right inp_default">
                                                <textarea name="broadInfo"></textarea>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="input_part">
                                    <p>방송 카테고리</p>
                                    
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
                        <div class="board_head">
                            <p> 사진 등록</p>
                        </div>
                        <hr>
        
                        <div class="board_content input_board">
        
                            <div class="input_part">
                                <p>썸네일 &nbsp;*</p>
                                
                                <div class="input_plus">
                                    <div class="inp_right_div">
                                        <div class="input_part_right photo_zone"></div>
                                        <input type="file" id="uploadFile" class="inp_btn">
                                        <label for="uploadFile" class="btn inp_btn">찾기</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                   

                
                </div>
                <button class="btn" type="submit">방송시작</button>
            </form>

           
        </div>

    </body>

    
</html>