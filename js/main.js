let slideIndex = 1;
showSlides(slideIndex);

let prev = document.getElementById ('prev');
let next = document.getElementById ('next');

next.addEventListener ("click", function () {
  showSlides(slideIndex += 1);
  makeTimer(); 
});

prev.addEventListener ("click", function () {
  showSlides(slideIndex -= 1);
  makeTimer();
});

function currentSlide(n) {
  showSlides(slideIndex = n);
}


function showSlides(n) {
    let slides = document.getElementsByClassName("myslide");
    if (n > slides.length) {
      slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
 
    for (let slide of slides) {
        slide.style.display = "none";
    }
    slides[slideIndex - 1].style.display = "flex";    
  }
 var timer = 0;
 makeTimer();  
 function makeTimer(){
    clearInterval(timer)
    timer = setInterval(function(){
      slideIndex++;
      showSlides(slideIndex);
    },5000);
  }
  





 

 const buttonsEl = document.querySelectorAll('.button')
 const accordionsEl = document.querySelectorAll('.accordion')
 
 buttonsEl.forEach((button, index) => {
 
     const accordion = accordionsEl[index]
 
     button.addEventListener('click', () => {
         accordion.classList.toggle('show')
 
         if(accordion.classList.contains('show')) {
             button.style.transform = 'rotate(140deg)'
         } else {
             button.style.transform = 'rotate(0)'
         }
     })
 
 })

 function openForm(){
  document.getElementById('modal_window').style.display = 'block'
}

function closeForm(){
  document.getElementById('modal_window').style.display = 'none'
}