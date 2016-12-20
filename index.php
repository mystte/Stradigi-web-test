<?php
	include './controllers/flickr.php';
	$images = -1;
	$search = isset($_GET['search']) ? $_GET['search'] : null;
	if ($search != null) {
		$images = do_flickr_search($search);
	}
?>

<!DOCTYPE HTML>
<html>
  <?php include 'views/header.php';?>
  <body>
  	<?php include 'views/top_menu.php';?>
  	<div id="main">
  		<?php include 'views/lightbox.php';?>
	  		<?php
	  			if ($images != -1) {
	  				echo('<div id="scrollable">');
	  				for ($i = 0; $i < count($images); $i++) {
	  					$thumbnail = $images[$i]['thumbnail'];
	  					$full_size = $images[$i]['full'];
	  					$title = $images[$i]['title'];
	  					echo('<div class="imagesection">');
	  					echo('<img nb-slide="'.($i+1).'" full="'.$full_size.'" class="scrollable_img" src="'.$thumbnail.'" alt="images">');
	  					echo('<p class="img-title">'.$title.'</p></div>');
	  				}
	  			}
	  			echo('</div>');
	  		?>
  	</div>
  	<?php include 'views/footer.php';?>
  </body>
</html>