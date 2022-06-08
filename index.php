<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buggi TV</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/af4e1eff79.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" /> 
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="wrap">
        <header id="serviceHeader">
        <h1 id="Bugi_Logo">
        <a href="index.html"><img src="https://ifh.cc/g/Orc8FH.png"></a>  
        </h1>
        <div id="Bugi_Search">
            <div id="serach_input_Wrap">
            <input type="search" id="Keyword">
            <button class="search_btn" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <ul class="serviceUtil">
            <li><a href="BJStart.php"><i class="fa-solid fa-headset"></i></a></li>
            <li><a href="login.php">로그인</a></li>
            <li><i class="fa-solid fa-list-ul"></i></li>
        </ul>
        </header>

        <div class="left_pront">
            <ul class="left_bar_top">
                <a href="index.html"><li><i class="fa-solid fa-1"></i><h5>&nbsp;기능1</h5></li></a>
                <a href="index.html"><li><i class="fa-solid fa-2"></i><h5>&nbsp;기능2</h5></li></a>
                <a href="index.html"><li><i class="fa-solid fa-3"></i><h5>&nbsp;기능3</h5></li></a>
            </ul>

            <ul class="left_bar_bottom">
                <li><a href="index.html">랭킹</a></li>
                <li><a href="index.html">소통센터</a></li>
                <li><a href="index.html">고객센터</a></li>
                <li><a href="index.html">이벤트</a></li>
            </ul>
        </div>

        <nav class="list_container">
            <div class="hot_live">
                <h3>실시간 핫 이슈</h3> 
                <!-- Slider main container -->
                <div class="swiper-container"> 
                <!-- 보여지는 영역 --> 
                <div class="swiper-wrapper" id="swiper-wrapper">
                 <!-- <div class="swiper-slide">내용</div> 를 추가하면된다 -->
                <div class="hot_broadcast swiper-slide slideq"><img class="pr1"src="https://ifh.cc/g/sTWqT6.jpg"></div>
                <div class="hot_broadcast swiper-slide slide2"><img class="pr1"src="https://ifh.cc/g/zHaVVL.jpg"></div>
                <div class="hot_broadcast swiper-slide slide3"><img class="pr1"src="https://ifh.cc/g/qFoRPC.jpg"></div>
                <div class="hot_broadcast swiper-slide slide4"><img class="pr1"src="https://ifh.cc/g/oy7wOQ.png"></div>    
                </div> <!-- 페이징 버튼 처리 상황에 따라 추가 삭제가능-->
                <div class="hot_prev"><div class="swiper-button-prev"></div></div>
                <div class="hot_next"><div class="swiper-button-next"></div></div>
                </div>
                
            </div>

            <div class="live">
                <h3>전체</h3>
                <div class="live_container">
                    <?php
                        $con = mysqli_connect("localhost", "root", "tjwjd4921!","broad");
                        $sql = "select * from broadcast";
                        $result = mysqli_query($con, $sql);
                        $total_rows = mysqli_num_rows($result);
                        
                      
                        $i=1;
                        while($i<=$total_rows){
                            $con = mysqli_connect("localhost", "root", "tjwjd4921!","broad");
                            $sql1 = "select broadName, userId from broadcast where seq='$i'";
                            $result1 = mysqli_query($con, $sql1);
                            $row = mysqli_fetch_array($result1);
                            $broadName = $row["broadName"];
                            $userId = $row["userId"];
                            
                            mysqli_close($con);
                            echo "
                                <div class='live_broadcast' onclick=\"{goToBroad($broadName,$userId)}\">
                                    <img class=\"pr2\"src=\"https://ifh.cc/g/sTWqT6.jpg\">
                                    <h1>$broadName<br>$userId</h1>
                                </div>
                            ";
                            $i++;
                        }
                    ?>
                    <!--
                    <div class="live_broadcast"><img class="pr2"src="https://ifh.cc/g/sTWqT6.jpg">
                        
                    </div>
                    <div class="live_broadcast"><img class="pr2"src="https://ifh.cc/g/sTWqT6.jpg"></div>
                    <div class="live_broadcast"><img class="pr2"src="https://ifh.cc/g/sTWqT6.jpg"></div>
                    -->
                </div>


            </div>

        </nav>

    </div>

   



    
</body>


<script>
        var swiper = new Swiper('.swiper-container',
    {   loop: true,
        autoplay:{
            delay:2000,
            disableOnInteraction: false,
        },
        direction: 'horizontal',
        slidesPerView:3,
        
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }
    }
    
    );
</script>

<script>
    function goToBroad(a, b){
        console.log(a);
        var boardName = a;
        var userId = b;

        location.href = "board.php?userId="+boardName+"&broadName="+userId; 
    }
<script>

<!--<script>
    var reset_btn=document.querySelector('.reset_btn');
    reset_btn.addEventListener('click', function(){
        reset_btn.parentNode.querySelector('input').value="";
    })
</script>--커스텀을 위해서 input search를 text로 바꾸고 만들려고
만든 클리어 버튼 스크립트--->


</html>