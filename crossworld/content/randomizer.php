<?php
	function createButton($name, $url) {
		echo "<input onclick=\"document.location.href='$url'\" value='$name' type=button style='width:auto;' />";
	}

	function endsWith($haystack, $needle) {
    	return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
	}

	function generateRandomString($length = 5) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
    	return $randomString;
	}

	function rotatePng($filename,$degrees) {
		ob_start();


		// open the image file
		$im = imagecreatefrompng( $filename );

		// create a transparent "color" for the areas which will be new after rotation
		// only quadratic images will not change dimensions
		// r=0,b=0,g=0 ( black ), 127 = 100% transparency - we choose "invisible black"
		$transparency = imagecolorallocatealpha( $im,0,0,0,127 );

		// rotate, last parameter preserves alpha when true
		$rotated = imagerotate( $im, $degrees, $transparency, 1);

		// disable blendmode, we want real transparency
		imagealphablending( $rotated, false );
		// set the flag to save full alpha channel information
		imagesavealpha( $rotated, true );

		// now we want to start our output
		ob_end_clean();
		// we send image/png
		//header( 'Content-Type: image/png' );
		//imagepng( $rotated );
		// clean up the garbage
		imagepng($rotated,$filename);
		imagedestroy( $im );
		imagedestroy( $rotated );
	}

	if(isset($_GET['puzzle'])) {
		$url = $_SERVER['REQUEST_URI'];
		chdir($_GET['puzzle']."/jigsaw/");
		if(isset($_GET['f']))
		{

			switch ($_GET['f']) {
				case 'randomize':
					$file = fopen("answer.json", "r");
					$json = json_decode(fread($file, filesize("answer.json")));


					for($x=1;$x<=5;$x++)
					for($y=1;$y<=4;$y++)
					{
						$r="";
						do {
							$r=generateRandomString().".png";
						} while(file_exists($r));
						rename($json->pieces->{"$x$y"}->file,$r);
						$json->pieces->{"$x$y"}->file=$r;
						//$angle=$json->pieces->{"$x$y"}->rotation=rand(1,3)*90;
						//rotatePng($r,$angle);
						$json->pieces->{"$x$y"}->rotation=0;
					}
					$json = json_encode($json);

					print_r($json);
					$file = fopen("answer.json", "w");
					fwrite($file, $json);
					fclose($file);
					break;
				
				case 'derandomize':
					$file = fopen("answer.json", "r");
					$json = json_decode(fread($file, filesize("answer.json")));


					for($x=1;$x<=5;$x++)
					for($y=1;$y<=4;$y++)
					{
						$r="$x$y.png";
						rename($json->pieces->{"$x$y"}->file,$r);
						$json->pieces->{"$x$y"}->file=$r;
						
						//$angle=360-intval($json->pieces->{"$x$y"}->rotation);
						//echo "$angle  ".intval($json->pieces->{"$x$y"}->rotation)."<br />";
						//rotatePng($r,$angle);
						$json->pieces->{"$x$y"}->rotation=0;
					}
					$json = json_encode($json);

					print_r($json);
					$file = fopen("answer.json", "w");
					fwrite($file, $json);
					fclose($file);
					break;
				case 'generate':
					$json = array("pieces" => array());
					$files = scandir("./");

					$f=0;
					for($i =0 ;$i<count($files);$i++) {
						if(endsWith($files[$i],".png")) {
							$f=substr($files[$i],0,2);
							$json["pieces"][$f]=array();
							$json["pieces"][$f]['rotation']="0";
							$json["pieces"][$f]['file']=$files[$i];
						}
					}
					$json = json_encode($json);

					print_r($json);
					$file = fopen("answer.json", "w");
					fwrite($file, $json);
					fclose($file);
					break;

			}
		}
		else {
			if(file_exists("answer.json")) {
				createButton("randomize",$url."&f=randomize");
				createButton("derandomize",$url."&f=derandomize");
			}
			else
			{
				createButton("Generate answer json",$url."&f=generate");
			}
		}
	}
	else {
		$dirs = scandir("./");

		for($i =0; $i<count($dirs);$i++)
		{
			if(is_dir($dirs[$i]))
				if(substr($dirs[$i], 0,5)=="level")
					createButton(substr($dirs[$i], 0,7),"?puzzle=".$dirs[$i]);
		}
	}

?>