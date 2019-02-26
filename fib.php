<?php
	$count=0;
	$first=1;
	$second=1;
	$now=0;
	echo "1 1 ";
	while ($count != 62)
	{
		$count=$count+1;
		$now=$first+$second;
		echo $now." ";
		$first=$second;
		$second=$now;
	}
?>