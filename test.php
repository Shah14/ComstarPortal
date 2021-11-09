<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="logo.png">
<link rel="stylesheet" href="design.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
.flip-card {
  background-color: transparent;
  width: 200px;
  height: 300px;
  perspective: 1000px;
}
.flip-card-inner {
  position: relative;
  text-align: center;
  left:250%;
  width: 100%;
  height: 100%;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}
.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
.flip-card-front {
  background-color: #bbb;
  color: black;
}
.flip-card-back {
  background-color: #2980b9;
  color: white;
  transform: rotateY(180deg);
}
* {
  box-sizing: border-box;
}
/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 20%;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.fa {
  padding: 10px;
  font-size: 20px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 10px 2px;
}
.fa:hover {
    opacity: 0.7;
}
.fa-facebook {
  background: #3B5998;
  color: white;
}
.fa-twitter {
  background: #55ACEE;
  color: white;
}
.fa-google {
  background: #dd4b39;
  color: white;
}
.fa-youtube {
  background: #bb0000;
  color: white;
}
.fa-instagram {
  background: #125688;
  color: white;
}
.fa-reddit {
  background: #ff5700;
  color: white;
}

/* Header/Logo Title */
.header {
  padding: 60px;
  text-align: center;
  background: red;
  color: white;
  font-size: 30px;
}
/* Header/Logo Title */
.header1 {
  padding: 60px;
  text-align: center;
  background: blue;
  color: white;
  font-size: 30px;
}
/* Header/Logo Title */
.header2 {
  padding: 60px;
  text-align: center;
  background: green;
  color: white;
  font-size: 30px;
}
/* Header/Logo Title */
.header3 {
  padding: 60px;
  text-align: center;
  background: purple;
  color: white;
  font-size: 30px;
}
/* Header/Logo Title */
.header4 {
  padding: 60px;
  text-align: center;
  background: black;
  color: white;
  font-size: 30px;
}
/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: 0.6} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: 0.6} 
  to {opacity: 1}
}

.constant {
  position: fixed;
  top: 0;
  z-index: 1;
  width: 100%;
  background-color: #f1f1f1;
}
.progress-container {
  width: 100%;
  height: 8px;
  background: white;
}

.progress-bar {
  height: 8px;
  background: red;
  width: 0%;
}

</style>
</head>
<body>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 5</div>
  <div class="header">
  <h1>School Student Registration</h1>
  <p>"Make yourself registrable" <br>~Zuhair Isyraq, probably</p>
  
</div>
</div>

<div class="mySlides fade" >
  <div class="numbertext">2 / 5</div>
  <div class="header1">
  <h1>School Student Registration</h1>
  <p>"Register before you are registered" <br>~Danish Haqime, maybe</p>
</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 5</div>
  <div class="header2">
  <h1>School Student Registration</h1>
  <p>"To register, or not to register" <br>~Shah Eq'mal, apparently</p>
</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">4 / 5</div>
  <div class="header3">
  <h1>School Student Registration</h1>
  <p>"Those who don't know registration are destined to register" <br>~Nik Nur Abid, plausibly</p>
</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">5 / 5</div>
  <div class="header4">
  <h1>School Student Registration</h1>
  <p>"Something something registration" <br>~Song Sai Kit, likely</p>
</div>
</div>
</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
  <span class="dot"></span> 
  <span class="dot"></span>  
</div>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
window.onscroll = function() {myFunction()};

function myFunction() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}
</script>
</body>
</html>