const cart=document.getElementById("cartID")
const cartModal= document.querySelector('.cart-modal')
cart.addEventListener("click",function(){
cartModal.classList.toggle('hideCart')
})
const isLoginBtn = document.getElementById("isLoginBtn");
const isLogin = document.getElementById("isLogin");

isLoginBtn.addEventListener("click",()=>{
    isLogin.innerHTML= "Bạn cần đăng nhập để đặt hàng !!!";
})
const btnLogout=document.querySelector('.btnLogout')
const logoutModal= document.querySelector('.logout-modal')

btnLogout.addEventListener('click',()=>{
    logoutModal.classList.toggle('hideCart')
})
