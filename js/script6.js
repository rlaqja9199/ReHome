//header - 로그인X -> cart 클릭시, 로그인 알람
const cartAlert = document.querySelector('#cartAlert');

cartAlert.addEventListener('click',()=>{
    alert('로그인 후 이용해주세요.');
});


// //모바일 메뉴
// const navAbout = document.getElementById("navAbout");
// const navProduct = document.getElementById("navProduct");
// const navInterior = document.getElementById("navInterior");

// const onClickNav = (e)=>{
//     const innerText = e.target.innerText;
//     if(innerText === "ABOUT"){
//         navAbout.style.display = "block";
//         navProduct.style.display = "none";
//         navInterior.style.display = "none";
//     }else if(innerText === "PRODUCT"){
//         navAbout.style.display = "none";
//         navProduct.style.display = "block";
//         navInterior.style.display = "none";
//     }else if(innerText === "INTERIOR DESIGN"){
//         navAbout.style.display = "none";
//         navProduct.style.display = "none";
//         navInterior.style.display = "block";
//     }
// }
// https://velog.io/@qeiqiem/JS-onclick-...-Uncaught-TypeError-Cannot-read-properties-of-undefined-reading-target