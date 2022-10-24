<?php include_once '../include/header.php' ?>
        <section>
            <p class="innerRoad">HOME > PRODUCT > LOGIN</p>
            <article id="login_contents">
                <h2>LOGIN</h2>
                <form action="/php/ReHome/process/login_process.php" method="post">
                    <p>아이디와 비밀번호를 입력해주세요.</p>
                    <p><input type="text" placeholder="아이디" name="userId"></p>
                    <p><input type="password" placeholder="비밀번호" name="userPw"></p>
                    <p><input type="checkbox">보안접속</p>
                    <button type="submit">LOGIN</button>
                </form>
                <ul>
                    <li><a href="/php/ReHome/member/join.php">회원가입</a></li>
                    <li><a href="#">아이디/비밀번호 찾기</a></li>
                    <li><a href="#">비회원 주문조회</a></li>
                </ul>
                <ul id="sns_login">
                    <li><a href="#"><img src="/php/ReHome/images/naverlogin.jpg" alt=""></a></li>
                    <li><a href="#"><img src="/php/ReHome/images/facebooklogin.jpg" alt=""></a></li>
                    <li><a href="#"><img src="/php/ReHome/images/kakaologin.jpg" alt=""></a></li>
                </ul>
            </article>
        </section>
    </main>
<?php include_once '../include/footer.php' ?>