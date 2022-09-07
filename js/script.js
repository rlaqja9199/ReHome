const wrap = document.getElementById("wrap");
const loading = document.getElementsByClassName("loadingio-spinner-pulse-m0y2l903lfs");
const nav = document.querySelector('nav');
let slideGroup = document.querySelector('#slide_group');
let prevBtn = document.querySelector('.prev');
let nextBtn = document.querySelector('.next');
let lastImg = slideGroup.lastElementChild;
let firstImg = slideGroup.firstElementChild;
let cloneFirst = firstImg.cloneNode(true);
let cloneLast = lastImg.cloneNode(true);
const pageUp = document.querySelector('#pageUp');
const pageDown = document.querySelector('#pageDown');

//최상단/ 최하단 보내기
pageUp.addEventListener('click',()=>{
    scrollTo(0,0);
})
pageDown.addEventListener('click',()=>{
    scrollTo(0,document.body.scrollHeight);
    // document.body.scrollTop = document.body.scrollHeight;
})

//슬라이더
slideGroup.append(cloneFirst);
slideGroup.prepend(cloneLast);

window.addEventListener('scroll', ()=>{
    console.log(window.scrollY)
    if(scrollY < 1){
        nav.classList.remove('on');
        
    }else if(scrollY < 80){
        nav.style.top = `${80-scrollY}px`;
        nav.classList.add('on');
    }else {
        nav.style.top = `0`;
    }
})

let prev;
let next;
let current = 1;
let slideImgs = document.querySelectorAll('.slide_img');



slideGroup.style.width = (slideImgs.length) * 100 + '%';
slideGroup.style.left = -(current * 100) + '%';
slideImgs.forEach((img,index) => {
    img.style.width = (100 / slideImgs.length) + '%';
    img.style.left = (index * (100/slideImgs.length)) + '%';
})

function slideMove(imgNum) {
    slideGroup.style.transition = '0.5s';
    slideGroup.style.left = -(imgNum*100) + '%';
    current = imgNum;
    if(imgNum == 4) {
        firstCurrent();
    }
    if(imgNum == 0) {
        lastCurrent();
    }
}
let timer;
function startIt() {
    if(timer) stopIt();
    timer = setInterval(function(){
        slideMove(current+1);
    },3000)
}

function stopIt() {
    clearInterval(timer);
}
startIt();

function firstCurrent() {
    setTimeout(function(){
        slideGroup.style.transition = '0s';
        slideGroup.style.left = -(0*100) + '%';
        current = 0;
    },500)
}

function lastCurrent() {
    setTimeout(function(){
        slideGroup.style.transition = '0s';
        slideGroup.style.left = -(400) + '%';
        current = 4;
    },500)
}

const a = true;

prevBtn.addEventListener('mouseenter', stopIt);
prevBtn.addEventListener('mouseleave',startIt);
prevBtn.addEventListener('click', function(e) {
    e.preventDefault();
    if(a === true){
        prev = current - 1;
        slideMove(prev);
        a = false
        setTimeout(() => {
            a = true
        }, 500);
    }
    console.log(a);
    return a;
})

nextBtn.addEventListener('mouseenter', stopIt);
nextBtn.addEventListener('mouseleave', startIt);
nextBtn.addEventListener('click', function(e) {
    e.preventDefault();
    next = current + 1;
    slideMove(next);
})


setTimeout(() => {
    loading.style.display = "none";
    wrap.style.display = "block";
    wrap.style.opacity = "1";
    wrap.style.transition = "0.3s";
}, 1000);