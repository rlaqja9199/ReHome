<?php include_once '../include/header.php' ?>
<?php
    function printList(){
            $conn = mysqli_connect('localhost','root','3693','rehome');
            // $conn = mysqli_connect('localhost','root','1234','rehome');
            // $conn = mysqli_connect('localhost','cathkid','rornfl*#3693','cathkid');
            $query = "select * from bestitem where category='bestItem'";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
                $numRow = number_format($row['saleprice']);
                echo "<li><a href='/php/ReHome/bestItem_detail.php?id={$row['id']}'>
                <div class='hideImg'><img src='/php/ReHome/images/{$row['imgsrc']}'></div>
                <div class='eventText'>
                    <p>{$row['name1']}</p>
                    <p class='price'>{$numRow}원<span>{$row['price']}</span></p>
                </div>
                </a></li>";
            }
        }
?>
            <section>
                <p class="innerRoad">HOME > EVENT</p>
                <article id="event">
                    <div>
                        <h2>이벤트</h2>
                        <div class="inner">
                            <p>한정 수량 특가 이벤트, 리홈타임</p>
                        </div>
                    </div>
                    <div>
                        <h1><img src="/php/ReHome/images/bLogo.png" alt="리홈로고"></h1>
                        <div>
                            <h3>한정 수량 특가 이벤트</h3>
                            <h2>리홈타임</h2>
                            <span>UP TO 45% OFF</span>
                            <P>한정된 수량으로 진행되는 특가 이벤트를 지금 바로 만나보세요</P>
                        </div>
                        <div id="eventProduct" class="inner">
                            <ul>
                                <?php printList(); ?>
                            </ul>
                        </div>
                    </div>
                </article>
            </section>
        </main>
<?php include_once '../include/footer.php' ?>