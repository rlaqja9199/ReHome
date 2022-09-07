const nav = document.querySelector('nav');
const pageUp = document.querySelector('#pageUp');
const pageDown = document.querySelector('#pageDown');
const wrap = document.getElementById("wrap");
const loading = document.querySelector(".loadingio-spinner-pulse-m0y2l903lfs");
const priceCom = document.querySelector(".price");

// 화면 최상단/최하단 보내기
pageUp.addEventListener('click', ()=>{
    scrollTo(0,0);
    nav.style.top = "78px";
})
pageDown.addEventListener('click', ()=>{
    scrollTo(0,document.body.scrollHeight);
})

// 메뉴탭 스크롤시
window.addEventListener('scroll', ()=>{
    console.log(window.scrollY)
    if(scrollY < 1){
        nav.classList.remove('on')
    }else if(scrollY < 80){
        nav.style.top = `${80-scrollY}px`
        nav.classList.add('on')
    }else{
        nav.style.top = `0`
    }
})


//로딩화면
setTimeout(() => {
    loading.style.display = "none";
    wrap.style.display = "block";
    wrap.style.opacity = "1";
    wrap.style.transition = "0.3s";
}, 500);
// window.onload= function(){
//     loading.style.display = "none";
//     wrap.style.display = "block";
//     wrap.style.opacity = "1";
//     wrap.style.transition = "0.3s";
// }


//금액 단위
parseInt(priceCom.innerHTML).toLocaleString('ko-KR')