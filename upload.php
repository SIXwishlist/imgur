<?php
	error_reporting(0);
	function upload_to_imgur($image){
		$image = file_get_contents($image);
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.imgur.com/3/image",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => array('image' => base64_encode($image)),
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_HTTPHEADER => array(
		"Authorization: Client-ID YOUR_APP_CLIENT_ID",
		"content-type: multipart/form-data;"
		),
	));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		$data = $err;
		} else {
		$data = json_decode($response,true);
		}
		return $data;
	}

	function upload_image($path,$image_name){
	
	$target_dir = $path;
	$image = $image_name;
	$target_file = $target_dir . basename($image);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	
		$check = getimagesize($image);
		if($check !== false) {
			
			move_uploaded_file($image, $target_file);
			$image = $target_file;
			$image = upload_to_imgur($image);
				if($image['success'] == 1){
					unlink($target_file);
					$data = json_encode($image);
				}
		
		}else{
			$data = "File is not an image.";
		}
		return $data;
	}
?>