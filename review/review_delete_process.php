<?php
    // $conn = mysqli_connect('localhost','root','1234','rehome');
    $conn = mysqli_connect('localhost','cathkid','rornfl*#3693','cathkid');
    $query = "delete from review where id={$_POST['id']}";
    $result = mysqli_query($conn, $query);
    echo $_POST['id'];
    if($result) {
        echo "삭제되었습니다.";
    }else {
        echo "실패했습니다.";
    }
    header("Location:/php/ReHome/bestItem_detail.php{$_POST['itemId']}");
?>