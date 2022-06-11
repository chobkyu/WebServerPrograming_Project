<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>개인 방송국</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <?php
        session_start();
        $userId = $_SESSION["userId"];

        $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
        $sql = "select * from member where UserId='$userId'";
        $result = mysqli_query($con, $sql);   
        $num_record = mysqli_num_rows($result);
        $memberBoard=mysqli_fetch_array($result);

        $userId=$memberBoard['UserId'];
        $userPw=$memberBoard['UserPw'];
        $userNickName=$memberBoard['UserNickName'];
        $userEmail=$memberBoard['UserEmail'];
        $balloon=$memberBoard['Balloon'];
        $donationBalloon=$memberBoard['DonationBalloon'];
        $donatedBalloon=$memberBoard['DonatedBalloon'];
        $runTime=$memberBoard['RunTime'];


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
                    <a href = "/">WebServerProject</a>
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
                        <label for ="group-1">방송국 이름</label>
                    </li>
                    <br>
                    <li>
                        <input id="group-2" type="checkbox" hidden />
                        <label for="group-2">별풍선</label>
                        <ul class="group-list">
                            <li>보유한 별풍 갯수</li>
                            <li>쏜 별풍 갯수</li>
                            <li>받은 별풍 갯수</li>
                        </ul>
                    </li>
                    <br>
                    <li>
                        <input id="group-3" type="checkbox" hidden />
                        <label for="group-3">방송 시간</label>
                    </li>
                </ul>
            </nav>
        </header>

        <div class="contents">
            <!--BJ이름 나오게 출력할거-->
            <div class = "header">
                <p><?=$userId?></p>
            </div>
           
            <form name="broad_start" method="post" action="broadStart.php"> 
            <!--방송 정보 등록 내용-->
                <div class="contents-body">
                    
                    <div class="body-board">
                            <div class = "board_head" >
                                
                                
                                
                                <p>  <?= $userNickName?>의방송국 정보 &nbsp; *</p>
                            </div>
                            <hr>

                            <div class="board_content input_board">

                                <div class="input_part">
                                    <p>Id</p>

                                    <div class = "input_plus">
                                        <div class="inp_right_div">
                                            <div class="input_part_right inp_default">
                                                <input type="text" name="broadName" value="<?= $userId?>" disabled>
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="input_part">
                                    <p>NickName</p>&nbsp;&nbsp;

                                    <div class = "input_plus">
                                        <div class="inp_right_div">
                                            <div class="input_part_right inp_default">
                                                <input type="text" name="broadName" value="<?= $userNickName?>" disabled>
                                            </div>
            
                                        </div>
                                    </div>
                                </div>

                                <div class="input_part">
                                    <p>Email</p>
                                    
                                    <div class = "input_plus">
                                        <div class="inp_right_div">
                                            <div class="input_part_right inp_default">
                                                <input type="text" name="broadName" value="<?= $userEmail?>" disabled>
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                                

                            </div>

                            
                    </div>
                    <br>
                    <div class="body-board">
                        <div class="board_head">
                            <p>별풍선 </p>
                        </div>
                        <hr>
        
                        <div class="board_content input_board">

                                <div class="input_part">
                                    <p>보유 별풍 갯수</p>

                                    <div class = "input_plus">
                                        <div class="inp_right_div">
                                            <div class="input_part_right inp_default">
                                                <input type="text" name="broadName" value="<?=$balloon?>" disabled>
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="input_part">
                                    <p>쏜 별풍 갯수</p>&nbsp;&nbsp;

                                    <div class = "input_plus">
                                        <div class="inp_right_div">
                                            <div class="input_part_right inp_default">
                                                <input type="text" name="broadName" value="<?= $donationBalloon?>" disabled>
                                            </div>
            
                                        </div>
                                    </div>
                                </div>

                                <div class="input_part">
                                    <p>받은 별풍 갯수</p>
                                    
                                    <div class = "input_plus">
                                        <div class="inp_right_div">
                                            <div class="input_part_right inp_default">
                                                <input type="text" name="broadName" value="<?= $donatedBalloon?>" disabled>
                                            </div>
            
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                </div>
                <div class="board_head">
                            <p>방송시간:<?= $runTime?> </p>
                        </div>
            </form>

           
        </div>

    </body>

    
</html>