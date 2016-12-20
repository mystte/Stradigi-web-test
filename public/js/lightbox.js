function open_modal() {
  document.getElementById('my_modal').style.display = "block";
}

function close_modal() {
  document.getElementById('my_modal').style.display = "none";
}

var slide_index = 1;

function plus_slides(n) {
  show_slides(slide_index += parseInt(n));
}

function current_slide(n) {
  show_slides(slide_index = parseInt(n));
}

function show_slides(n) {
  var i;
  var slides = document.getElementsByClassName("my_slides");
  if (n > slides.length) {
  	slide_index = 1
  }
  if (n < 1) {
  	slide_index = slides.length
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slide_index-1].style.display = "block";
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