<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="login.css">
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
</head>



<body>
   
    <section class="login-form">
    <h1></h1>
    <div class="bar_logo">
        <a href="index.html">Ranking</a>
    </div>
   
    <?php
        $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");//공백란에 디비 비번 입력 
        
        $sql ="select UserId from member order by recommend desc limit 3";
        $result = mysqli_query($con,$sql);
        
        $num_result= $result->num_rows;

        for($i=0; $i<$num_result; $i++){
            $row = $result->fetch_assoc();
            $name = $row['UserId'];
            if($i==0){
                $grade = "1st";
            }
            if($i==1){
                $grade = "2nd";
            }
            if($i==2){
                $grade = "3rd";
            }
            echo "
                <div class=\"int-area\">
                <input type=\"text\" name=\"id\" id=\"id\"
                autocomplete=\"off\" value= \"$name\">
                <label for=\"id\">$grade</label>
                </div>
            ";
        }

    ?>
        
        
    <div class="btn-area">
        <button type="submit" onclick="location.href='index.php'">Back</button>
    </div>
    

   

    
    </section>

</body>
</html>