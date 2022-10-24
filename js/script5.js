//회원가입 js
const joinInput = document.querySelectorAll(".joinInput");
const hideText = document.querySelectorAll(".hideText");


for(let i=0; i<joinInput.length; i++){
    joinInput[i].addEventListener("focus",(e)=>{
        e.target.style.border = "1px solid #ed4300"
        if(hideText[i]){
            hideText[i].style.opacity = "1"
            hideText[i].style.transition = "0.3s"
            
        }
    });
    joinInput[i].addEventListener("blur",(e)=>{
        e.target.style.border = "1px solid #333"
        if(hideText[i]){
            hideText[i].style.opacity = "0"
            hideText[i].style.transition = "0s"
        }
    });
};

