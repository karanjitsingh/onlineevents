<div id="jigsaw">
	<div class="story"><div><?php
			$result =$conn->query("select data from crossworld_qbank where level=$level and qno=$question;");
			$data = $result->fetch_assoc();
			echo $data['data'];

		?>

		<div onclick="showJigsaw()" class="next"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve"><polygon id="arrow-24-icon" points="206.422,462 134.559,390.477 268.395,256 134.559,121.521 206.422,50 411.441,256 "/></svg></div></div>
	</div>
	<table>
		<tr>
			<td rowspan="2" style="width:800px; height:602px; vertical-align:top;">
				<div id="jigsaw-container">
					<?php

						if(!file_exists("../content/level$level/jigsaw/")) {
							exit();
						}

						function endsWith($haystack, $needle) {
					    	return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
						}

						$dir="content/level$level/jigsaw/";

						chdir("../content/level$level/jigsaw/");
						$file = fopen("answer.json", "r");
						$json = json_decode(fread($file, filesize("answer.json")));

						$filenames = array();

						for($x=1;$x<=5;$x++)
						for($y=1;$y<=4;$y++)
						{
							array_push($filenames,$json->pieces->{"$x$y"}->file);
						}


						$files = scandir("./");
						$f=0;

						

						for($i =0 ;$i<count($files);$i++) {
							if(endsWith($files[$i],".png")) {
								//$f=substr($files[$i],0,2);
								$index= array_search($files[$i], $filenames);
								$f = intval((intval($index)/4 + 1)).(intval($index)%4 + 1);
								$size=getimagesize($json->pieces->{"$f"}->file);
								/*if(($json->pieces->{"$f"}->rotation / 90)%2 == 2) {
									$temp = $size[0];
									$size[0] = $size[1];
									$size[1] = $temp;
								}*/
								//$json["pieces"][$f]=array();
								//$json["pieces"][$f]['rotation']="0";
								//$json["pieces"][$f]['file']=$files[$i];
								$angle=(rand(1,3)*90)."deg";
								//$angle=0;
								echo "<div rot=\"$angle\" class=\"piece\" pos=\"-1\" style=\"background:url($dir".$files[$i].");width:$size[0]px;height:$size[1]px;left:10px;top:10px;transform:rotate($angle)\"\></div>";
							}
						}

						/*for($x=1;$x<=5;$x++)
						for($y=1;$y<=4;$y++)
						{
							if($json->pieces->{"$x$y"}->file == "5S6Ju.png")
							{
								echo ($json->pieces->{"$x$y"}->rotation / 90)%2;
							}
							$size=getimagesize($json->pieces->{"$x$y"}->file);
							if(($json->pieces->{"$x$y"}->rotation / 90)%2 == 2) {
								$temp = $size[0];
								$size[0] = $size[1];
								$size[1] = $temp;
							}
							echo "<div class=\"piece\" pos=\"-1\" rot=\"".$json->pieces->{"$x$y"}->rotation."\" style=\"background:url($dir".$json->pieces->{"$x$y"}->file.");width:$size[0]px;height:$size[1]px;left:10px;top:10px;\"\></div>";
							
						}*/
						fclose($file);
						
					?>
				</div>
			</td>
			<td style="text-align:right; vertical-align:top;">
				<span class="heading">Level <?php echo $level ?><br/>Question <?php echo $question ?></span>
			</td>

		</tr>
		<tr>
			<td style="text-align:right; vertical-align:bottom;"><a class="submit" onclick="submitSolution()">Submit</a></td>
		</tr>
	</table>
</div>