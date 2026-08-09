const base = location.hostname === '127.0.0.1' || location.hostname === 'localhost' ? '' : '/ReHome';
const href = (path) => `${base}/${path}`;
const image = (name) => href(`images/${name}`);
const CART_KEY = 'rehome-original-cart-v1';

const categoryImages = {
  table: ['table1.jpg','table2.jpg','table3.jpg','table4.jpg','table5.jpg','table6.jpg','table7.jpg','table8.jpg','table9.jpg'],
  chair: ['chair1.jpg','chair2.jpg','chair3.jpg','chair4.jpg','chair5.jpg','chair6.jpg','chair7.jpg','chair8.jpg','chair9.jpg'],
  bed: ['bed1.jpg','bed3.jpg','bed4.jpg','bed5.jpg','bed6.jpg','bed7.jpg','bed8.jpg','bed9.jpg','best11.png']
};
const names = {
  table: ['오크 원형 테이블','모던 다이닝 테이블','내추럴 사이드 테이블','월넛 라운드 테이블','리빙 소파 테이블','아일랜드 테이블','스퀘어 테이블','익스텐션 테이블','클래식 다이닝 테이블'],
  chair: ['패브릭 라운지 체어','오크 다이닝 체어','모던 암체어','라탄 라운지 체어','컴포트 체어','우드 스툴','커브드 체어','패브릭 소파 체어','클래식 체어'],
  bed: ['호텔형 프레임','원목 침대 프레임','패브릭 베드','수납형 침대','저상형 베드','오크 베드 프레임','모던 침대 프레임','라운드 패브릭 베드','클래식 베드']
};
const products = Object.entries(categoryImages).flatMap(([category, files], group) => files.map((file, index) => ({
  id: `${category}-${index + 1}`, category, image: file, detail: file.replace(/\.(jpg|jpeg|png)$/i, '_detail.$1'), brand: 'ReHome', name: names[category][index], subtitle: '일상에 편안함을 더하는 리홈 컬렉션', price: 328000 + group * 110000 + index * 73000, originalPrice: 428000 + group * 120000 + index * 83000
})));

const readCart = () => { try { return JSON.parse(localStorage.getItem(CART_KEY)) || []; } catch { return []; } };
const writeCart = (cart) => { localStorage.setItem(CART_KEY, JSON.stringify(cart)); updateCartCount(); };
const updateCartCount = () => {
  const count = readCart().reduce((sum, item) => sum + item.quantity, 0);
  document.querySelectorAll('[data-cart-count]').forEach(node => node.textContent = count);
};

const header = `
<header class="static-header"><div class="inner"><h1><a href="${href('index.html')}"><img class="brand-logo" src="${image('wLogo.png')}" alt="ReHome"></a></h1><ul class="header-actions"><li><a href="${href('index.html')}">LOGIN</a></li><li><a href="${href('index.html')}">JOIN</a></li><li><a href="${href('cart.html')}">CART <span class="cart-count" data-cart-count>0</span></a></li><li><form data-search-form><div class="searchDiv"><input type="search" name="searchValue" aria-label="상품 검색"><button class="searchBtn" aria-label="검색"><img src="${image('search-icon.png')}" alt=""></button></div></form></li></ul></div></header>
<nav class="static-nav"><div class="inner"><ul id="navBar">
  <li class="menuList"><h3><a href="${href('index.html')}">ABOUT</a></h3><ul class="hideMenu"><li><a href="${href('index.html')}">인사말</a></li><li><a href="${href('index.html')}">브랜드소개</a></li></ul></li>
  <li class="menuList"><h3><a href="${href('products.html?category=table')}">PRODUCT</a></h3><ul class="hideMenu"><li><a href="${href('products.html?category=table')}">TABLE</a></li><li><a href="${href('products.html?category=chair')}">CHAIR</a></li><li><a href="${href('products.html?category=bed')}">BED</a></li></ul></li>
  <li class="menuList"><h3><a href="${href('index.html')}">INTERIOR DESIGN</a></h3><ul class="hideMenu"><li><a href="${href('index.html')}">Living Room</a></li><li><a href="${href('index.html')}">Bed Room</a></li><li><a href="${href('index.html')}">Kitchen</a></li></ul></li>
  <li class="menuList"><h3><a href="${href('index.html')}">EVENT</a></h3></li><li class="menuList"><h3><a href="${href('index.html')}">CS CENTER</a></h3></li>
</ul></div></nav>`;
const footer = `<footer class="static-footer"><div id="top_footer"><div class="inner"><ul><li><a href="#">회사소개</a></li><li id="bar"><a href="#">이용안내</a></li><li><a href="#">이용약관</a></li><li><a href="#">개인정보취급방침</a></li></ul><ul id="footer_sns"><li>인스타그램</li><li>블로그</li><li>페이스북</li><li>유튜브</li></ul></div></div><div id="bottom_footer"><div class="inner"><div id="left"><h1><img src="${image('bLogo.png')}" alt="ReHome"></h1><p>상호명 : 주식회사 리홈코리아 · 대표자 : 김범</p><p>대표전화 : 1544-6400 · 팩스 : 032-123-1234</p><p>주소 : 인천광역시 남동구 그린컴퓨터</p><p>Copyright 2022 ReHome. All rights reserved.</p></div><div id="right"><p>CUSTOMER CENTER</p><p id="bold">1544-1234</p><p>MON-FRI 09:00 ~ 17:00</p></div></div></div></footer>`;

