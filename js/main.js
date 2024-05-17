let slideIndex = 1;
showSlides(slideIndex);

let prev = document.getElementById ('prev');
let next = document.getElementById ('next');

next.addEventListener ("click", function () {
  showSlides(slideIndex += 1);
  makeTimer();//Пересоздаем интервал если производится нажатие 
});

prev.addEventListener ("click", function () {
  showSlides(slideIndex -= 1);
  makeTimer();//Пересоздаем интервал если производится нажатие 
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
 makeTimer(); //Создаем интервал 
 function makeTimer(){
    clearInterval(timer) //Очистим интервал, это позволит прервать его работу и отменить перелистывание
    timer = setInterval(function(){
      slideIndex++;
      showSlides(slideIndex);
    },5000);
  }
  
  
 //Таймер, (чтобы было удобнее считать время) можно удалить




 

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