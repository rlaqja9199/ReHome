<?php include_once 'include/header.php' ?>
<?php 
    //bestItem - best
    function printList(){
        // $conn = mysqli_connect('localhost','root','3693','rehome');
        // $conn = mysqli_connect('localhost','root','1234','rehome');
        $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
        $query = "select * from bestitem where category='bestItem' limit 9";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $numRow = number_format($row['saleprice']);
            echo "<li><a href='/php/ReHome/bestItem_detail.php?id={$row['id']}'>
            <div class='hideImg'><img src='/php/ReHome/images/{$row['imgsrc']}'></div>
            <div class='text'>
                <h4>{$row['brand']}<span class='orderEx'><img src='/php/ReHome/images/orderExploding.png'></span></h4>
                <p>{$row['name1']}</p>
                <p>{$row['name2']}</p>
                <p class='price'>{$numRow}원<span>{$row['price']}</span></p>
            </div>
            </a></li>";
        }
    }

    //bestReview
    function printList2(){
    // $conn = mysqli_connect('localhost','root','3693','rehome');
    // $conn = mysqli_connect('localhost','root','1234','rehome');
    $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
    $query = "select * from bestreview limit 8";
    $result2 = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result2)){
            echo "<li><a href='/php/ReHome/product/product_table.php'>
            <div class='hideImg'><img src='/php/ReHome/images/{$row['imgsrc']}'></div>
            <div class='reviewText'>
                <h4>{$row['name']}</h4>
                <p>{$row['review']}</p>
            </div>
            </a></li>";
        }
    }

    //bestItem - new Arrival
    function printList4(){
        // $conn = mysqli_connect('localhost','root','3693','rehome');
        $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
        $query = "select * from bestitem where category='new' limit 9";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $numRow = number_format($row['saleprice']);
            echo "<li><a href='/php/ReHome/bestItem_detail.php?id={$row['id']}'>
            <div class='hideImg'><img src='/php/ReHome/images/{$row['imgsrc']}'></div>
            <div class='text'>
                <h4>{$row['brand']}<span class='newItem'>NEW</span></h4>
                <p>{$row['name1']}</p>
                <p>{$row['name2']}</p>
                <p class='price'>{$numRow}원<span>{$row['price']}</span></p>
            </div>
            </a></li>";
        }
    }


    //bestItem - sale
    function printList5(){
        // $conn = mysqli_connect('localhost','root','3693','rehome');
        $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
        $query = "select * from bestitem where category='sale' limit 9";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result)){
            $numRow = number_format($row['saleprice']);
            echo "<li><a href='/php/ReHome/bestItem_detail.php?id={$row['id']}'>
            <div class='hideImg'><img src='/php/ReHome/images/{$row['imgsrc']}'></div>
            <div class='text'>
                <h4>{$row['brand']}</h4>
                <p>{$row['name1']}</p>
                <p>{$row['name2']}</p>
                <p class='saleItem'>{$numRow}원<span>{$row['price']}</span></p>
            </div>
            </a></li>";
        }
    }
?>
            <div id="slide_wrap">
                <div id="slide_group_view">
                    <div id="slide_group">
                        <img src="/php/ReHome/images/main4.jpg" alt="" class="slide_img">
                        <img src="/php/ReHome/images/main2.png" alt="" class="slide_img">
                        <img src="/php/ReHome/images/main3.jpg" alt="" class="slide_img">
                        <img src="/php/ReHome/images/main1.png" alt="" class="slide_img">
                    </div>
                </div>
                <div id="slide_nav">
                    <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
                    <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <section>
                <article class="inner_contents">
                    <div class="inner">
                        <h2>BEST ITEM</h2>
                        <ul>
                            <?php printList(); ?>
                        </ul>
                    </div>
                </article>
                <article class="inner_contents">
                    <div class="inner">
                        <h2>NEW ARRIVAL</h2>
                        <ul>
                            <?php printList4(); ?>
                        </ul>
                    </div>
                </article>
                <article class="inner_contents">
                    <div class="inner">
                        <h2>SALE</h2>
                        <ul>
                            <?php printList5(); ?>
                        </ul>
                    </div>
                </article>
                <article class="review">
                    <h2>BEST REVIEW</h2>
                    <ul>
                        <?php printList2(); ?>
                    </ul>
                </article>
            </section>
        </main>
<?php include_once 'include/footer.php' ?>