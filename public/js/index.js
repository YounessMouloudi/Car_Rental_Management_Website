// button scrolling
let bttnScrolling = document.getElementById("scrollingButton");

// counter numbers
let counters = document.querySelectorAll(".counter");
let boxNumbers = document.querySelector(".about");
let started = false;

function startCount(num) {

    let startValue = 0;
    let intervall = 6000;
    let endValue = parseInt(num.getAttribute("data-count"));
    let duration = Math.floor(intervall / endValue);
    
    let count = setInterval(() => {
        startValue +=1;
        num.textContent = "+" + startValue;
        if(startValue == endValue )
            clearInterval(count);
    },duration)
}

let footer = document.getElementsByTagName("footer")[0];
let windowheight = window.innerHeight;

let date_debut = document.querySelector(".date_debut");
let date_fin = document.querySelector(".date_fin");

let span_debut = document.querySelector(".sp_date_debut");
let span_fin = document.querySelector(".sp_date_fin");

let gps = document.querySelector(".gps");
let seat = document.querySelector(".seat");

let acc1_prix = document.querySelector(".acc1");
let acc2_prix = document.querySelector(".acc2");

let gps_prix = document.querySelector(".gps_prix");
let seat_prix = document.querySelector(".seat_prix");

let span_gps = document.querySelector(".sp_gps");
let span_seat = document.querySelector(".sp_seat");

let duration = document.querySelector(".sp_duration");

let total = document.querySelector(".total");
let prix = document.getElementById("prix");


window.addEventListener('change',() => {

    if(date_debut.value != "") {
        span_debut.innerHTML = date_debut.value;
    }
    else {
        span_debut.innerHTML = "dd/mm/yyyy";
    }

    if(date_fin.value != "") {
        span_fin.innerHTML = date_fin.value;
    }
    else {
        span_fin.innerHTML = "dd/mm/yyyy";
    }
    
    let durée = Math.floor((new Date(span_fin.textContent) - new Date(span_debut.textContent)) / (1000 * 60 * 60 * 24));
    
    if(span_fin.innerHTML == "dd/mm/yyyy" || span_debut.innerHTML == "dd/mm/yyyy"){
        duration.innerHTML = "0 jours";
    }
    else if(durée < 0){
        duration.innerHTML = "0 jours";
    }
    else{
        duration.innerHTML = durée + " jours";
    }

    if(gps.checked){
        span_gps.innerHTML = "1 x";
        gps_prix.innerHTML= acc1_prix.getAttribute('value');
    }
    else{
        span_gps.innerHTML = "0 x";
        gps_prix.innerHTML= "0";
    }

    if(seat.value != 0){
        span_seat.innerHTML = seat.value;
        seat_prix.innerHTML= (acc2_prix.getAttribute('value') * seat.value);
    }
    else{
        span_seat.innerHTML = "0";
        seat_prix.innerHTML= "0";
    }

    if(duration.innerHTML == "0 jours"){
        total.innerHTML = "0 dh";
    }
    else {
        total_prix = (durée * prix.textContent) + parseInt(gps_prix.textContent) + (seat_prix.textContent * durée);
        total.innerHTML = total_prix +" dh"; 
    }
});

window.onscroll = function () {

    if (window.scrollY > 600) {
        bttnScrolling.classList.add("showbtn");
    }
    else {
        bttnScrolling.classList.remove("showbtn");
    }
    if (window.scrollY >= (footer.offsetTop - windowheight + 25)){ 
        bttnScrolling.style.backgroundColor="white";
        bttnScrolling.style.color="var(--main-color)";
    }
    else {
        bttnScrolling.style.backgroundColor="var(--main-color)";
        bttnScrolling.style.color="white";
    }

    if(boxNumbers != null){
        if(window.scrollY >= boxNumbers.offsetTop) {
            if(!started) {
                counters.forEach((num) => startCount(num)) ;
            }
            started = true;
        }    
    }
    function up() {
        window.scrollTo({
          left: 0,
          top: 0,
          behavior: "smooth",
        });
    }
    bttnScrolling.onclick = function () {
        up();
    }
};
