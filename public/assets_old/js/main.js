const buttonOpen = document.querySelector('.header-nav-mobile')
const navMobile = document.querySelector('.nav-mobile')
const fadeNavMobile = document.querySelector('.nav-mobile_fade')
const closeNavMobile = document.querySelector('.header-nav-mobile .close-button')
const openNavMobile = document.querySelector('.header-nav-mobile .open-button')
buttonOpen.addEventListener('click', function(){
    navMobile.classList.toggle('d-none')
    closeNavMobile.classList.toggle('d-none')
    openNavMobile.classList.toggle('d-none')
})
fadeNavMobile.addEventListener('click', function(){
    navMobile.classList.toggle('d-none')
    closeNavMobile.classList.toggle('d-none')
    openNavMobile.classList.toggle('d-none')
})