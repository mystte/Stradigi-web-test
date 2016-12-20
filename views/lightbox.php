<div id="my_modal" class="modal">
  <span class="close cursor" onclick="close_modal()">&times;</span>
  <div class="modal-content">

    <?php
      if ($images != -1) {
        for ($i = 0; $i < count($images); $i++) {
          $thumbnail = $images[$i]['thumbnail'];
          $full_size = $images[$i]['full'];
          $title = $images[$i]['title'];
          echo('<div class="my_slides">');
          echo('<div class="numbertext">'.($i+1).' / 50</div>');
          echo('<img class="full_size_img" src="'.$full_size.'"></div>');
        }
      }
    ?>

    <a class="prev" onclick="plus_slides(-1)">&#10094;</a>
    <a class="next" onclick="plus_slides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>
  </div>
</div>