document.querySelectorAll('[data-rehome-header]').forEach(node => node.innerHTML = header);
document.querySelectorAll('[data-rehome-footer]').forEach(node => node.innerHTML = footer);
updateCartCount();

const card = (product, badge = '') => `<li><a href="${href(`detail.html?id=${product.id}`)}"><div class="hideImg"><img src="${image(product.image)}" alt="${product.name}"></div><div class="text"><h4>${product.brand}${badge}</h4><p>${product.name}</p><p>${product.subtitle}</p><p class="price">${product.price.toLocaleString('ko-KR')}원 <span>${product.originalPrice.toLocaleString('ko-KR')}원</span></p></div></a></li>`;

const renderHome = () => {
  const best = products.slice(0, 9); const newest = products.slice(9, 18); const sale = products.slice(18, 27);
  document.querySelector('[data-products="best"]').innerHTML = best.map(item => card(item, `<span class="orderEx"><img src="${image('orderExploding.png')}" alt=""></span>`)).join('');
  document.querySelector('[data-products="new"]').innerHTML = newest.map(item => card(item, '<span class="newItem">NEW</span>')).join('');
  document.querySelector('[data-products="sale"]').innerHTML = sale.map(item => card(item)).join('');
  document.querySelector('.review-static').innerHTML = Array.from({length:8}, (_,i) => `<li><a href="${href(`detail.html?id=${products[i].id}`)}"><img src="${image(`bestreview${i+1}.png`)}" alt="BEST REVIEW ${i+1}"><h4>ReHome BEST REVIEW</h4><p>리홈과 함께 완성한 공간입니다.</p></a></li>`).join('');
  const slides = [...document.querySelectorAll('.slide_img')]; let current = 0;
  const show = (next) => { slides[current].classList.remove('is-active'); current = (next + slides.length) % slides.length; slides[current].classList.add('is-active'); };
  document.querySelector('.next').addEventListener('click', e => { e.preventDefault(); show(current + 1); });
  document.querySelector('.prev').addEventListener('click', e => { e.preventDefault(); show(current - 1); });
  setInterval(() => show(current + 1), 4500);
};

const renderProducts = () => {
  const category = new URLSearchParams(location.search).get('category') || 'table';
  document.body.dataset.category = category;
  document.querySelectorAll('[data-category-title]').forEach(node => node.textContent = category.toUpperCase());
  document.querySelector('[data-category-products]').innerHTML = products.filter(item => item.category === category).map(item => card(item)).join('');
};

const renderDetail = () => {
  const id = new URLSearchParams(location.search).get('id'); const product = products.find(item => item.id === id) || products[0];
  const detailFile = product.detail; const detailExists = ['best1_detail.jpg','best11_detail.png'].includes(detailFile) ? detailFile : product.image;
  document.querySelector('[data-product-detail]').innerHTML = `<table id="itemDetail"><tbody><tr><td><img class="detail-static-image" src="${image(detailExists)}" alt="${product.name}"></td><td><div id="detailText"><h3>${product.name}</h3><p>${product.subtitle}</p></div><div id="detailPrice"><ul><li>판매가</li><li>배송비</li><li>적립금</li></ul><ul><li id="productPrice">${product.price.toLocaleString('ko-KR')}원</li><li>무료배송</li><li>${Math.round(product.price * .01).toLocaleString('ko-KR')}원</li></ul></div><div id="detailSelect"><label for="detail-option">옵션</label><select id="detail-option"><option>기본 옵션</option><option>내추럴 오크</option><option>월넛</option></select></div><div class="quantity-row"><button type="button" data-qty-minus>−</button><input data-qty type="number" min="1" value="1"><button type="button" data-qty-plus>+</button></div><div id="buttons"><button id="cartBtn" type="button" data-add-cart>장바구니</button><button id="buyBtn" type="button" data-buy>구매하기</button></div></td></tr></tbody></table><div id="detailProduct"><ul><li>상품정보</li><li>배송정보</li><li>교환/반품</li><li>상품후기</li></ul><h3>PRODUCT DETAIL</h3><p>일상에 편안함을 더하는 ReHome의 가구 컬렉션입니다.</p><img src="${image(detailExists)}" alt="${product.name} 상세 이미지" style="width:100%"></div>`;
  const qty = document.querySelector('[data-qty]');
  document.querySelector('[data-qty-minus]').onclick = () => qty.value = Math.max(1, Number(qty.value) - 1);
  document.querySelector('[data-qty-plus]').onclick = () => qty.value = Number(qty.value) + 1;
  const add = (goCart) => { const cart = readCart(); const found = cart.find(item => item.id === product.id); if(found) found.quantity += Number(qty.value); else cart.push({...product, quantity:Number(qty.value)}); writeCart(cart); toast('장바구니에 담았습니다.'); if(goCart) location.href = href('cart.html'); };
  document.querySelector('[data-add-cart]').onclick = () => add(false); document.querySelector('[data-buy]').onclick = () => add(true);
};

