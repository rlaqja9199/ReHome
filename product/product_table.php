<?php include_once '../include/header.php' ?>
<?php
    function printList(){
            // $conn = mysqli_connect('localhost','root','3693','rehome');
            // $conn = mysqli_connect('localhost','root','1234','rehome');
            $conn = mysqli_connect('localhost','cathkid','dothome##3693','cathkid');
            $query = "select * from bestitem where category='table' or name1 Like'%식탁%' or name1 Like '%테이블%' or name1 Like '%데스크%' order by id desc";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
                $numRow = number_format($row['saleprice']);
                echo "<li><a href='/php/ReHome/bestItem_detail.php?id={$row['id']}'>
                <div class='hideImg'><img src='/php/ReHome/images/{$row['imgsrc']}'></div>
                <div class='text'>
                    <h4 class='h4Category'>{$row['brand']}
                    <input type='hidden' class='getCategory' name='category' value={$row['category']}></h4>
                    <p>{$row['name1']}</p>
                    <p>{$row['name2']}</p>
                    <p class='price'>{$numRow}원<span>{$row['price']}</span></p>
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
        <script>
            //제품 뉴&베스트아이템 카테고리 이미지 추가
            const getCategory = document.querySelectorAll('.getCategory');
            const h4Category = document.querySelectorAll('.h4Category');
            const brand = "<?php echo $brand; ?>";

            const categoryIcon = ()=>{
                for(let i=0; i<getCategory.length; i++){
                    console.log(getCategory[i].value);
                    if(getCategory[i].value === 'new'){
                        // const newCategory = document.createElement('span');
                        // h4Category.appendChild(newCategory);
                        // newCategory.className = "newItem";
                        // newCategory.innerHTML = "NEW"

                        // h4Category[i].innerHTML = `${brand}<span class='newItem'>NEW</span>`;
                        h4Category[i].innerHTML = "ReHome <span class='newItem'>NEW</span>";
                    }else if(getCategory[i].value === 'bestItem'){
                        const bestCategory = document.createElement('span');
                        // h4Category.appendChild(bestCategory);
                        // bestCategory.className = 'orderEx';
                        h4Category[i].innerHTML = "ReHome <span class='orderEx'><img src='/php/ReHome/images/orderExploding.png'></span>";
                    }
                }
            }
            window.onload(categoryIcon());
        </script>
<?php include_once '../include/footer.php' ?>