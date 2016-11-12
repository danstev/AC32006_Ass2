<?php
function printTable($result)
{
	echo "<br><table border=\"5\" bordercolor=\"black\"cellpadding=\"10\" width=\"100%\" style=\"border-collapse:collapse\" align=\"center\"><tr>";
		$i=0;
		while($i < mysql_num_fields($result))
		{
			$heading = mysql_fetch_field($result, $i);
			echo "<th>" . $heading->name . "</th>";
			$i++;
		}
	echo "</tr>";		
			while($row = mysql_fetch_array($result))
			{
				$x=0;
				echo '<tr>';
				while($x < mysql_num_fields($result))
				{
					echo "<td>" . $row[$x] . "</td>";
					$x++;
				}
			echo '</tr>';
		}
 		echo "</table>";
	return true;
}
?>