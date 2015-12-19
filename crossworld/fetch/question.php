<?php
	$result =$conn->query("select data from crossworld_qbank where level=$level and qno=$question;");
	$data = $result->fetch_assoc();
?>
<div id="question">
	<table class="wrapper">
		<tr>
		<td>
			<table>
				<tr>
					<td style="padding-bottom:60px;"><span class="heading">Level <?php echo $level ?>, Question <?php echo $question ?></span></td>
				</tr>
				<tr>
					<td style="padding:30px 30px 60px 30px;" colspan="2">
						<span class="q"><?php 

							$file=fopen("../content/level$level/raw/".$data['data'],"r");
							echo fread($file, filesize("../content/level$level/raw/".$data['data']));
							fclose($file);

						?></span>
						<?php 

							$result = $conn->query("select image from crossworld_qbank where qno=$question and level = $level;");
							$data = $result->fetch_assoc();
							$image = $data['image'];
							if(!is_null($image)) {
								echo "<br /><a class=\"image\" target=\"_blank\" href=\"./content/level$level/$image\">Image</a>";
							}

						?>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:bottom; padding:0px 10px 0px 30px;">
						<input id="answer" type="text" placeholder="Answer" />
						<label for="answer" />
					</td>
					<td style="width:80px; padding:0px 30px 1px 0px;">
						<a class="submit" onclick="submitSolution()">Submit</a>
					</td>
				</tr>
			</table>
		</td>
		</tr>
	</table>
</div>