const renderCart = () => {
  const root = document.querySelector('[data-cart-content]'); const cart = readCart();
  if (!cart.length) { root.innerHTML = `<div class="empty-cart"><p>장바구니에 담긴 상품이 없습니다.</p><p><a href="${href('products.html?category=table')}">상품 보러가기</a></p></div>`; return; }
  const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
  root.innerHTML = `<table><thead><tr><th>상품명 / 선택사항</th><th>수량</th><th>적립금액</th><th>상품금액</th><th>배송비</th><th></th></tr></thead><tbody>${cart.map(item => `<tr><td><a class="cart-product" href="${href(`detail.html?id=${item.id}`)}"><img src="${image(item.image)}" alt=""><span>${item.name}</span></a></td><td><button data-cart-minus="${item.id}">−</button> ${item.quantity} <button data-cart-plus="${item.id}">+</button></td><td>${Math.round(item.price * item.quantity * .01).toLocaleString('ko-KR')}원</td><td>${(item.price * item.quantity).toLocaleString('ko-KR')}원</td><td>무료</td><td><button id="deleteBtn" data-cart-remove="${item.id}">삭제</button></td></tr>`).join('')}</tbody></table><div id="cart_text"><p>· 50,000원 이상은 배송비 무료</p><p>· 장바구니 상품은 이 브라우저에 저장됩니다.</p></div><div id="cart_price"><ul><li>상품금액</li><li>+</li><li>배송비</li><li>=</li><li>전체금액</li></ul><ul><li>${total.toLocaleString('ko-KR')}원</li><li>0원</li><li>${total.toLocaleString('ko-KR')}원</li></ul></div><div id="cart_btns"><ul><li><a href="${href('products.html?category=table')}"><button>계속쇼핑</button></a></li><li><button type="button" data-checkout>주문하기</button></li></ul></div>`;
  root.onclick = event => { const button = event.target.closest('button'); if(!button) return; const id = button.dataset.cartRemove || button.dataset.cartMinus || button.dataset.cartPlus; if(!id) return; const next = readCart(); const item = next.find(entry => entry.id === id); if(button.dataset.cartRemove) next.splice(next.indexOf(item),1); if(button.dataset.cartMinus) item.quantity = Math.max(1,item.quantity-1); if(button.dataset.cartPlus) item.quantity += 1; writeCart(next); renderCart(); };
  document.querySelector('[data-checkout]').onclick = () => toast('포트폴리오용 주문 화면입니다.');
};

const toast = (message) => { let node = document.querySelector('.static-toast'); if(!node){ node=document.createElement('div'); node.className='static-toast'; document.body.appendChild(node); } node.textContent=message; node.classList.add('show'); setTimeout(()=>node.classList.remove('show'),1800); };
document.querySelectorAll('[data-search-form]').forEach(form => form.addEventListener('submit', event => { event.preventDefault(); const query = new FormData(form).get('searchValue') || ''; const product = products.find(item => item.name.includes(query)); location.href = product ? href(`detail.html?id=${product.id}`) : href('products.html?category=table'); }));

const page = document.body.dataset.page;
if (page === 'home') renderHome(); if (page === 'products') renderProducts(); if (page === 'detail') renderDetail(); if (page === 'cart') renderCart();
window.addEventListener('load', () => setTimeout(() => document.querySelector('.loadingio-spinner-pulse-m0y2l903lfs')?.classList.add('is-done'), 450));
