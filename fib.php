<?php
	$count=0;
	$do=1;
	$posle=1;
	$now=0;
	echo "1 1 ";
	while ($count != 64)
	{
		$count=$count+1;
		$now=$do+$posle;
		echo $now;
		echo " ";
		$do=$posle;
		$posle=$now;
	}
?>