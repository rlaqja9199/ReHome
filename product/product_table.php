<?php include_once '../include/header.php' ?>
<?php
    function printList(){
            // $conn = mysqli_connect('localhost','root','1234','rehome');
            $conn = mysqli_connect('localhost','cathkid','rornfl*#3693','cathkid');
            $query = "select * from bestitem where category='table'";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
                echo "<li><a href='/php/ReHome/bestItem_detail.php?id={$row['id']}'>
                <div class='hideImg'><img src='/php/ReHome/images/{$row['imgsrc']}'></div>
                <div class='text'>
                    <h4>{$row['brand']}</h4>
                    <p>{$row['name1']}</p>
                    <p>{$row['name2']}</p>
                    <p class='price'>{$row['saleprice']}<span>{$row['price']}</span></p>
                </div>
                </a></li>";
            }
        }
?>
            <section>
                <p class="innerRoad">HOME > PRODUCT > TABLE</p>
                <article class="inner_contents">
                    <div id="tableMainImg">
                        <p class="inner">TABLE</p>
                    </div>
                    <div class="inner">
                        <h2>TABLE</h2>
                        <ul>
                            <?php printList(); ?>
                        </ul>
                    </div>
                </article>
            </section>
        </main>
<?php include_once '../include/footer.php' ?>