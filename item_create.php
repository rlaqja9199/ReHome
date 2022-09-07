<?php include_once 'include/header.php' ?>
<section>
            <p class="innerRoad">HOME > REGISTRATION</p>
            <article id="create_contents">
                <div id="create">
                    <h2>REGISTRATION</h2>
                    <form action="process/item_create_process.php" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>상품명</td>
                                <td><input type="text" name="name1" required ></td>
                            </tr>
                            <tr>
                                <td>브랜드</td>
                                <td><input type="text" name="brand" required ></td>
                            </tr>
                            <tr>
                                <td>이미지</td>
                                <td><input type="file" name="imgsrc" required ></td>
                            </tr>
                            <tr>
                                <td>소비자가격</td>
                                <td><input type="text" name="price" required ></td>
                            </tr>
                            <tr>
                                <td>판매가격</td>
                                <td><input type="text" name="saleprice" required></td>
                            </tr>
                            <tr>
                                <td>상품코드</td>
                                <td><input type="text" name="id"></td>
                            </tr>
                            <tr>
                                <td>상세보기</td>
                                <td><input type="file" name="imgsrc2" required></td>
                            </tr>
                            <tr>
                                <td>상품명2</td>
                                <td><input type="text" name="name2" required ></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit">상품등록</button>
                                    <button type="reset">취소</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </article>
        </section>
    </main>
<?php include_once 'include/footer.php' ?>