<?php include_once 'include/header.php' ?>
<?php 
    $conn = mysqli_connect('localhost','root','3693','rehome');   
    // $conn = mysqli_connect('localhost','root','1234','rehome');   
    // $conn = mysqli_connect('localhost','cathkid','rornfl*#3693','cathkid');      
    $query = "select * from bestitem where id={$_POST['id']}";     
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result); 
    echo $row;             
?>
<section>
            <p class="innerRoad">HOME > PRODUCT > EDIT</p>
            <article id="create_contents">
                <div id="create">
                    <h2>EDIT</h2>
                    <form action="/php/ReHome/process/item_edit_process.php" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>상품명</td>
                                <td>
                                    <input type="text" name="name1" required value="<?=$row['name1']?>">
                                    <input type="hidden" name="id" value="<?=$row['id']?>">
                                </td>
                            </tr>
                            <tr>
                                <td>상품명2</td>
                                <td><input type="text" name="name2" required value="<?=$row['name2']?>"></td>
                            </tr>
                            <tr>
                                <td>브랜드</td>
                                <td><input type="text" name="brand" required value="<?=$row['brand']?>"></td>
                            </tr>
                            <tr>
                                <td>카테고리</td>
                                <td class="categoryInput">
                                    <div>
                                        <input type="hidden" value="<?=$row['category']?>" id="categories">
                                        best_item<input type="radio" name="category" required value="bestItem" class="cateChecked">
                                        new<input type="radio" name="category" required value="new" class="cateChecked" >
                                        sale<input type="radio" name="category" required value="sale" class="cateChecked" >
                                        table<input type="radio" name="category" required value="table" class="cateChecked" >
                                        chair<input type="radio" name="category" required value="chair" class="cateChecked" >
                                        bed<input type="radio" name="category" required value="bed" class="cateChecked" >
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>이미지</td>
                                <td style="position: relative;" id="edit_img1">
                                    <input type="hidden" name="oldimg" value="<?=$row['imgsrc']?>">
                                    <input type="file" name="imgsrc" required style="position: absolute; left: -150px; opacity: 0;" onchange="imageChange(this)">
                                    <label class="file">파일선택</label>
                                    <label id="imglabel"><?=$row['imgsrc']?></label>
                                </td>
                            </tr>
                            <tr>
                                <td>소비자가격</td>
                                <td><input type="text" name="price" required value="<?=$row['price']?>" placeholder="xxx,xxx원 형태로 입력해주세요."></td>
                            </tr>
                            <tr>
                                <td>판매가격</td>
                                <td><input type="text" name="saleprice" required value="<?=$row['saleprice']?>" placeholder="숫자만 입력해주세요."></td>
                            </tr>
                            <tr>
                                <td>상품코드</td>
                                <td><input type="text" name="id" required value="<?=$row['id']?>" disabled></td>
                            </tr>
                            <tr>
                                <td>상세보기</td>
                                <td style="position: relative;" id="edit_img2">
                                    <input type="hidden" name="oldimg2" value="<?=$row['imgsrc2']?>">
                                    <input type="file" name="imgsrc2" required style="position: absolute; left: -150px; opacity: 0;" onchange="imageChange2(this)">
                                    <label class="file">파일선택</label>
                                    <label id="imglabel2"><?=$row['imgsrc2']?></label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit">수정</button>
                                    <button type="reset">취소</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </article>
        </section>
    </main>
    <script>
        function imageChange(input){
            if(input.value==""){
                document.querySelector('#imglabel').innerHTML = "선택파일없음";
            }else {
                let valArr = input.value.split('\\');      
                document.querySelector('#imglabel').innerHTML = valArr[valArr.length - 1];
            }
        }
        function imageChange2(e){
            if(e.value==""){
                document.querySelector('#imglabel2').innerHTML = "선택파일없음";
            }else {
                let valArr2 = e.value.split('\\');      
                document.querySelector('#imglabel2').innerHTML = valArr2[valArr2.length - 1];
            }
        }


        //카테고리 input checked
        const categories = document.querySelector('#categories');
        const cateChecked = document.querySelectorAll('.cateChecked');
        for(let i=0; i<cateChecked.length; i++){
            if(categories.value === cateChecked[i].value){
                cateChecked[i].checked = true;
            }
        }


    </script>
    <?php 
    echo $row; 
    ?>
<?php include_once 'include/footer.php' ?>