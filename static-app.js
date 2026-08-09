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
<header class="static-header"><div class="inner"><h1><a href="${href('index.html')}"><img class="brand-logo" src="${image('wLogo.png')}" alt="ReHome"></a></h1><ul class="header-actions"><li><a href="${href('index.html')}">LOGIN</a></li><li><a href="${href('index.html')}">JOIN</a></li><li><a href="${href('cart.html')}">CART <span class="cart-count" data-cart-count>0</span></a></li><li><form data-search-form><div class="searchDiv"><input type="search" name="searchValue" aria-label="상품 검색"><button class="searchBtn" aria-label="검색"><img src="${image('search-icon.png')}" alt=""></button></div></form></li></ul><button class="rehome-menu-toggle" type="button" aria-label="메뉴 열기" aria-expanded="false" aria-controls="rehome-navigation"><span></span><span></span><span></span></button></div></header>
<button class="rehome-nav-backdrop" type="button" aria-label="메뉴 닫기" data-nav-close></button><nav class="static-nav" id="rehome-navigation"><button class="rehome-nav-close" type="button" aria-label="메뉴 닫기" data-nav-close>×</button><div class="inner"><ul id="navBar">
  <li class="menuList"><h3><a href="${href('index.html')}">ABOUT</a></h3><ul class="hideMenu"><li><a href="${href('index.html')}">인사말</a></li><li><a href="${href('index.html')}">브랜드소개</a></li></ul></li>
  <li class="menuList"><h3><a href="${href('products.html?category=table')}">PRODUCT</a></h3><ul class="hideMenu"><li><a href="${href('products.html?category=table')}">TABLE</a></li><li><a href="${href('products.html?category=chair')}">CHAIR</a></li><li><a href="${href('products.html?category=bed')}">BED</a></li></ul></li>
  <li class="menuList"><h3><a href="${href('index.html')}">INTERIOR DESIGN</a></h3><ul class="hideMenu"><li><a href="${href('index.html')}">Living Room</a></li><li><a href="${href('index.html')}">Bed Room</a></li><li><a href="${href('index.html')}">Kitchen</a></li></ul></li>
  <li class="menuList"><h3><a href="${href('index.html')}">EVENT</a></h3></li><li class="menuList"><h3><a href="${href('index.html')}">CS CENTER</a></h3></li>
