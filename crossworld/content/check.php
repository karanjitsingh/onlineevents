<?php

			$level=1;
			$answer="0016040217090113150718080314191110051206";

		 				chdir("../content/level$level/jigsaw/");
	 				$valid = true;
					$file = fopen("answer.json", "r");
					$json = json_decode(fread($file, filesize("answer.json")));

					$filenames = array();

					for($x=1;$x<=5;$x++)
					for($y=1;$y<=4;$y++)
					{
						array_push($filenames,$json->pieces->{"$x$y"}->file);
					}


					$files = glob('*.png', GLOB_BRACE);scandir("./");

					print_r($filenames);
					echo "<br/>";
					print_r($files);

					for($i =0 ;$i<count($files);$i++) {
						$x=intval(substr($answer, $i*2,2));
						//echo "$x,$i<br>$filenames[$x]" ;
						echo $files[$i]."==".$filenames[$x]."<br>";
						if($files[$i] !== $filenames[$x] || $x <0 || $x>19 ) {
							$valid=false;
							echo "false";
							break;
						}
					}

					echo "true";

 					fclose($file);

?>