<?php

    session_start();
    
    $userId=$_SESSION["userId"];
    $broadName=$_POST["broadName"];
    $broadInfo=$_POST["broadInfo"];
    $category=$_POST["category"];
    $date = date("Y-m-d H:i:s");

    $upload_dir = './img/';

    $upfile_name = $_FILES["upfile"]["name"];
    $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
    $upfile_type = $_FILES["upfile"]["type"];
    $upfile_size = $_FILES["upfile"]["size"];
    $upfile_error = $_FILES["upfile"]["error"];

    if($upfile_name && !$upfile_error){
        $file = explode(".", $upfile_name);
        $file_name = $file[0];
        $file_ext = $file[1];
        $new_file_name = date("Y_m_d_H_i_s");
        
        $copied_file_name = $new_file_name.".".$file_ext;
        $uploaded_file = $upload_dir.$copied_file_name;

        if($upfile_size > 10000000){
            echo "
                <script>
                    alert('업로드 파일 크기가 10MB를 초과합니다 <br>파일크기를 체크해주세요');
                    history.go(-1);
                </script>
            ";
            exit;
        }

        if(!move_uploaded_file($upfile_tmp_name,$uploaded_file)){
            echo "
                <script>
                    alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다');
                    history.go(-1);
                </script>
            ";
            exit;
        }
    }
    else{
        $upfile_name = "";
        $upfile_type = "";
        $copied_file_name = "";
    }

    //방송 정보 저장

    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
    $sql = "insert into broadCast(userId,name,date,category,broadInfo,recommend,file_name,file_type,file_copied)";
    $sql .="values ('$userId','$broadName','$date','$category','$broadInfo',0, '$upfile_name','$upfile_type','$copied_file_name')";
    mysqli_query($con,$sql);
    


    //해당 방송 시작
    $con = mysqli_connect("database-1.c9g35ixldt8h.ap-northeast-2.rds.amazonaws.com", "admin", "00000000", "project");
    $sql1 = "select * from broadCast where userId = '$userId' and name = '$broadName'";
    $result1 = mysqli_query($con, $sql1);
    $row = mysqli_fetch_array($result1);
    $seq = $row["seq"];
    
    echo"
        <script>
            alert(\"$seq\");
            alert(\"방송을 시작합니다\");
            location.href = \"test.php?userId=$userId&broadName=$broadName&seq=$seq\";
        </script>
    ";
?>
