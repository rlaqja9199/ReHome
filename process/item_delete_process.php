<?php
    // $conn = mysqli_connect('localhost','root','3693','rehome');
    // $conn = mysqli_connect('localhost','root','1234','rehome');
    $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
    $query = "delete from bestitem where id={$_POST['id']}";
    $result = mysqli_query($conn, $query);    
    if($result) {
        unlink("../images/".$_POST['imgsrc']);
        unlink("../images/".$_POST['imgsrc2']);
        echo "삭제되었습니다.";
    }else {
        echo "실패했습니다.";
    }
    header('Location:../index.php');
?>