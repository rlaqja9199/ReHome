<?php include_once '../include/header.php' ?>
        <section>
            <p class="innerRoad">HOME > PRODUCT > JOIN</p>
            <article id="join_contents">
                <h2>JOIN</h2>
                <form action="/php/ReHome/process/join_process.php" method="post">
                    <div>
                        <ul>
                            <li>
                                <h3><span>*</span>이름</h3>
                                <input id="nameee" class="joinInput" type="text" name="userName" placeholder="이름을 입력하세요." >
                                <p class="hideText" >이름을 입력해주세요.</p>
                            </li>
                            <li>
                                <h3><span>*</span>아이디</h3>
                                <input class="joinInput" type="text" name="userId" placeholder="5~12자의 영문,숫자 사용가능" >
                                <p class="hideText" >아이디를 입력해주세요.</p>
                            </li>
                            <li>
                                <h3><span>*</span>비밀번호</h3>
                                <input class="joinInput" type="password" name="userPw" placeholder="8자 이상의 영문,숫자,특수문자 중 2가지 이상 혼합" >
                                <p class="hideText" >비밀번호를 입력해주세요.</p>
                            </li>
                            <li>
                                <h3><span>*</span>비밀번호 체크</h3>
                                <input class="joinInput" type="password" name="userPwCh" placeholder="입력하신 비밀번호를 다시 한번 입력해주세요." >
                                <p class="hideText" >비밀번호 체크를 입력해주세요.</p>
                            </li>
                            <li>
                                <h3><span>*</span>이메일</h3>
                                <input class="joinInput" type="email" name="userEmail" placeholder="반드시 사용 중이신 메일을 @ 형식으로 입력하세요." >
                                <p class="hideText" >이메일을 입력해주세요.</p>
                            </li>
                            <li>
                                <h3><span>*</span>휴대폰번호</h3>
                                <input class="joinInput" type="text" name="userNumber" placeholder="'-'없이 숫자만 입력해주세요." >
                                <p class="hideText" >휴대폰 번호를 입력해주세요.</p>
                            </li>
                            <li>
                                <h3><span>*</span>주소</h3>
                                <div id="addrFind">
                                    <input class="joinInput" type="text" id="sample6_postcode" placeholder="우편번호" name="addr1">
                                    <input type="button" onclick="sample6_execDaumPostcode()" value="우편번호 찾기"><br>
                                    <input class="joinInput" type="text" id="sample6_address" placeholder="주소" name="addr2_1"><br>
                                    <input class="joinInput" type="text" id="sample6_detailAddress" placeholder="상세주소" name="addr2_2">
                                    <input class="joinInput" type="text" id="sample6_extraAddress" placeholder="참고항목" name="addr2_3">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- <table>
                        <tr>
                            <th><span>*</span>이름</th>
                            <td><input type="text" name="userName"></td>
                        </tr>
                        <tr>
                            <th><span>*</span>아이디</th>
                            <td><input type="text" name="userId"></td>
                        </tr>
                        <tr>
                            <th><span>*</span>비밀번호</th>
                            <td><input type="password" name="userPw"></td>
                        </tr>
                        <tr>
                            <th><span>*</span>비밀번호 체크</th>
                            <td><input type="password" name="userPwCh"></td>
                        </tr>
                        <tr>
                            <th><span>*</span>이메일</th>
                            <td><input type="email" name="userEmail"></td>
                        </tr>
                        <tr>
                            <th><span>*</span>휴대폰번호</th>
                            <td><input type="text" name="userNumber"></td>
                        </tr>
                        <tr>
                            <th><span>*</span>주소</th>
                            <td id="addrFind">
                                <input type="text" id="sample6_postcode" placeholder="우편번호" name="addr1">
                                <input type="button" onclick="sample6_execDaumPostcode()" value="우편번호 찾기"><br>
                                <input type="text" id="sample6_address" placeholder="주소" name="addr2_1"><br>
                                <input type="text" id="sample6_detailAddress" placeholder="상세주소" name="addr2_2">
                                <input type="text" id="sample6_extraAddress" placeholder="참고항목" name="addr2_3">
                            </td>
                        </tr>
                    </table> -->
                    <div id="joinBtn">
                        <button type="submit">회원가입</button>
                        <button type="reset">취소</button>
                    </div>
                </form>
            </article>
        <scection>
    </main>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script>
        function sample6_execDaumPostcode() {
            new daum.Postcode({
                oncomplete: function(data) {
                    // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                    // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                    // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                    var addr = ''; // 주소 변수
                    var extraAddr = ''; // 참고항목 변수

                    //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                    if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                        addr = data.roadAddress;
                    } else { // 사용자가 지번 주소를 선택했을 경우(J)
                        addr = data.jibunAddress;
                    }

                    // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                    if(data.userSelectedType === 'R'){
                        // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                        // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                        if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                            extraAddr += data.bname;
                        }
                        // 건물명이 있고, 공동주택일 경우 추가한다.
                        if(data.buildingName !== '' && data.apartment === 'Y'){
                            extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                        }
                        // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                        if(extraAddr !== ''){
                            extraAddr = ' (' + extraAddr + ')';
                        }
                        // 조합된 참고항목을 해당 필드에 넣는다.
                        document.getElementById("sample6_extraAddress").value = extraAddr;
                    
                    } else {
                        document.getElementById("sample6_extraAddress").value = '';
                    }

                    // 우편번호와 주소 정보를 해당 필드에 넣는다.
                    document.getElementById('sample6_postcode').value = data.zonecode;
                    document.getElementById("sample6_address").value = addr;
                    // 커서를 상세주소 필드로 이동한다.
                    document.getElementById("sample6_detailAddress").focus();
                }
            }).open();
        }
    </script>
<?php include_once '../include/footer.php' ?>