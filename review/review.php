<?php include_once '../include/header.php' ?>
<?php
    // $conn = mysqli_connect('localhost','root','3693','rehome');
    // $conn = mysqli_connect('localhost','root','1234','rehome');
    $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
    $query = "select * from review";
    $result = mysqli_query($conn,$query);

?>
            <section>
                <article id="review_contents"> 
                <p class="innerRoad">HOME > REVIEW</p>
                    <div id="review">
                        <h3>Review 작성하기</h3>
                        <form action="/php/ReHome/review/review_process.php" method="post" enctype="multipart/form-data">
                            <textarea name="reviewdesc" id="reviewdesc" cols="30" rows="10" placeholder="상품후기 작성하기"></textarea>
                            <ul id="reviewBtns">
                                <li>
                                    <input type="file" name="reviewimg" value="reviewimg" required style="position:absolute; opacity:0;">
                                    <input type="hidden" name="userid" value="<?=$_SESSION['userId']?>">
                                    <label id="photofile">사진추가</label>
                                </li>
                                <li>
                                    <select name="reviewstar" id="reviewstar">
                                        <option value="★★★★★">★★★★★</option>
                                        <option value="★★★★">★★★★</option>
                                        <option value="★★★">★★★</option>
                                        <option value="★★">★★</option>
                                        <option value="★">★</option>
                                    </select>
                                </li>
                                <li>
                                    <input type="hidden" name="id">
                                    <button id="reviewBtn" type="submit">리뷰등록</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div id="reviewText">
                        <h3>Review</h3>
                        <?php
                            function printList() {
                                global $result;
                                while($row = mysqli_fetch_array($result)) {
                                    echo "<ul>
                                            <li>{$row['id']}</li>
                                            <li>{$row['userid']}</li>
                                            <li><span>{$row['reviewstar']}</span></li>
                                            <li>{$row['reviewdesc']}</li>
                                            <li><img src='/php/ReHome/images/{$row['reviewimg']}'></li>
                                            <li>
                                                <form action='/php/ReHome/review/review_delete_process.php' method='post'>
                                                    <input type='hidden' name='id' value='{$row['id']}'>
                                                    <button type='submit'>X</button>
                                                </form>
                                            </li>
                                        </ul>";
                                }
                            }
                            printList()
                        ?>
                    </div>
                </article>
            </section>
        </main>
<?php include_once '../include/footer.php' ?>