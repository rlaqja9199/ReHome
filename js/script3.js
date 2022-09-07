const subPrice = document.querySelector('#subPrice');
const saleValue = document.querySelector('#productPrice');
const totalPrice = document.querySelector('#totalPrice');
const cartBtn = document.querySelector('#cartBtn');
const subMoney = document.querySelector('#cPrice');
let cAmount = document.querySelector('#cAmount');

// 결과를 표시할 element
// const resultElement = document.getElementById('result');
const resultElement = document.querySelector('#goods_amount');
// 현재 화면에 표시된 값
// let number = resultElement.innerText;
let number = resultElement.value;


function count(type)  {
    
    
    // 더하기/빼기
    if(type === 'plus') {
      number = parseInt(number) + 1;
    }else if(type === 'minus')  {
        if(number < 1){
            number = number;
        }else{
            number = parseInt(number) - 1;
        }
    }
    
    // 결과 출력
    // resultElement.innerText = number;
    resultElement.value = number;

    let sPrice = parseInt(saleValue.value);
    // cAmount.value = parseInt(saleValue.value);

    cAmount.value = number;

    console.log(`cAmount의 밸류는${cAmount.value}`);

    totalPrice.innerHTML =`${(sPrice*number).toLocaleString("ko-KR")}원`
    subMoney.value = `${(sPrice*number).toLocaleString("ko-KR")}`;
    return cAmount;
}







// var sell_price;
// var amount;

// function init () {
// 	sell_price = document.form.sell_price.value;
// 	amount = document.form.amount.value;
// 	document.form.sum.value = sell_price;
// 	change();
// }

// function add () {
// 	hm = document.form.amount;
// 	sum = document.form.sum;
// 	hm.value ++ ;

// 	sum.value = parseInt(hm.value) * sell_price;
// }

// function del () {
// 	hm = document.form.amount;
// 	sum = document.form.sum;
// 		if (hm.value > 1) {
// 			hm.value -- ;
// 			sum.value = parseInt(hm.value) * sell_price;
// 		}
// }

// function change () {
// 	hm = document.form.amount;
// 	sum = document.form.sum;

// 		if (hm.value < 0) {
// 			hm.value = 0;
// 		}
// 	sum.value = parseInt(hm.value) * sell_price;
// }  
