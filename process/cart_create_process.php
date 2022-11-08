<link rel="stylesheet" href="/php/ReHome/css/style.css">
<?php
    $sMoney = ($_POST['cPrice']/100);
    // echo $ssMoney;
    // $conn = mysqli_connect('localhost','root','3693','rehome');
    // $conn = mysqli_connect('localhost','root','1234','rehome');
    $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
    $query = "insert into cart(`id`,`title`,`amount`, `savedmoney`, `price`, `delivery`, `userid`) 
    values('{$_POST['id']}','{$_POST['cTitle']}',{$_POST['cAmount']},'{$sMoney}','{$_POST['cPrice']}','0원','{$_POST['userId']}');";
    // echo $_POST['id'];

    $result = mysqli_query($conn, $query);
    $loading = "<div class='loadingio-spinner-pulse-m0y2l903lfs'><div class='ldio-hjjz7f51i9n'>
    <div></div><div></div><div></div>
    </div></div>";
    echo $loading;

    
    echo "
    <script>
    const wrap = document.getElementById('wrap');
    const loading = document.querySelector('.loadingio-spinner-pulse-m0y2l903lfs');

    setTimeout(() => {
        const cartConfirm = window.confirm('장바구니로 가시겠습니까?');
        if(cartConfirm){
            location.replace('/php/ReHome/member/cart.php');
        }else{
            location.replace('/php/ReHome/bestitem_detail.php?id={$_POST['id']}');
        }
    },500);
    </script>";

    // echo $query;
    if($result){
        echo '성공';
    }else{
        echo '실패';
    }
    header("Location:/php/ReHome/bestitem_detail.php?id={$_POST['id']}");
?>