<div id="story">
<div class="cover" style="background-image:url(./content/level<?php  echo $level; ?>/cover.jpg);"></div>
<div class="tint"></div>
<div class="story"><div><?php

			$file = fopen("../content/level$level/intro.html", "r");
			echo fread($file, filesize("../content/level$level/intro.html"));
			fclose($file);
		?>
		<a class="submit" onclick="startLevel()">Start</a></div></div>
</div>

</div>