</ul></div></nav>`;
const footer = `<footer class="static-footer"><div id="top_footer"><div class="inner"><ul><li><a href="#">회사소개</a></li><li id="bar"><a href="#">이용안내</a></li><li><a href="#">이용약관</a></li><li><a href="#">개인정보취급방침</a></li></ul><ul id="footer_sns"><li>인스타그램</li><li>블로그</li><li>페이스북</li><li>유튜브</li></ul></div></div><div id="bottom_footer"><div class="inner"><div id="left"><h1><img src="${image('bLogo.png')}" alt="ReHome"></h1><p>상호명 : 주식회사 리홈코리아 · 대표자 : 김범</p><p>대표전화 : 1544-6400 · 팩스 : 032-123-1234</p><p>주소 : 인천광역시 남동구 그린컴퓨터</p><p>Copyright 2022 ReHome. All rights reserved.</p></div><div id="right"><p>CUSTOMER CENTER</p><p id="bold">1544-1234</p><p>MON-FRI 09:00 ~ 17:00</p></div></div></div></footer>`;

document.querySelectorAll('[data-rehome-header]').forEach(node => node.innerHTML = header);
document.querySelectorAll('[data-rehome-footer]').forEach(node => node.innerHTML = footer);

// Static deployment routes. The original PHP pages remain in the repository,
// while these links provide the same journeys on GitHub Pages.
const headerActionLinks = document.querySelectorAll('.header-actions a');
if (headerActionLinks[0]) headerActionLinks[0].href = href('login.html');
if (headerActionLinks[1]) headerActionLinks[1].href = href('join.html');
const primaryMenus = document.querySelectorAll('.static-nav .menuList');
if (primaryMenus[0]) {
  primaryMenus[0].querySelector('h3 a').href = href('about.html?tab=greetings');
  const aboutSubmenu = primaryMenus[0].querySelector('.hideMenu');
  if (aboutSubmenu && aboutSubmenu.querySelectorAll('a').length < 3) aboutSubmenu.insertAdjacentHTML('beforeend', `<li><a href="${href('about.html?tab=quality')}">품질 이야기</a></li>`);
  [...primaryMenus[0].querySelectorAll('.hideMenu a')].forEach((link, index) => {
    link.href = href(`about.html?tab=${['greetings', 'brand', 'quality'][index] || 'greetings'}`);
  });
}
if (primaryMenus[2]) {
  primaryMenus[2].querySelector('h3 a').href = href('interior.html?room=livingroom');
  [...primaryMenus[2].querySelectorAll('.hideMenu a')].forEach((link, index) => {
    link.href = href(`interior.html?room=${['livingroom', 'bedroom', 'kitchen'][index] || 'livingroom'}`);
  });
}
if (primaryMenus[3]) primaryMenus[3].querySelector('a').href = href('event.html');
if (primaryMenus[4]) primaryMenus[4].querySelector('a').href = href('cs.html');
const footerCompanyLink = document.querySelector('.static-footer #top_footer li:first-child a');
if (footerCompanyLink) footerCompanyLink.href = href('about.html?tab=greetings');
updateCartCount();
const menuToggle = document.querySelector('.rehome-menu-toggle');
const closeNavigation = () => { document.body.classList.remove('rehome-menu-open'); menuToggle?.setAttribute('aria-expanded', 'false'); };
menuToggle?.addEventListener('click', () => { const open = !document.body.classList.contains('rehome-menu-open'); document.body.classList.toggle('rehome-menu-open', open); menuToggle.setAttribute('aria-expanded', String(open)); });
document.querySelectorAll('[data-nav-close]').forEach(button => button.addEventListener('click', closeNavigation));
document.querySelector('.static-nav')?.addEventListener('click', event => { if (event.target.closest('a')) closeNavigation(); });
window.addEventListener('keydown', event => { if (event.key === 'Escape') closeNavigation(); });

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
  root.innerHTML = `<table><thead><tr><th>상품명 / 선택사항</th><th>수량</th><th>적립금액</th><th>상품금액</th><th>배송비</th><th></th></tr></thead><tbody>${cart.map(item => `<tr><td data-label="상품"><a class="cart-product" href="${href(`detail.html?id=${item.id}`)}"><img src="${image(item.image)}" alt=""><span>${item.name}</span></a></td><td data-label="수량"><span class="cart-quantity"><button data-cart-minus="${item.id}" aria-label="수량 줄이기">−</button><b>${item.quantity}</b><button data-cart-plus="${item.id}" aria-label="수량 늘리기">+</button></span></td><td data-label="적립금">${Math.round(item.price * item.quantity * .01).toLocaleString('ko-KR')}원</td><td data-label="상품금액">${(item.price * item.quantity).toLocaleString('ko-KR')}원</td><td data-label="배송비">무료</td><td data-label="삭제"><button id="deleteBtn" data-cart-remove="${item.id}">삭제</button></td></tr>`).join('')}</tbody></table><div id="cart_text"><p>· 50,000원 이상은 배송비 무료</p><p>· 장바구니 상품은 이 브라우저에 저장됩니다.</p></div><div id="cart_price"><ul><li>상품금액</li><li>+</li><li>배송비</li><li>=</li><li>전체금액</li></ul><ul><li>${total.toLocaleString('ko-KR')}원</li><li>0원</li><li>${total.toLocaleString('ko-KR')}원</li></ul></div><div id="cart_btns"><ul><li><a href="${href('products.html?category=table')}"><button>계속쇼핑</button></a></li><li><button type="button" data-checkout>주문하기</button></li></ul></div>`;
  root.onclick = event => { const button = event.target.closest('button'); if(!button) return; const id = button.dataset.cartRemove || button.dataset.cartMinus || button.dataset.cartPlus; if(!id) return; const next = readCart(); const item = next.find(entry => entry.id === id); if(button.dataset.cartRemove) next.splice(next.indexOf(item),1); if(button.dataset.cartMinus) item.quantity = Math.max(1,item.quantity-1); if(button.dataset.cartPlus) item.quantity += 1; writeCart(next); renderCart(); };
  document.querySelector('[data-checkout]').onclick = () => toast('포트폴리오용 주문 화면입니다.');
};

const toast = (message) => { let node = document.querySelector('.static-toast'); if(!node){ node=document.createElement('div'); node.className='static-toast'; document.body.appendChild(node); } node.textContent=message; node.classList.add('show'); setTimeout(()=>node.classList.remove('show'),1800); };
document.querySelectorAll('[data-search-form]').forEach(form => form.addEventListener('submit', event => { event.preventDefault(); const query = new FormData(form).get('searchValue') || ''; const product = products.find(item => item.name.includes(query)); location.href = product ? href(`detail.html?id=${product.id}`) : href('products.html?category=table'); }));

const sectionTabs = (items, current) => `<nav class="section-tabs" aria-label="페이지 메뉴">${items.map(item => `<a href="${href(item.path)}"${item.id === current ? ' class="is-active" aria-current="page"' : ''}>${item.label}</a>`).join('')}</nav>`;

const renderAbout = () => {
  const root = document.querySelector('[data-about-page]');
  const requested = new URLSearchParams(location.search).get('tab') || 'greetings';
  const tab = ['greetings', 'brand', 'quality'].includes(requested) ? requested : 'greetings';
  const tabs = sectionTabs([
    { id: 'greetings', label: '인사말', path: 'about.html?tab=greetings' },
    { id: 'brand', label: '브랜드 스토리', path: 'about.html?tab=brand' },
    { id: 'quality', label: '품질 이야기', path: 'about.html?tab=quality' }
  ], tab);
  const pages = {
    greetings: `<div class="about-hero"><img src="${image('furniture.png')}" alt="리홈 가구가 놓인 공간"><div><span>ABOUT REHOME</span><h1>공간을 편안하게,<br>일상을 아름답게</h1></div></div><div class="about-story about-greeting"><div class="about-copy"><p class="eyebrow">CEO MESSAGE</p><h2>집에서 누리는 편안함을<br>오래도록 지켜가겠습니다.</h2><p>리홈은 생활에 자연스럽게 스며드는 가구를 만듭니다. 보이는 디자인뿐 아니라 매일 닿는 소재와 사용감, 오래 사용할 수 있는 구조까지 세심하게 살핍니다.</p><p>더 나은 공간을 고민하는 마음으로, 일상에 꼭 맞는 가구를 전하겠습니다.</p><strong>ReHome 대표 김범</strong></div><img class="ceo-photo" src="${image('ceo.png')}" alt="ReHome 대표 이미지"></div>`,
    brand: `<div class="about-hero"><img src="${image('brandStoryImg.jpg')}" alt="리홈 브랜드 공간"><div><span>BRAND STORY</span><h1>나를 닮은 집,<br>생활을 담는 가구</h1></div></div><div class="about-story"><div class="about-copy wide"><p class="eyebrow">REHOME VALUES</p><h2>집으로 돌아오는 시간이<br>더 편안해지도록</h2><p>리홈은 편안함, 균형 잡힌 디자인, 자연스러운 소재를 중심으로 공간을 제안합니다.</p></div><div class="brand-values"><article><b>01</b><h3>Comfort</h3><p>몸과 생활 방식에 맞춘 편안한 사용감</p></article><article><b>02</b><h3>Design</h3><p>공간에 오래 머무는 간결하고 균형 잡힌 디자인</p></article><article><b>03</b><h3>Green Feeling</h3><p>자연의 질감과 색을 담은 따뜻한 분위기</p></article></div></div>`,
    quality: `<div class="about-hero"><img src="${image('Woodworking.jpg')}" alt="가구를 제작하는 모습"><div><span>QUALITY STORY</span><h1>보이지 않는 곳까지<br>꼼꼼하게</h1></div></div><div class="quality-grid"><article><img src="${image('furniture_assembly.png')}" alt="가구 조립 과정"><div><span>01</span><h2>안정적인 구조</h2><p>매일 사용하는 가구인 만큼 연결부와 하중을 고려해 안정적으로 설계합니다.</p></div></article><article><img src="${image('Woodworking.jpg')}" alt="목재 가공 과정"><div><span>02</span><h2>소재의 선택</h2><p>공간의 분위기와 사용 목적에 맞는 소재를 고르고 질감과 색감을 살핍니다.</p></div></article><article><img src="${image('furniture2.png')}" alt="완성된 리홈 가구"><div><span>03</span><h2>마감의 완성도</h2><p>손이 자주 닿는 모서리부터 표면까지 편안하게 사용할 수 있도록 마무리합니다.</p></div></article></div>`
  };
  root.innerHTML = `<div class="subpage-inner"><h1 class="subpage-title">ABOUT</h1>${tabs}${pages[tab]}</div>`;
};

const interiorData = {
  livingroom: { title: 'Living Room', intro: '함께 머무는 시간이 편안해지는 거실', images: ['livingroom1.jpg','livingroom2.jpg','livingroom3.jpg'], products: [products[9], products[0], products[10]] },
  bedroom: { title: 'Bed Room', intro: '하루의 시작과 끝을 차분하게 만드는 침실', images: ['bedroom1.jpg','bedroom2.jpg','bedroom3.jpg'], products: [products[18], products[19], products[20]] },
  kitchen: { title: 'Kitchen', intro: '요리와 대화가 자연스럽게 이어지는 주방', images: ['kitchen1.jpg','kitchen2.jpg','kitchen3.jpg'], products: [products[1], products[2], products[11]] }
};
const renderInterior = () => {
  const root = document.querySelector('[data-interior-page]');
  const requested = new URLSearchParams(location.search).get('room') || 'livingroom';
  const room = interiorData[requested] ? requested : 'livingroom';
  const data = interiorData[room];
  const tabs = sectionTabs(Object.entries(interiorData).map(([id, value]) => ({ id, label: value.title, path: `interior.html?room=${id}` })), room);
  root.innerHTML = `<div class="subpage-inner interior-static"><h1 class="subpage-title">INTERIOR DESIGN</h1>${tabs}<header class="interior-intro"><span>REHOME SPACE</span><h2>${data.title}</h2><p>${data.intro}</p></header><div class="interior-scenes">${data.images.map((file, index) => { const product = data.products[index]; return `<article class="interior-scene"><div class="scene-image"><img src="${image(file)}" alt="${data.title} 인테리어 ${index + 1}"><span>${String(index + 1).padStart(2,'0')}</span></div><a class="scene-product" href="${href(`detail.html?id=${product.id}`)}"><img src="${image(product.image)}" alt="${product.name}"><span><small>SHOP THE LOOK</small><strong>${product.name}</strong><em>${product.price.toLocaleString('ko-KR')}원</em></span><b aria-hidden="true">→</b></a></article>`; }).join('')}</div></div>`;
};

const renderEvent = () => {
  const root = document.querySelector('[data-event-page]');
  root.innerHTML = `<div class="subpage-inner event-static"><h1 class="subpage-title">EVENT</h1><div class="event-hero"><img src="${image('background.png')}" alt="ReHome 이벤트"><div><span>REHOME SPECIAL</span><h2>공간을 바꾸는<br>기분 좋은 제안</h2><p>리홈이 고른 인기 가구를 특별한 혜택으로 만나보세요.</p><a href="#event-products">제품 보기</a></div></div><div id="event-products" class="event-products"><div class="event-heading"><span>THIS MONTH</span><h2>이달의 추천 가구</h2></div><ul>${products.slice(0, 6).map(product => card(product)).join('')}</ul></div></div>`;
};

const renderCs = () => {
  const root = document.querySelector('[data-cs-page]');
  root.innerHTML = `<div class="subpage-inner cs-static"><h1 class="subpage-title">CS CENTER</h1><div class="cs-summary"><div><span>CUSTOMER CENTER</span><strong>1544-1234</strong><p>평일 09:00–17:00<br>주말 및 공휴일 휴무</p></div><p>제품과 배송, A/S에 대해 궁금한 점을 남겨주세요.<br>확인 후 빠르게 안내해 드리겠습니다.</p></div><div class="cs-tabs" role="tablist" aria-label="고객센터 메뉴"><button class="is-active" type="button" role="tab" aria-selected="true" data-cs-tab="inquiry">1:1 문의</button><button type="button" role="tab" aria-selected="false" data-cs-tab="faq">자주 묻는 질문</button><button type="button" role="tab" aria-selected="false" data-cs-tab="service">A/S 안내</button></div><div class="cs-panel" data-cs-panel></div></div>`;
  const panel = root.querySelector('[data-cs-panel]');
  const panels = {
    inquiry: `<form class="static-form cs-form" data-inquiry-form><label>문의 유형<select name="type"><option>제품 문의</option><option>배송 문의</option><option>교환·반품</option><option>A/S 문의</option></select></label><label>이름<input name="name" required autocomplete="name"></label><label class="wide">문의 내용<textarea name="message" rows="6" required placeholder="문의하실 내용을 입력해 주세요."></textarea></label><button type="submit">문의 등록</button></form>`,
    faq: `<div class="faq-list"><details><summary>배송 기간은 얼마나 걸리나요?</summary><p>제품과 지역에 따라 다르며 주문 확인 후 예상 일정을 안내해 드립니다.</p></details><details><summary>주문 후 옵션을 변경할 수 있나요?</summary><p>배송 준비 전이라면 변경할 수 있습니다. 고객센터로 문의해 주세요.</p></details><details><summary>교환이나 반품은 어떻게 하나요?</summary><p>제품 수령 후 7일 이내 고객센터에 접수해 주세요. 설치 제품은 상태 확인이 필요합니다.</p></details></div>`,
    service: `<div class="service-guide"><h2>A/S 접수 안내</h2><ol><li><b>01</b><span><strong>접수</strong>제품명과 문제가 발생한 부분을 알려주세요.</span></li><li><b>02</b><span><strong>상담</strong>사진과 구매 정보를 바탕으로 처리 방법을 안내합니다.</span></li><li><b>03</b><span><strong>방문 또는 처리</strong>필요한 경우 일정을 조율해 방문 서비스를 진행합니다.</span></li></ol></div>`
  };
  const selectTab = (name) => {
    panel.innerHTML = panels[name];
    root.querySelectorAll('[data-cs-tab]').forEach(button => { const active = button.dataset.csTab === name; button.classList.toggle('is-active', active); button.setAttribute('aria-selected', String(active)); });
    panel.querySelector('[data-inquiry-form]')?.addEventListener('submit', event => { event.preventDefault(); event.target.reset(); toast('문의가 등록되었습니다.'); });
  };
  root.querySelectorAll('[data-cs-tab]').forEach(button => button.addEventListener('click', () => selectTab(button.dataset.csTab)));
  selectTab('inquiry');
};

const USER_KEY = 'rehome-demo-user-v1';
const renderLogin = () => {
  const root = document.querySelector('[data-login-page]');
  root.innerHTML = `<div class="auth-static"><div class="auth-copy"><span>WELCOME BACK</span><h1>다시 만나서<br>반갑습니다.</h1><p>리홈에서 나만의 공간을 이어서 둘러보세요.</p></div><form class="static-form auth-form" data-login-form><h2>LOGIN</h2><label>아이디<input name="userId" required autocomplete="username"></label><label>비밀번호<input type="password" name="password" required autocomplete="current-password"></label><label class="check-label"><input type="checkbox" name="remember"> 아이디 저장</label><button type="submit">로그인</button><p>아직 회원이 아니신가요? <a href="${href('join.html')}">회원가입</a></p></form></div>`;
  root.querySelector('[data-login-form]').addEventListener('submit', event => { event.preventDefault(); const data = new FormData(event.target); const saved = JSON.parse(localStorage.getItem(USER_KEY) || 'null'); if (saved && saved.userId !== data.get('userId')) { toast('가입한 아이디를 확인해 주세요.'); return; } toast('로그인되었습니다.'); setTimeout(() => { location.href = href('index.html'); }, 700); });
};
const renderJoin = () => {
  const root = document.querySelector('[data-join-page]');
  root.innerHTML = `<div class="auth-static join-static"><div class="auth-copy"><span>JOIN REHOME</span><h1>당신의 공간을<br>함께 완성해요.</h1><p>회원 정보는 이 기기에만 저장되는 포트폴리오용 데모입니다.</p></div><form class="static-form auth-form" data-join-form><h2>JOIN</h2><label>이름<input name="name" required autocomplete="name"></label><label>아이디<input name="userId" required minlength="4" autocomplete="username"></label><label>비밀번호<input type="password" name="password" required minlength="4" autocomplete="new-password"></label><label>비밀번호 확인<input type="password" name="confirmPassword" required autocomplete="new-password"></label><label>이메일<input type="email" name="email" required autocomplete="email"></label><label>연락처<input type="tel" name="phone" required autocomplete="tel"></label><label class="wide">주소<input name="address" autocomplete="street-address"></label><button type="submit">회원가입</button></form></div>`;
  root.querySelector('[data-join-form]').addEventListener('submit', event => { event.preventDefault(); const data = Object.fromEntries(new FormData(event.target)); if (data.password !== data.confirmPassword) { toast('비밀번호가 일치하지 않습니다.'); return; } localStorage.setItem(USER_KEY, JSON.stringify({ name: data.name, userId: data.userId, email: data.email, phone: data.phone, address: data.address })); toast('회원가입이 완료되었습니다.'); setTimeout(() => { location.href = href('login.html'); }, 700); });
};

const page = document.body.dataset.page;
if (page === 'home') renderHome(); if (page === 'products') renderProducts(); if (page === 'detail') renderDetail(); if (page === 'cart') renderCart();
if (page === 'about') renderAbout(); if (page === 'interior') renderInterior(); if (page === 'event') renderEvent(); if (page === 'cs') renderCs(); if (page === 'login') renderLogin(); if (page === 'join') renderJoin();
window.addEventListener('load', () => setTimeout(() => document.querySelector('.loadingio-spinner-pulse-m0y2l903lfs')?.classList.add('is-done'), 450));
