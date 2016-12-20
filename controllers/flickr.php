<?php

	// Get images from FLICKR search result
	function get_images_source($search_result) {
		if ($search_result['stat'] == 'ok') {
			$res = array();
			$j = 0;
			while ($j < 50) {
				$id = $search_result['photos']['photo'][$j]['id'];
				$farm = $search_result['photos']['photo'][$j]['farm'];
				$secret = $search_result['photos']['photo'][$j]['secret'];
				$server = $search_result['photos']['photo'][$j]['server'];
				$title = $search_result['photos']['photo'][$j]['title'];
				$photo_thumb = "https://farm$farm.staticflickr.com/$server/".$id."_".$secret."_m.jpg";
				$photo_full = "https://farm$farm.staticflickr.com/$server/".$id."_".$secret."_b.jpg";
				$img = array();
				$img['title'] = $title;
				$img['thumbnail'] = $photo_thumb;
				$img['full'] = $photo_full;
				array_push($res, $img);
				$j++;
			}
			return $res;
		} else {
			error_log("ERROR : Fail to request FLICKR API");
			return -1;
		}
	}

	// Get flickr dataset based on $tag
	function do_flickr_search($tag) {
		$search_url = "https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=41d7c15511b17a33b022d20a32a66f9b&tags=".$tag."&per_page=50&page=2&format=php_serial";

		$curl = curl_init($search_url);

		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $search_url
		));
		// GET FLICKR 50 first images
		$resp = curl_exec($curl);
		curl_close($curl);

		$res = get_images_source(unserialize($resp));
		return $res;
	}
?>