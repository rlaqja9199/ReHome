const products=[
{id:1,name:'Morrow Bed',category:'BED',price:1280000,image:'assets/best1.jpg'},
{id:2,name:'Layer Bed',category:'BED',price:980000,image:'assets/bed3.jpg'},
{id:3,name:'Frame Chair',category:'CHAIR',price:320000,image:'assets/chair8.jpg'},
{id:4,name:'Soft Lounge',category:'CHAIR',price:460000,image:'assets/chair2.jpg'},
{id:5,name:'Line Table',category:'TABLE',price:540000,image:'assets/table4.jpg'},
{id:6,name:'Oak Dining',category:'TABLE',price:720000,image:'assets/table7.jpg'},
{id:7,name:'Calm Bed',category:'BED',price:1120000,image:'assets/bed5.jpg'},
{id:8,name:'Daily Chair',category:'CHAIR',price:290000,image:'assets/chair5.jpg'}];
const money=value=>`${value.toLocaleString('ko-KR')}원`;
const readStore=(key,fallback)=>{try{const value=JSON.parse(localStorage.getItem(key));return value??fallback}catch{return fallback}};
let filter='ALL';
let saved=readStore('rehome-wishlist-v1',[]);
let cart=readStore('rehome-cart-v1',[]);
let selected=null;
let detailQuantity=1;
const grid=document.querySelector('.product-grid');
const wishCount=document.querySelector('.saved-open span');
const cartCount=document.querySelector('.cart-open span');
const modal=document.querySelector('.product-modal');
const cartDrawer=document.querySelector('.cart-drawer');
const cartOverlay=document.querySelector('.cart-overlay');
const toast=document.querySelector('.toast');

