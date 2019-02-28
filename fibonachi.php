<?php
	$count=0;//счетчик элементов фиб.
	$first=1;//предыдущий элемент
	$second=1;//седующий элемент
	$now=0;//текущий элемент
	echo "1 1 ";//вывод первых двух элементов
	while ($count != 62)
	{
		$count=$count+1;
		$now=$first+$second;
		echo $now." ";
		$first=$second;
		$second=$now;
	}
?>