<?php
    $conn = mysqli_connect('localhost','root','3693','rehome');
    // $conn = mysqli_connect('localhost','root','1234','rehome');
    // $conn = mysqli_connect('localhost','cathkid','rornfl*#3693','cathkid');
    // $query = "delete from cart where id={$_POST['id']}";
    $query = "delete from cart where number={$_POST['number']}";
    $result = mysqli_query($conn, $query);

    echo $_POST['id'];
    if($result) {
        echo "삭제되었습니다.";
    }else {
        echo "실패했습니다.";
    }
    header('Location:/php/ReHome/member/cart.php');
?>