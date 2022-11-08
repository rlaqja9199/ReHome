<?php include_once 'include/header.php' ?>
<?php 
    // $conn = mysqli_connect('localhost','root','3693','rehome');
    // $conn = mysqli_connect('localhost','root','1234','rehome');
    $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
    $query = "select * from bestitem where id='{$_GET['id']}'"; 
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $query3 = "select id from member;";
    $result3 = mysqli_query($conn,$query3);
    $row3 = mysqli_fetch_array($result3);
    date_default_timezone_set('Asia/Seoul');
?>
<section>
    <div class="btm_bar">
        <p class="innerRoad" id="detailRoad">HOME > PRODUCT</p>
    </div>
    <article class="inner">

            <table id="itemDetail">
                <tr>
                    <td>
                        <img src="/php/ReHome/images/<?=$row['imgsrc']?>" width="500">
                    </td>
                    <td>
                        <div id="detailText">
                            <p><?=$row['brand']?></p>
                            <h3><?=$row['name1']?></h3>
                        </div>
                        <div id="detailPrice">
                            <ul>
                                <li>소비자가격</li>
                                <li>판매가격</li>
                                <li class="subP">총 상품금액</li>
                                <li>상품코드</li>
                                <li>무이자 할부</li>
                            </ul>
                            <ul>
                                <li>
                                    <input type="text" value="<?=$row['price']?>" style="text-decoration: line-through; color: #ccc;">
                                </li>
                                <li>
                                    <input type="text" value="<?=$row['saleprice']?>" id="productPrice">
                                </li>
                                <li>
                                    <p id="totalPrice"><?=number_format($row['saleprice'])?>원</p>
                                </li>
                                <li>
                                    <!-- <form action="/php/ReHome/item_edit.php" method="post"> -->
                                        <input type="text" value="<?=$row['id']?>" style="color: #888;">
                                    <!-- </form> -->
                                </li>
                                <li><button>카드안내</button></li>
                            </ul>
                        </div>
                        <div id="detailSelect">
                            <p>필수옵션</p>
                            <!-- <select name="" id="">
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>          -->       
                            <div id='result'>
                                <input type="text" id="goods_amount" name="amount" value="1" size="4" style="text-align: right;">
                            </div>
                            <input type='button' onclick='count("plus")' value='▲'>
                            <input type='button' onclick='count("minus")' value='▼'>
                        </div>
                        <div id="buttons">
                            <a href="#"><button style="cursor: pointer;">관심상품</button></a>
                            <form action="/php/ReHome/process/cart_create_process.php" method="post">
                                <!-- <input type="text"> -->
                                <input type="hidden" name="cTitle" value="<?=$row['name1']?>">
                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                <input type="hidden" name="userId" value="<?=$_SESSION['userId']?>">
                                <input type="hidden" name="cSavedmoney" value="<?=$row['savedmoney']?>">
                                <input type="hidden" name="cPrice" id="cPrice" value="<?=$row['saleprice']?>">
                                <input type="hidden" name="cDelivery" value="<?=$row['delivery']?>">
                                <input type="hidden" name="cAmount" value="1" id="cAmount">
                                <?php
                                    if(isset($_SESSION['userId'])){
                                        echo "<button type='submit' style='cursor: pointer;' id='cartBtn'>장바구니</button>";
                                    } else {
                                        echo "<button type='button' style='cursor: pointer;' id='cartBtn' onclick={cartLogin()}>장바구니</button>";
                                    };
                                ?>
                            </form>
                            <form action="/php/ReHome/process/cart_create_process2.php" method="post">
                                <!-- <input type="text"> -->
                                <input type="hidden" name="cTitle" value="<?=$row['name1']?>">
                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                <input type="hidden" name="userId" value="<?=$_SESSION['userId']?>">
                                <input type="hidden" name="cSavedmoney" value="<?=$row['savedmoney']?>">
                                <input type="hidden" name="cPrice" id="cPrice" value="<?=$row['saleprice']?>">
                                <input type="hidden" name="cDelivery" value="<?=$row['delivery']?>">
                                <input type="hidden" name="cAmount" value="1" id="cAmount">
                                <?php
                                    if(isset($_SESSION['userId'])){
                                        echo "<button type='submit' style='cursor: pointer;' id='buyBtn'>바로 구매</button>";
                                    } else {
                                        echo "<button type='button' style='cursor: pointer;' id='buyBtn' onclick={cartLogin()}>바로 구매</button>";
                                    };
                                ?>
                            </form>
                        </div>
                        <div id="buttons2">
                            <?php 
                                if(isset($_SESSION['userId'])){
                                    if($_SESSION['userId'] == "admin"){
                                        echo "<form action='/php/ReHome/item_edit.php' method='post'>
                                            <input type='hidden' value={$_GET['id']} name='id'>
                                            <button type='submit' style='cursor: pointer;' class='editBtn'>수정</button>
                                        </form>
                                        <form action='/php/ReHome/process/item_delete_process.php' method='post'>
                                            <input type='hidden' value={$_GET['id']} name='id'>
                                            <button type='submit' style='cursor: pointer;' class='delBtn'>삭제</button>
                                        </form>";
                                    };
                                };
                            ?>
                        </div>
                    </td>
                </tr>
            </table>

        <div id="detailProduct">
            <ul>
                <li><a href="#details">상세정보</a></li>
                <li><a href="#deliveryInfor">배송정보</a></li>
                <li><a href="#review_contents">리뷰</a></li>
            </ul>
            <img src="/php/ReHome/images/<?=$row['imgsrc2']?>" width="100%" id="details">
            <h3 id="deliveryInfor">배송정보 및 유의사항</h3>
            <p>DELIVERY INFORMATION & CAUTION</p>
            <table id="delivery">
                <tr>
                    <td>배송기간</td>
                    <td>
                        ·주문일로부터 평균 3-7일 이후 배송이 가능합니다.<br/><br/>

                        ·일요일 및 공휴일에는 배송이 불가능합니다.<br/><br/>

                        ·일부 제품은 주문제작 상품으로 배송기간이 다소 소요될 수 있습니다.<br/><br/>

                        ·주문폭주, 일시적 재고부족, 기상이변, 악천후, 천재지변 등에 의한 배송지연이 발생할 수 있습니다.<br/><br/>

                        ·01. 주문서 작성 및 결제 ▶ 02. 해피콜 ▶ 03. 상품준비 ▶ 04. 상품배송 ▶ 05. 후기작성 및 적립금지급<br/>
                    </td>
                </tr>
                <tr>
                    <td>배송일정 변경</td>
                    <td>
                        ·해피콜을 통해 배송요청일을 지정하신 이후 고객변심으로 인한 배송요청일 변경 및 취소 요청은 배송요청일 기준 최소 2일전 (영업시간 기준),<br/>
                        ·경상도 지역은 최소 4일전 (영업시간기준)에 고객센터(1544-6400)로 접수해주셔야 원활한 처리가 가능합니다.<br/><br/>

                        ·배송당일 또는 기준일 이전에 배송일정 변경 요청시에는 별도의 배송비가 발생합니다.<br/>
                        ·고객센터 : 1544-6400 / 운영시간: 월~금 (9:30~18:00)<br/>
                    </td>
                </tr>
                <tr>
                    <td>유의사항</td>
                    <td>
                        ·사다리차 이용 또는 엘레베이터 이용료 등 설치현장의 특수성으로 인한 추가비용은 고객부담입니다.<br/>
                        (엘리베이터가 없는 3층 이상의 건물, 엘리베이터 사용료, 지게차 사용료, 주차장 이용료 등)<br/><br/>

                        ·저층의 경우에도 입구 및 엘리베이터가 협소하여 물품이동이 어려운 경우 사다리차를 사용할 수 있습니다.<br/><br/>

                        ·배송일정은 지정이 가능하나, 배송시간은 지정이 불가합니다. (배송시간 또한 지역 및 교통상황에 따라 달라질 수 있습니다.)<br/><br/>

                        ·상품이 배송되기 전 설치를 원하시는 공간을 미리 확보 및 정돈 부탁드립니다.<br/><br/>

                        ·전문시공기사가 직접 방문하여 조립/설치를 해드리나, 기존가구의 이동 및 철거는 불가하오니 양해바랍니다.<br/><br/>

                        ·모니터 환경에 따라 실제 제품의 색상에 다소 차이가 있을 수 있습니다.<br/><br/>

                        ·모든 가구는 수작업 제품으로 약간의 사이즈가 차이가 있을 수 있습니다. (제작 공정상 제품의 원자재 및 디자인이 임의 변경될 수 있습니다.)<br/>
                    </td>
                </tr>
            </table>
            <article id="review_contents">
            <?php
                // $conn2 = mysqli_connect('localhost','root','3693','rehome');
                // $conn2 = mysqli_connect('localhost','root','1234','rehome');
                $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
                $query2 = "select * from review where itemid = {$row['id']} order by id desc;";
                $result2 = mysqli_query($conn2,$query2);
            ?>
                <div id="review">
                    <h3>Review 작성하기</h3>
                    <form action="/php/ReHome/review/review_process.php" method="post" enctype="multipart/form-data">
                        <textarea name="reviewdesc" id="reviewdesc" cols="30" rows="10" placeholder="상품후기 작성하기"></textarea>
                        <ul id="reviewBtns">
                            <li class="reviewPhoto">
                                <input onchange={fileOnChange()} type="file" name="reviewimg" value="reviewimg" id="reviewFile" required style="position:absolute; opacity:0;">
                                <input type="hidden" name="userid" value="<?=$_SESSION['userId']?>">
                                <input type="hidden" name="date" value="<?=date("Y-m-d H:i")?>">
                                <label id="photofile">사진추가</label>
                            </li>
                            <li>
                                <select name="reviewstar" id="reviewstar">
                                    <option value="★★★★★" selected>★★★★★</option>
                                    <option value="★★★★">★★★★</option>
                                    <option value="★★★">★★★</option>
                                    <option value="★★">★★</option>
                                    <option value="★">★</option>
                                </select>
                            </li>
                            <li>
                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                <?php
                                    if(isset($_SESSION['userId'])){
                                        echo "<button id='reviewBtn' type='submit'>리뷰등록</button>";
                                    } else {
                                        echo "<button type='button' style='cursor: pointer;' id='reviewBtn' onclick={cartLogin()}>리뷰등록</button>";
                                    };
                                ?>
                                <!-- <button id="reviewBtn" type="submit">리뷰등록</button> -->
                            </li>
                        </ul>
                    </form>
                </div>
                <div id="reviewText">
                    <h3>Review</h3>
                    <?php
                        function printList() {
                            global $result2;
                            while($row2 = mysqli_fetch_array($result2)) {
                                if($_SESSION['userId'] == $row2['userid'] || $_SESSION['userId'] == "admin"){
                                    echo "<ul>
                                            <li>{$row2['id']}</li>
                                            <li class='reviewId'>{$row2['userid']}<span>{$row2['date']}</span></li>
                                            <li><span>{$row2['reviewstar']}</span></li>
                                            <li>{$row2['reviewdesc']}</li>
                                            <li><img src='/php/ReHome/images/{$row2['reviewimg']}'></li>
                                            <li>
                                                <form action='/php/ReHome/review/review_delete_process.php' method='post'>                                  
                                                <input type='hidden' name='id' value='{$row2['id']}'>
                                                <input type='hidden' id='itemId' name='itemId' value=''>
                                                <button id='delReview' type='submit' onclick={qsIdSend()}>X</button>
                                                </form>
                                            </li>
                                        </ul>";
                                    }else {
                                        echo "<ul>
                                                <li>{$row2['id']}</li>
                                                <li class='reviewId'>{$row2['userid']}<span>{$row2['date']}</span></li>
                                                <li><span>{$row2['reviewstar']}</span></li>
                                                <li>{$row2['reviewdesc']}</li>
                                                <li><img src='/php/ReHome/images/{$row2['reviewimg']}'></li>
                                            </ul>";
                                }
                            }
                        }
                        printList();
                    ?>
                </div>
            </article>
        </div>
    </article>
</section>
</main>
<script>
    //*리뷰 삭제하기 -> 아이템아이디로 가게
    const delReview = document.querySelector("#delReview");
    // delReview.addEventListener('click',()=>{     //addEventListener 오류뜸  --> onClick으로 바로 넣어주기
    //     qsIdSend();
    // })

    function qsIdSend(){
        const qsId = window.location.search;
        const itemId = document.querySelector("#itemId");
        itemId.value = qsId;
    };
    
    // //장바구니&바로구매 컨펌
    // function cartConfirm(){
    //     window.confirm("장바구니로 바로 가시겠습니까?");
    // }
    function cartLogin(){
        alert('로그인 후 이용해주세요.');
        location.replace('/php/ReHome/member/login.php');
    };

    //*리뷰 - '사진추가' label 글자수정
    const fileOnChange = ()=>{
        const reviewFile = document.querySelector("#reviewFile");
        const photoFile = document.querySelector("#photofile");
        // console.log(reviewFile.files);
        console.log(reviewFile.files[0].name);
            if(reviewFile.files[0].name){
                photoFile.innerHTML = reviewFile.files[0].name;
            }else{
                photoFile.innerHTML = "사진추가";
            };
    };
</script>
<?php include_once 'include/footer.php' ?>