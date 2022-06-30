let burgerBtn = document.querySelector('.menuToggle');
let menu = document.querySelector('.menu');
let status = false;
function checkSize(){
    let screen = window.innerWidth;
    // document.body.style.backgroundColor = "black";
    burgerBtn.classList.remove('active');
    status=false;
   if(screen>"640"){
        menu.style.height="unset";
        status = false;
       // document.body.style.backgroundColor = "black";
       burgerBtn.classList.remove('active');
    }
   else {
       menu.style.height = "0";

   }

}

function openBurger(){
    if(status){
        menu.style.height="0";
        status = false;
        // document.body.style.backgroundColor = "black"
    }
    else {
        menu.style.height="300px";
        status = true;
        // document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

    }
    burgerBtn.classList.toggle('active');

}
window.addEventListener('resize',checkSize);
burgerBtn.addEventListener('click',openBurger);