function persist(){localStorage.setItem('rehome-wishlist-v1',JSON.stringify(saved));localStorage.setItem('rehome-cart-v1',JSON.stringify(cart));}
function visibleProducts(){if(filter==='SAVED')return products.filter(p=>saved.includes(p.id));return products.filter(p=>filter==='ALL'||p.category===filter)}
function renderProducts(){
  const list=visibleProducts();
  grid.innerHTML=list.length?list.map(p=>`<article><button class="product-image" data-view="${p.id}" aria-label="${p.name} 제품 페이지 열기"><img src="${p.image}" alt="${p.name}" loading="lazy"><i>VIEW ↗</i></button><div class="product-meta"><div><span>${p.category}</span><h3>${p.name}</h3><p>${money(p.price)}</p></div><button class="${saved.includes(p.id)?'active':''}" data-save="${p.id}" aria-label="${p.name} 찜하기" aria-pressed="${saved.includes(p.id)}">${saved.includes(p.id)?'♥':'♡'}</button></div></article>`).join(''):'<p class="no-products">찜한 상품이 아직 없습니다.</p>';
  wishCount.textContent=saved.length;
}
function renderCart(){
  const container=document.querySelector('.cart-items');
  const empty=document.querySelector('.cart-empty');
  const summary=document.querySelector('.cart-summary');
  const totalCount=cart.reduce((sum,item)=>sum+item.quantity,0);
  cartCount.textContent=totalCount;
  container.innerHTML=cart.map(item=>{const product=products.find(p=>p.id===item.id);if(!product)return'';return `<article class="cart-item"><img src="${product.image}" alt="${product.name}"><div><span>${product.category}</span><h3>${product.name}</h3><p>${money(product.price)}</p><div class="cart-item-actions"><button data-cart-minus="${product.id}" aria-label="${product.name} 수량 줄이기">−</button><output>${item.quantity}</output><button data-cart-plus="${product.id}" aria-label="${product.name} 수량 늘리기">＋</button><button class="remove" data-cart-remove="${product.id}">REMOVE</button></div></div></article>`}).join('');
  const subtotal=cart.reduce((sum,item)=>{const product=products.find(p=>p.id===item.id);return sum+(product?product.price*item.quantity:0)},0);
  document.querySelector('.cart-subtotal').textContent=money(subtotal);
  empty.hidden=cart.length>0;summary.hidden=cart.length===0;
}
function note(text){toast.textContent=text;toast.classList.add('show');clearTimeout(note.timer);note.timer=setTimeout(()=>toast.classList.remove('show'),1800)}
function toggleSaved(id){saved=saved.includes(id)?saved.filter(item=>item!==id):[...saved,id];persist();renderProducts();if(selected?.id===id)document.querySelector('.modal-save').textContent=saved.includes(id)?'♥ SAVED':'♡ WISHLIST';note(saved.includes(id)?'위시리스트에 담았어요.':'위시리스트에서 제외했어요.');}
function updateQuantity(change){detailQuantity=Math.max(1,Math.min(9,detailQuantity+change));document.querySelector('.quantity output').textContent=detailQuantity;}
function addToCart(id,quantity=1){const existing=cart.find(item=>item.id===id);if(existing)existing.quantity=Math.min(99,existing.quantity+quantity);else cart.push({id,quantity});persist();renderCart();note('장바구니에 담았어요.');}
function changeCart(id,change){const item=cart.find(entry=>entry.id===id);if(!item)return;item.quantity+=change;if(item.quantity<=0)cart=cart.filter(entry=>entry.id!==id);persist();renderCart();}
function removeCart(id){cart=cart.filter(item=>item.id!==id);persist();renderCart();note('장바구니에서 삭제했어요.');}
function openProduct(id,pushHash=true){
  selected=products.find(p=>p.id===id);if(!selected)return;
  detailQuantity=1;
  modal.querySelector('img').src=selected.image;modal.querySelector('img').alt=selected.name;
  modal.querySelector('span').textContent=selected.category;modal.querySelector('h2').textContent=selected.name;
  modal.querySelector('.modal-price').textContent=money(selected.price);modal.querySelector('.quantity output').textContent='1';
  modal.querySelector('.modal-save').textContent=saved.includes(id)?'♥ SAVED':'♡ WISHLIST';
  modal.classList.add('open');modal.setAttribute('aria-hidden','false');document.body.classList.add('locked');
  if(pushHash&&location.hash!==`#product-${id}`)history.pushState(null,'',`#product-${id}`);
}
function closeProduct(updateHash=true){modal.classList.remove('open');modal.setAttribute('aria-hidden','true');selected=null;if(!cartDrawer.classList.contains('open'))document.body.classList.remove('locked');if(updateHash&&location.hash.startsWith('#product-'))history.pushState(null,'','#collection');}
function openCart(pushHash=true){closeProduct(false);cartDrawer.classList.add('open');cartDrawer.setAttribute('aria-hidden','false');cartOverlay.classList.add('open');document.body.classList.add('locked');renderCart();if(pushHash&&location.hash!=='#cart')history.pushState(null,'','#cart');}
function closeCart(updateHash=true){cartDrawer.classList.remove('open');cartDrawer.setAttribute('aria-hidden','true');cartOverlay.classList.remove('open');document.body.classList.remove('locked');if(updateHash&&location.hash==='#cart')history.pushState(null,'','#collection');}
function route(){const productMatch=location.hash.match(/^#product-(\d+)$/);if(productMatch){closeCart(false);openProduct(Number(productMatch[1]),false)}else if(location.hash==='#cart'){openCart(false)}else{closeProduct(false);closeCart(false)}}

document.querySelectorAll('.filters button').forEach(btn=>btn.addEventListener('click',()=>{filter=btn.dataset.filter;document.querySelectorAll('.filters button').forEach(b=>b.classList.toggle('active',b===btn));renderProducts()}));
grid.addEventListener('click',event=>{const view=event.target.closest('[data-view]'),save=event.target.closest('[data-save]');if(view)openProduct(Number(view.dataset.view));if(save)toggleSaved(Number(save.dataset.save))});
document.querySelectorAll('[data-room]').forEach(btn=>btn.addEventListener('click',()=>{filter=btn.dataset.room==='LIVING'?'CHAIR':btn.dataset.room;document.querySelector('#collection').scrollIntoView();document.querySelectorAll('.filters button').forEach(b=>b.classList.toggle('active',b.dataset.filter===filter));renderProducts()}));
document.querySelector('.saved-open').addEventListener('click',()=>{filter='SAVED';document.querySelectorAll('.filters button').forEach(b=>b.classList.remove('active'));renderProducts();document.querySelector('#collection').scrollIntoView()});
modal.querySelector('.modal-close').addEventListener('click',()=>closeProduct());modal.querySelector('.modal-bg').addEventListener('click',()=>closeProduct());modal.querySelector('.detail-back').addEventListener('click',event=>{event.preventDefault();closeProduct()});modal.querySelector('.modal-save').addEventListener('click',()=>selected&&toggleSaved(selected.id));modal.querySelector('[data-qty="minus"]').addEventListener('click',()=>updateQuantity(-1));modal.querySelector('[data-qty="plus"]').addEventListener('click',()=>updateQuantity(1));modal.querySelector('.add-cart').addEventListener('click',()=>{if(selected)addToCart(selected.id,detailQuantity)});
document.querySelector('.cart-open').addEventListener('click',()=>openCart());document.querySelector('.cart-close').addEventListener('click',()=>closeCart());cartOverlay.addEventListener('click',()=>closeCart());
document.querySelector('.cart-items').addEventListener('click',event=>{const plus=event.target.closest('[data-cart-plus]'),minus=event.target.closest('[data-cart-minus]'),remove=event.target.closest('[data-cart-remove]');if(plus)changeCart(Number(plus.dataset.cartPlus),1);if(minus)changeCart(Number(minus.dataset.cartMinus),-1);if(remove)removeCart(Number(remove.dataset.cartRemove))});
document.querySelector('.checkout').addEventListener('click',()=>note('포트폴리오 데모에서는 결제 직전 단계까지만 제공됩니다.'));
document.addEventListener('keydown',event=>{if(event.key==='Escape'){if(cartDrawer.classList.contains('open'))closeCart();else closeProduct()}});window.addEventListener('hashchange',route);
const mobile=document.querySelector('.mobile-nav');document.querySelector('.menu').addEventListener('click',()=>{mobile.classList.add('open');document.body.classList.add('locked')});mobile.querySelector('button').addEventListener('click',()=>{mobile.classList.remove('open');document.body.classList.remove('locked')});mobile.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>{mobile.classList.remove('open');document.body.classList.remove('locked')}));
renderProducts();renderCart();route();setTimeout(()=>document.querySelector('.loader').classList.add('hidden'),2200);
