function open_modal() {
  document.getElementById('my_modal').style.display = "block";
}

function close_modal() {
  document.getElementById('my_modal').style.display = "none";
}

var slideIndex = 1;
show_slides(slideIndex);

function plus_slides(n) {
  show_slides(slideIndex += n);
}

function current_slide(n) {
  show_slides(slideIndex = n);
}

function show_slides(n) {
  var i;
  var slides = document.getElementsByClassName("my_slides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {
  	slideIndex = 1
  }
  if (n < 1) {
  	slideIndex = slides.length
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
}

// Show lightbox when clicking on picture
$("img.scrollable_img").click(function() {
  open_modal();
  current_slide($(this).attr('nb-slide'));
});


$(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key (close modal)
      close_modal();
    } else if (e.keyCode == 37) { // left arrow
      plus_slides(-1);
    } else if (e.keyCode == 39) { // right arrow
      plus_slides(1);
    }
});