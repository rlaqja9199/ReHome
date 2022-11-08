<?php include_once '../include/header.php' ?>
<?php 
    // echo "id 는 ".$userid."입니다.";
    echo "id 는 ".$_SESSION['userId']."입니다.";
    if(isset($_SESSION['userId'])){
        echo "안녕하세요";
    }
    $userid = $_SESSION['userId'];
    echo $userid;
    // $conn = mysqli_connect('localhost', 'root', '3693', 'rehome');
    // $conn = mysqli_connect('localhost', 'root', '1234', 'rehome');
    $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
    $query = "select * from cart where userid='$userid'";
    echo $query;
    $result = mysqli_query($conn, $query);
?>
<!-- 
<?php
    // $conn = mysqli_connect('localhost', 'root', '1234', 'rehome');
    // $query = "select * from cart where userid=$userid;";
    // $query2 = "select * from cart where id={$_GET['id']}";
    // $query3 = "select title, bestitem.id from cart
    //             inner join bestitem
    //             on cart.title = bestitem.name1;";
    // $result = mysqli_query($conn, $query);
    // $result2 = mysqli_query($conn, $query2);
    // $result3 = mysqli_query($conn, $query3);
    // //$row = mysqli_fetch_array($result);
    // $row3 = mysqli_fetch_array($result3);
?> -->
        <section>
            <p class="innerRoad">HOME > PRODUCT > CART</p>
            <article id="cart_contents">
                <div id="cart">
                    <h2>CART</h2>            
                        <table>
                            <tr>
                                <th></th>
                                <th>상품명/선택사항</th>
                                <th>수량</th>
                                <th>적립금액</th>
                                <th>상품금액</th>
                                <th>배송비</th>
                                <th></th>
                            </tr>
                            <?php
                                function printList() {
                                    global $result;
                                    global $row;
                                    while($row = mysqli_fetch_array($result)) {
                                        $numRow = number_format($row['savedmoney']);
                                        $numRow2 = number_format($row['price']);
                                        echo "<tr>
                                                <td><input type='checkbox' class='checkBox' checked/></td>
                                                <td><a href='http://cathkid.dothome.co.kr/ReHome/bestItem_detail.php?id={$row['id']}'>{$row['title']}</a></td>
                                                <td>{$row['amount']}</td>
                                                <td>{$numRow}</td>
                                                <td class='priceCheck'>{$numRow2}</td>
                                                <td>{$row['delivery']}</td>
                                                <td> 
                                                <form action='http://cathkid.dothome.co.kr/ReHome/process/cart_delete_process.php' method='post'>                                  
                                                    <input type='hidden' name='id' value='{$row['id']}'>
                                                    <input type='hidden' name='number' value='{$row['number']}'>
                                                    <button type='submit' id='deleteBtn'>삭제</button>
                                                </form>
                                            </td>
                                            </tr>";
                                    }
                                }                  
                                printList()
                            ?>    
                        </table>
                        <form action='http://cathkid.dothome.co.kr/ReHome/process/cart_all_delete_process.php' method='post'>
                            <input type='hidden' name='userid' value="<?=$row['userid']?>">
                            <button type='submit' id="allDelete">전체삭제</button>
                        </form>
                        <div id="cart_text">  
                            <p>※ 50,000원 이상시 배송비 무료</p>
                            <p>※ 장바구니에 담긴 상품은 7일간 보관됩니다. (해당 기간안에 품절된 경우는 리스트만 유지되며, 주문은 되지 않습니다.)</p>      
                            <p>※ 할인이 적용되는 경우 실제 상품가와 판매가가 노출되며, 적립금은 실 판매가에 따라 적용됩니다.</p>
                            <p>※ 비회원의 경우 장바구니에 담긴 상품은 브라우저 종료 시 자동으로 삭제되오니, 장기간 보관하시려면 회원가입을 해주세요.</p>               
                        </div> 
                        <div id="cart_price">
                            <ul>
                                <li>상품금액</li>
                                <li>+</li>
                                <li>배송비</li>
                                <li>=</li>
                                <li>전체금액</li>
                            </ul>
                            <ul>
                                <li id="totalP"></li>
                                <li>0원</li>
                                <li id="subP"></li>
                            </ul>
                        </div>
                    <div id="cart_btns">
                        <ul>
                            <li><a href="http://cathkid.dothome.co.kr/ReHome/index.php"><button>계속쇼핑</button></a></li>
                            <li><a href="#"><button type="submit">주문하기</button></a></li>
                        </ul>
                    </div>
                </div>
            </article>
        </section>
    </main>
    <script>
        const priceCheck= document.querySelectorAll('.priceCheck');
        const totalP = document.querySelector('#totalP');
        const subP = document.querySelector('#subP');
        // console.log(priceCheck);
        let pTotal=0;
        function a(){
            for(i=0; i<priceCheck.length; i++){
                // console.log(priceCheck[i].innerText.replace(',',''));
                // console.log(typeof(Number(priceCheck[i].innerText)));
                // pTotal = pTotal + Number(priceCheck[i].innerText.replace(',',''));
                pTotal = pTotal + Number(priceCheck[i].innerText.replace(/,/ig,''));
                // console.log(pTotal);
            }
            return pTotal;
        }
        a();
        totalP.innerHTML = `${pTotal.toLocaleString('ko-KR')}`;
        subP.innerHTML = `${pTotal.toLocaleString('ko-KR')}`;
    </script>
<?php include_once '../include/footer.php' ?>