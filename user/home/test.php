<style>
.body {
  font-family: Arial, sans-serif;
  text-align: center;
  margin: 3rem auto;
}

* { box-sizing: border-box }

h1 {
  margin-bottom: 3rem;
}

.images {
  width: 350px;
  margin: 0 auto;
  height: auto;
  display: grid;
  grid-gap: 7.5px;
  grid-template-columns: 50% 50%;
}

@media (min-width: 580px) {
  .images {
    grid-template-columns: 25% 25% 25% 25%;
  }
}
img {
  height: auto;
  width: 100%;
  max-width: 100%;
  vertical-align: middle;
}
.template {
  transition: all 0.8s cubic-bezier(0.455, 0.03, 0.515, 0.955);
  opacity: 0;
  position: relative;
  background: #707070;
}

.template p {
  position: absolute;
  left: 0;
  bottom: 0;
  color: #fff;
  text-transform: uppercase;
  font-size: 13px;
  letter-spacing: 1px;
  margin: 0;
  width: 100%;
  background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.5));
  padding: 25px 10px 10px 10px;
}

.template.animate {
  transform: scale(1);
    opacity: 1;
}

#gallery-pagination {
  margin: 30px 0;
}

#btnNext,
#btnPrevious{
  background: transparent;
  color: #609ea5;
  padding: 8px 28px;
  border: 0;
  font-size: 18px;
  cursor: pointer;
  outline: none;
}

#gallery-pagination #page {
  margin-left: 15px;
  margin-right: 15px;
  color: #707070;
  font-style: italic;
  font-size: 13px
}

.sr-only {
  position: absolute !important;
  overflow: hidden;
  clip: rect(0 0 0 0);
  height: 1px;
  width: 1px;
  margin: -1px;
  padding: 0;
  border: 0;
}

#gallery-dots {
  margin-bottom: 15px
}

.gallery-dot {
  background: #609ea5;
  border:0;
  padding:0;
  width: 50px;
  height: 8px;
  margin: 5px;
  opacity: 0.4;
  outline: none;
  cursor: pointer;
}

.gallery-dot.active {
  opacity: 1;
}

#gallery-pagination {
  display: grid;
  grid-template-columns: 1fr 3fr 1fr;
  align-items: start;
}
</style>
<div class=body>
  <div class="gallery">
    <header>
      <h1>Photo Gallery</h1>
    </header>
    <main id="image-gallery" class="images"></main>
    <footer id="gallery-pagination">
      <button id="btnPrevious">&larr; <span class="sr-only">Previous</span></button>
      <div>
        <div id="gallery-dots"></div>
        <span id="page"></span>
      </div>
      <button id="btnNext"><span class="sr-only">Next </span>&rarr;</button>
    </footer>
  </div>
</div>

<?php
$con = new mysqli("localhost","root","","comstar_portal");
$result=mysqli_query($con,"SELECT * FROM `homepage` WHERE `Type`= 'Image' ORDER BY Year DESC");
?>
<script>
var previous = document.getElementById('btnPrevious')
var next = document.getElementById('btnNext')
var gallery = document.getElementById('image-gallery')
var pageIndicator = document.getElementById('page')
var galleryDots = document.getElementById('gallery-dots');

var images= [];

for (var i = 0; i < 10; i++) {
  images.push({
    title: "Image " + (i + 1),
    source: "https://picsum.photos/500/500?random&img=" + i
  });
}

var perPage = 8;
var page = 1;
var pages = Math.ceil(images.length / perPage)


// Gallery dots
for (var i = 0; i < pages; i++){
  var dot = document.createElement('button')
  var dotSpan = document.createElement('span')
  var dotNumber = document.createTextNode(i + 1)
  dot.classList.add('gallery-dot');
  dot.setAttribute('data-index', i);
  dotSpan.classList.add('sr-only');
  
  dotSpan.appendChild(dotNumber);
  dot.appendChild(dotSpan)
  
  dot.addEventListener('click', function(e) {
    var self = e.target
    goToPage(self.getAttribute('data-index'))
  })
  
  galleryDots.appendChild(dot)
}

// Previous Button
previous.addEventListener('click', function() {
  if (page === 1) {
    page = 1;
  } else {
    page--;
    showImages();
  }
})

// Next Button
next.addEventListener('click', function() {
  if (page < pages) {
    page++;
    showImages();
  }
})

// Jump to page
function goToPage(index) {
  index = parseInt(index);
  page =  index + 1;
  
  showImages();
}

// Load images
function showImages() {
  while(gallery.firstChild) gallery.removeChild(gallery.firstChild)
  
  var offset = (page - 1) * perPage;
  var dots = document.querySelectorAll('.gallery-dot');
  
  for (var i = 0; i < dots.length; i++){
    dots[i].classList.remove('active');
  }
  
  dots[page - 1].classList.add('active');
  
  for (var i = offset; i < offset + perPage; i++) {
    if ( images[i] ) {
      var template = document.createElement('div');
      var title = document.createElement('p');
      var titleText = document.createTextNode(images[i].title);
      var img = document.createElement('img');
      
      template.classList.add('template')
      img.setAttribute("src", images[i].source);
      img.setAttribute('alt', images[i].title);

      title.appendChild(titleText);
      template.appendChild(img);
      template.appendChild(title);
      gallery.appendChild(template);      
    }
  }
  
  // Animate images
  var galleryItems = document.querySelectorAll('.template')
  for (var i = 0; i < galleryItems.length; i++) {
    var onAnimateItemIn = animateItemIn(i);
    setTimeout(onAnimateItemIn, i * 100);
  }
  
  function animateItemIn(i) {
    var item = galleryItems[i];
    return function() {
      item.classList.add('animate');
    }
  }
  
  // Update page indicator
  pageIndicator.textContent = "Page " + page + " of " + pages;
  
}

showImages();
</script>