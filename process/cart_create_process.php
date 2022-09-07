<?php
    $sMoney = ($_POST['cPrice']/100);
    // echo $sMoney;
    // $conn = mysqli_connect('localhost','root','1234','rehome');
    $conn = mysqli_connect('localhost','cathkid','rornfl*#3693','cathkid');
    $query = "insert into cart(`id`,`title`,`amount`, `savedmoney`, `price`, `delivery`, `userid`) 
    values('{$_POST['id']}','{$_POST['cTitle']}',{$_POST['cAmount']},{$sMoney},{$_POST['cPrice']},'0원','{$_POST['userId']}');";
    echo $_POST['id'];

    $result = mysqli_query($conn, $query);
    echo $query;
    if($result){
        echo '성공';
    }else{
        echo '실패';
    }
    // header('Location:/php/ReHome/member/cart.php');
?>