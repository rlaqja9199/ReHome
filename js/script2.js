let slideGroup = document.querySelector('#slide_group');
let prevBtn = document.querySelector('.prev');
let nextBtn = document.querySelector('.next');
let lastImg = slideGroup.lastElementChild;
let firstImg = slideGroup.firstElementChild;
let cloneFirst = firstImg.cloneNode(true);
let cloneLast = lastImg.cloneNode(true);

//메인화면 슬라이드
slideGroup.append(cloneFirst);
slideGroup.prepend(cloneLast);


let prev;
let next;
let current = 0;
let slideImgs = document.querySelectorAll('.slide_img');
let designImgs = document.querySelectorAll('.design_img');


slideGroup.style.width = (slideImgs.length) * 100 + '%';
slideGroup.style.left = -((current) * 100) + '%';
slideImgs.forEach((img,index) => {
    img.style.width = (100 / slideImgs.length) + '%';
    img.style.left = (index * (100/slideImgs.length)) + '%';
})
designImgs.forEach((img,index) => {
    img.style.left = (index * (100/designImgs.length)) + '%';
})


function slideMove(imgNum) {
    current = imgNum;
    slideGroup.style.transition = '0.5s';
    slideGroup.style.transform = `translate3d(${-(imgNum*100)/slideImgs.length}%,0,0)`;
    if(imgNum == slideImgs.length-1) {
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
        slideMove(current);
        current = current+1
    },3000)
}

function stopIt() {
    clearInterval(timer);
}
startIt();

function firstCurrent() {
    setTimeout(function(){
        slideGroup.style.transition = '0s';
        slideGroup.style.transform = `translate3d(${-100/slideImgs.length}%,0,0)`;
        current = 1;
    },500)
}

function lastCurrent() {
    setTimeout(function(){
        slideGroup.style.transition = '0s';
        slideGroup.style.transform = `translate3d(${-(100/slideImgs.length)*(slideImgs.length-2)}%,0,0)`;
        current = slideImgs.length-2;
    },500)
}

let canSlide = true;
prevBtn.addEventListener('mouseenter', stopIt);
prevBtn.addEventListener('mouseleave',startIt);
prevBtn.addEventListener('click', function(e) {
    e.preventDefault();
    if(canSlide === true){
        current = current - 1;
        prev = current;
        slideMove(prev);
        canSlide = false;
        setTimeout(() => {
            canSlide = true;
        }, 500);
    }
    console.log(canSlide)
    return current, canSlide;
})

nextBtn.addEventListener('mouseenter', stopIt);
nextBtn.addEventListener('mouseleave', startIt);
nextBtn.addEventListener('click', function(e) {
    e.preventDefault();
    if(canSlide === true){
        current = current + 1;
        next = current
        slideMove(next);
        canSlide = false;
        setTimeout(() => {
            canSlide = true;
        }, 500);
    }
    return current, canSlide;
})