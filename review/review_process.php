<?php
    $fileimg = $_FILES['reviewimg'];
    move_uploaded_file($fileimg['tmp_name'], "C:Apache24/htdocs/php/ReHome/images/".$fileimg['name']);
    // $conn = mysqli_connect('localhost', 'root', '3693', 'rehome');
    // $conn = mysqli_connect('localhost', 'root', '1234', 'rehome');
    $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
    $query = "INSERT INTO `rehome`.`review` (`reviewdesc`, `reviewimg`, `reviewstar`,`itemid`,`userid`,`date`) values('{$_POST['reviewdesc']}','{$fileimg['name']}','{$_POST['reviewstar']}','{$_POST['id']}','{$_POST['userid']}','{$_POST['date']}')";
    echo $query;
    $result = mysqli_query($conn, $query);
    if($result) {
        echo "게시글을 작성했습니다";
    }else {
        echo "게시글 작성을 실패했습니다";
    }
    header("Location:/php/ReHome/bestItem_detail.php?id={$_POST['id']}");
?>