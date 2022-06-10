<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="건호" content="width=device-width, initial-scale=1.0">
    <title>Free_Board</title>
    <link rel="stylesheet" href="Free.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Electrolize&display=swap" rel="stylesheet">
<script
     src="https://kit.fontawesome.com/af4e1eff79.js"
     crossorigin="anonymous"></script>

</head>
<body>
      

    
<div class="all">
    <header class="back_color"></header><!----3.23--->
    <footer class="back_color2"></footer><!---3.23-->
    <ul class="bar_menu">
        <li class="bar_logo">
            <i class="fa-solid fa-car-crash"></i>
            <a href="index.php"><b>BugiTV</b></a>
        </li>
        <li><a href="CCTV_analysis.html">CCTV_analysis</a></li>
        <li><a href="Carmodel.html">Car_model </a></li>
        <li><a href="index.html">Streaming</a></li>
        <li><a href="QnA.html">QnA</a></li>
        <li><a href="Free.html">Free_Board</a></li>

    </ul>    
     
<br>

 <div class="all_tb">
    <div class="Login_menu"> <a href="login.html">Login</a></div> 
    <div class="title">
        <h1>Free_Board</h1>
    </div>
    <div class="search-wrap">
    <select>
        <option>제목</option>
        <option>작성자</option>
        <option>제목+작성자</option>
    </select>  
    <input type="text" class="search-input" placeholder="Please Enter Text">

     <button type="submit" class="search-btn">검색</button>
    </div>

    <div class ="board_list_wrap">
        <table class="board_list">
        
            <thead>
                <tr>
                <th>번호</th>
                <th>제목</th>
                <th>작성자</th>
                <th>시간</th>                
                </tr>
            </thead>

            <tbody>
                <?php
                   $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
                   $sql = "select * from freeBoard"; 
                   $result = mysqli_query($con, $sql);
                   $total_rows = mysqli_num_rows($result);

                   $i=1;
                   while($i<=$total_rows){
                    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
                    $sql1 = "select seq, title, userId, time from freeBoard";
                    $result1 = mysqli_query($con, $sql1);
                    $row = mysqli_fetch_array($result1);
                    $seq = $row["seq"];
                    $title = $row["title"];
                    $userId = $row["userId"];
                    $time = $row["time"];

                    mysqli_close($con);

                    echo "
                        <tr>
                            <td>$seq</td>
                            <td>$title</a></td>
                            <td>$userId</td>
                            <td>$time</td>    
                        </tr>
                    ";
                    $i++;
                   }
                ?>

                
    
            </tbody>
        </table>

        <div class="paging">
           <!-- <a href="#" class="bt">처음</a>
            <a href="#" class="num"> &lt; </a>-->
            <a href="#" class="num ">1</a>
         <a href="#" class="num ">2</a>
           <a href="#" class="num ">3</a>
           <!--  <a href="#" class="num"> &gt; </a>
            <a href="#" class="bt">마지막</a>-->
        </div>

        <button class="d-btn"onclick="location.href='comunication_Write.html'">등록</button >

    </div>
    
 </div>    <!-------all_tb---3.23------->

 
</div> <!--all-->
</body>

<script>

</script>



</html>