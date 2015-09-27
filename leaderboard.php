<?php


	function getMechatronLeaderboard() {
		global $conn;
		$qry = "SELECT Username FROM oe_mechatron_users order by  CAST(Score as UNSIGNED INTEGER) desc limit 5";
		$result = mysqli_query($conn,$qry);
		$rowcount=mysqli_num_rows($result);
		$names = "";
		for($i=0;$i<$rowcount;$i++) {
			$row=mysqli_fetch_assoc($result);
			
			if($i)
				$names .= ", ";
			$names.=$row['Username'];
		}
		return $names;
	}
	
	
?>