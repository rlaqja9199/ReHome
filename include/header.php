<?php 
    session_start();
?>
<?php 
//최근 본 상품
// https://ghkdxodn.tistory.com/37
// https://m.blog.naver.com/PostView.naver?isHttpsRedirect=true&blogId=rorean&logNo=221543867895    : [mysql] ORDER BY IN() 으로 정렬
$arr = [];
function printList3(){
    // setcookie('good',1,time()+86400);
    global $arr;
    $goodsNo = $_GET['id'];
    if($_COOKIE['goods_view']){
        $temp = explode(",",$_COOKIE['goods_view']);    //explode : 문자열을 분할하여 배열로 저장하는 함수
        // if(!in_array($goodsNo,$temp)){
            if($goodsNo != null ){
                setcookie('goods_view',$_COOKIE['goods_view'].','.$goodsNo,time()+86400,"/");
            }
        // };
    }else{
        setcookie('goods_view',$goodsNo,time()+86400,"/");
        echo $goodsNo;
    };
    // for($i=0; $i<=sizeof($temp);$i++){
    //     echo $temp[$i]."<br/>";
    // };
    // echo $_COOKIE['goods_view'];
    // echo "temp는".$temp;
    // var_dump($temp);
    

    // setcookie("goods_view","4",time() + 86400,"/");
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
                // array_push($arr,$_COOKIE['goods_view']);
                array_push($temp,$_COOKIE['goods_view']);
            };
            // var_dump($_COOKIE['goods_view']);
            // var_dump($arr);
            // var_dump($temp);
            // var_dump($view_arr);
            
            // for($i=sizeof($arr); $i>=0; $i--){
                //     $arr[i]
                // }


        //💥쿼리문 연결💥
        $conn = mysqli_connect('localhost','root','3693','rehome');
        // $conn = mysqli_connect('localhost','root','1234','rehome');
        // $conn = mysqli_connect('localhost','cathkid','rornfl*#3693','cathkid');  //닷홈에 올리려고
        // $query = "select * from bestitem where id IN($arr[0])";
        
        
        $countTemp = count($temp);
        $temp = array_reverse($temp);   //array_reverse() : 배열 반대로 
        // var_dump($temp);
        $temp = array_shift($temp);     //array_shift() : 제일 첫번째 배열을 삭제하고 리턴값으로 반환
        $temp = strrev($temp);          //strrev() : php 문자열 역순 

        //✨10 / 20 / 30 등 아이디가 0이 붙으면 1/2/3~로 인식함... 문제 해결
        $temp2 = explode(',',$temp);    
        for($i=0; $i<sizeof($temp2); $i++){
            $temp2[$i] = strrev($temp2[$i]);    //다시 문자열을 역순으로 하고
        };
        $temp2 = implode(',',$temp2);           //implode() : 배열에 속한 문자열을 하나의 문자열로 만드는 함수 
                                                //--> [13,17,21]의 형태를(array(4) { [0]=> string(2) "47" [1]=> string(2) "20" [2]=> string(2) "12" [3]=> string(2) "37" }) -> "13,17,21"의 형태(string(11) "47,20,12,37")로 바꾸려고!
        // $temp2 = intval($temp2);
        // var_dump($temp2);

        // var_dump($temp);
        // echo $temp;
        // echo "카운트템프는".$countTemp;
        // var_dump(rsort($temp));
        // for($i=$countTemp; $i>($countTemp-2); $i--; ){
            
        // };

        $query = "select * from bestitem where id IN($temp2) ORDER BY FIELD(id,$temp2) limit 3"; //ORDER BY FIELD( , ) : mysql에서 IN() 조건 순서대로 출력하고 싶다면?!
        $result = mysqli_query($conn, $query);
        // for($i=0; $i<=2; $i++){
            while($row = mysqli_fetch_array($result)){
                echo "<li><a href='/php/ReHome/bestItem_detail.php?id={$row['id']}'>
                <img src='/php/ReHome/images/{$row['imgsrc']}' alt=''>
                </a></li>
                ";
            }
        // }    
        return $arr;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReHome</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/php/ReHome/css/reset.css">
    <link rel="stylesheet" href="/php/ReHome/css/style2.css">
    <script defer src="/php/ReHome/js/script1.js"></script>
    <script defer src="/php/ReHome/js/script2.js"></script>
    <script defer src="/php/ReHome/js/script3.js"></script>
    <script defer src="/php/ReHome/js/script4.js"></script>
    <script defer src="/php/ReHome/js/script5.js"></script>
    <script defer src="/php/ReHome/js/script6.js"></script>
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
                    <!-- isset이 여러개 적으면 '최근 본 상품'의 cookie가 형성 안돼서..! 하나로 다 넣어줘야함! -->
                    <?php
                        if(isset($_SESSION['userId'])){
                            if($_SESSION['userId'] == "admin"){
                                echo "<li><span>{$_SESSION['userId']}님 환영합니다!</span></li>
                                <li><a href='/php/ReHome/process/logout_process.php'>LOGOUT</a></li>
                                <li><a href='/php/ReHome/item_create.php'>REGISTER</a></li>
                                <li><a href='/php/ReHome/member/cart.php'>CART</a></li>";
                            }else{
                                echo "<li><span>{$_SESSION['userId']}님 환영합니다!</span></li>
                                <li><a href='/php/ReHome/process/logout_process.php'>LOGOUT</a></li>
                                <li><a href='/php/ReHome/member/cart.php'>CART</a></li>";
                            }
                        }else{
                            echo "<li><a href='/php/ReHome/member/login.php'>LOGIN</a></li>
                            <li><a href='/php/ReHome/member/join.php'>JOIN</a></li>
                            <li><a href='/php/ReHome/member/login.php' id='cartAlert'>CART</a></li>";
                        };
                    ?>         
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
                                <a href="/php/ReHome/product/product_table.php">PRODUCT</a>
                            </h3>
                            <ul class="hideMenu">
                                <li><a href="/php/ReHome/product/product_table.php">TABLE</a></li>
                                <li><a href="/php/ReHome/product/product_chair.php">CHAIR</a></li>
                                <li><a href="/php/ReHome/product/product_bed.php">BED</a></li>
                            </ul>
                        </li>
                        <li class="menuList">
                            <h3>
                                <a href="/php/ReHome/design/livingroom.php">INTERIOR DESIGN</a>
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