<?php 
    session_start();
?>
<?php 
//최근 본 상품
    $arr = [];
    function printList3(){
        global $arr;
        setcookie("goods_view",$_GET['id'],time() + 86400,"/");
        // setcookie("goods_view", $_GET['id'],time() + 86400,"/");
        // $query = `select imgsrc from bestitem where id=$view_arr[$i]`;
        // $view_arr = explode(",",$_COOKIE['goods_view']);
        // for($i=0; $i<=sizeof($view_arr); $i++){
            //     if($view_arr[$i] === false){
                //         array_splice($view_arr[$i],1);
                //         $i--;
                //     }
                // }
            if($_COOKIE['goods_view']){
                array_push($arr,$_COOKIE['goods_view']);
            };
            // var_dump($_COOKIE['goods_view']);
            var_dump($arr);
        // var_dump($view_arr);
        // $conn = mysqli_connect('localhost','root','1234','rehome');
        $conn = mysqli_connect('localhost','cathkid','rornfl*#3693','cathkid');
        $query = "select * from bestitem where id=1 ";
        $result = mysqli_query($conn, $query);
        //for($i=0; $i<=2; $i++){
            while($row = mysqli_fetch_array($result)){
                echo "<li><a href='/php/ReHome/bestItem_detail.php?id={$row['id']}'>
                <img src='/php/ReHome/images/{$row['imgsrc']}' alt=''>
                </a></li>
                ";
            }
        //}
        return $arr;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/php/ReHome/css/reset.css">
    <link rel="stylesheet" href="/php/ReHome/css/style.css">
    <script defer src="/php/ReHome/js/script1.js"></script>
    <script defer src="/php/ReHome/js/script2.js"></script>
    <script defer src="/php/ReHome/js/script3.js"></script>
    <script defer src="/php/ReHome/js/script4.js"></script>
</head>
<body>
    <!-- 로딩화면 -->
    <div class="loadingio-spinner-pulse-m0y2l903lfs"><div class="ldio-hjjz7f51i9n">
    <div></div><div></div><div></div>
    </div></div>    
    <div id="wrap">
        <header>
            <div class="inner">
                <h1><a href="/php/ReHome/index.php">
                    <img src="/php/ReHome/images/wLogo.png" alt=""></a></h1>
                <ul>
                    <li>
                    <?php 
                        if(isset($_SESSION['userId'])){
                            echo "<a href='/php/ReHome/process/logout_process.php'>LOGOUT</a>";
                        }else {
                            echo "<a href='/php/ReHome/member/login.php'>LOGIN</a>";
                        }
                    ?>
                        <!-- <a href="/php/ReHome/member/login.php">LOGIN</a> -->
                    </li>
                    <li>
                        <?php 
                            if(isset($_SESSION['userId'])){
                                echo "<a href='/php/ReHome/item_create.php'>REGISTER</a>";
                            }else {
                                echo "<a href='/php/ReHome/member/join.php'>JOIN</a>";
                            }
                        ?>
                        <!-- <a href="/php/ReHome/member/join.php">JOIN</a> -->
                    </li>
                    <li><a href="/php/ReHome/member/cart.php">CART</a></li>
                </ul>
            </div>
        </header>
        <main>
            <nav>
                <div class="inner">
                    <ul id="navBar">
                        <li class="menuList">
                            <h3>
                                <a href="/php/ReHome/about/about_greetings.php">ABOUT</a>
                            </h3>
                            <ul class="hideMenu">
                                <li><a href="/php/ReHome/about/about_greetings.php">인삿말</a></li>
                                <li><a href="/php/ReHome/about/about_brandStory.php">브랜드소개</a></li>
                            </ul>
                        </li>
                        <li class="menuList">
                            <h3>
                                <a href="#">PRODUCT</a>
                            </h3>
                            <ul class="hideMenu">
                                <li><a href="/php/ReHome/product/product_table.php">TABLE</a></li>
                                <li><a href="/php/ReHome/product/product_chair.php">CHAIR</a></li>
                                <li><a href="/php/ReHome/product/product_bed.php">BED</a></li>
                            </ul>
                        </li>
                        <li class="menuList">
                            <h3>
                                <a href="#">INTERIOR DESIGN</a>
                            </h3>
                            <ul class="hideMenu">
                                <li><a href="/php/ReHome/design/livingroom.php">Living Room</a></li>
                                <li><a href="/php/ReHome/design/bedroom.php">Bed Room</a></li>
                                <li><a href="/php/ReHome/design/kitchen.php">kitchen</a></li>
                            </ul>
                        </li>
                        <li class="menuList"><h3><a href="/php/ReHome/etc/event.php">EVENT</a></h3></li>
                        <li class="menuList"><h3><a href="/php/ReHome/etc/csCenter.php">CS CENTER</a></h3></li>
                    </ul>
                </div>
            </nav>
            <aside>
                <h4>최근 본 상품</h4>
                <ul>
                    <?php printList3(); ?>
                </ul>
                <div>
                    <button id="pageUp" style="font-size:24px"><i class="fa fa-angle-double-up"></i></button>
                    <button id="pageDown" style="font-size:24px"><i class="fa fa-angle-double-down"></i></button>
                </div>
            </aside>