<?php include_once '../include/header.php' ?>
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
                                <li><a href="./about_qualityStory.php">품질스토리</a></li>
                            </ul>
                        </li>
                        <li class="menuList">
                            <h3>
                                <a href="">PRODUCT</a>
                            </h3>
                            <ul class="hideMenu">
                                <li><a href="/php/ReHome/product/product_table.php">TABLE</a></li>
                                <li><a href="/php/ReHome/product/product_chair.php">CHAIR</a></li>
                                <li><a href="/php/ReHome/product/product_bed.php">BED</a></li>
                            </ul>
                        </li>
                        <li class="menuList">
                            <h3>
                                <a href="">INTERIOR DESIGN</a>
                            </h3>
                            <ul class="hideMenu">
                                <li><a href="#">Living Room</a></li>
                                <li><a href="#">Bathroom</a></li>
                                <li><a href="#">kitchen</a></li>
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
                    <li><a href="#">
                        <img src="/php/ReHome/images/best1.jpg" alt="">
                    </a></li>
                    <li><a href="#">
                        <img src="/php/ReHome/images/best2.jpeg" alt="">
                    </a></li>
                    <li><a href="#">
                        <img src="/php/ReHome/images/best3.jpg" alt="">
                    </a></li>
                </ul>
                <div>
                    <button id="pageUp" style="font-size:24px"><i class="fa fa-angle-double-up"></i></button>
                    <button id="pageDown" style="font-size:24px"><i class="fa fa-angle-double-down"></i></button>
                </div>
            </aside>
            <section>
                <p class="innerRoad">HOME > ABOUT > 품질스토리</p>
                <article id="greetings">
                    
                </article>
            </section>
        </main>
<?php include_once '../include/footer.php' ?>