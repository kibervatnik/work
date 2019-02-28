<?php
	class Rect //класс прямоугольника
	{
		public $type=1;
		public $length;//длина
		public $weight;//ширина
		public function randrect() //функция рандомизации
		{
			$this->length=rand(1,100);
			$this->weight=rand(1,100);
		}
		public function square_r() // функция нахождения площади
		{
			$s=$this->length*$this->weight;
			return $s;
		}
	}
	class Circle // класс круга
	{
		public $type=2;
		public $rad;//радиус
		public function randcircle() // функция рандомизации
		{
			$this->rad=rand(1,100);
		}
		public function square_c() // функция нахождения площади
		{
			$s=3.14*$this->rad*$this->rad;
			return $s;
		}
	}
	class Pyr // класс пирамиды
	{
		public $type=3;
		public $height;//высота
		public $cangle;//кол-во углов в основании
		public function randpyr() // функция рандомизации
		{
			$this->height=rand(1,100);
			$this->cangle=rand(3,100);
		}
		public function square_p() // функция нахождения площади
		{
			return 0;
		}
	}
	//////////////////////////////////////////////////////////////////////
	function filling() // функция заполнения массива фигур
	{
		$finish=rand(1,15);//выставляем рандомное кол-во фигур в массиве
		$figures=array();//создаем массив
		for ($i = 1; $i <= $finish; $i++){
			$type=rand(1,3);
			if($type==1){
				$figures[$i]=new Rect();//создание класса в ячейке массива
				$figures[$i]->randrect();//рандомное заполнение класса
			}
			if($type==2){
				$figures[$i]=new Circle();
				$figures[$i]->randcircle();
			}
			if($type==3){
				$figures[$i]=new Pyr();
				$figures[$i]->randpyr();
			}

		}
		return $figures;
	}
	//////////////////////////////////////////////////////////////////////
	function save($figures) // функция сохранения данных в файл
	{
		$fp = fopen("test.txt", "a+");// открытие файла
		$temp="";
		$i=0; 
		foreach ($figures as $fig){//пробегаем по массиву данных
			if ($fig->type==1){
				$temp="1".",".(string)$fig->length.",".(string)$fig->weight."[Rectangle,Length,Weight]";//записываем строку с данными о классе
				$test = fwrite($fp, $temp."\r\n");//переносим строчку в файл с переносом на следующую строчку
			}
			if ($fig->type==2){
				$temp="2".",".(string)$fig->rad."[CirCle,Radius]";
				$test = fwrite($fp, $temp."\r\n");
			}
			if ($fig->type==3){
				$temp="3".",".(string)$fig->height.",".(string)$fig->cangle."[Pyramid,Height,Cangle]";
				$test = fwrite($fp, $temp."\r\n");
			} 
		}
		fclose($fp);
	}
	///////////////////////////////////////////////////////////////////////
	function load() // функция загрузки данных из файла
	{
		$figures=array();
		$fp = fopen('test.txt', 'rt');//открываем файл для чтения
		$count=0;
		$num=0;
		while (!feof($fp)){
			$type=0;
			$mytext = fgetc($fp);
			if ($mytext >"0" && $mytext <"1000" ){//ищем значения класса с помощью конвертации символа в инт
				if ($count==0 && (int)$mytext==1){
					$type=1;
					$figures[$num]=new Rect();//создаем новый класс 
					$num=$num+1;//кол-во элементов в массиве увеличилось
					$count=$count+1;//порядок действий сменился
				}
				if ($count==0 && (int)$mytext==2){
					$type=2;
					$figures[$num]=new Circle();
					$num=$num+1;
					$count=$count+1;
				}
				if ($count==0 && (int)$mytext==3){
					$type=3;
					$figures[$num]=new Pyr();
					$num=$num+1;
					$count=$count+1;
				}
		///////////////////////////////////////
				if ($count==1 && $type==1){
					$figures[$num-1]->length=(int)$mytext;//заносим значения класса
					$count=$count+1;//порядок действий сменился
				}
				if ($count==1 && $type==2){
					$figures[$num-1]->rad=(int)$mytext;
					$count=$count+1;
				}
				if ($count==1 && $type==3){
					$figures[$num-1]->height=(int)$mytext;
					$count=$count+1;
				}
		///////////////////////////////////////
				if ($count==2 && $type==1){
				$figures[$num-1]->weight=(int)$mytext;
				$count=0;
				}
				if ($count==2 && $type==3){
					$figures[$num-1]->cangle=(int)$mytext;
					$count=0;//порядок действий обнулился
				}
				if ($count==2 && $type==2){
					$count=0;
				}
			}
		}
		return $figures;
		fclose($fp);
	}
	////////////////////////////////////////////////////////////////////////////////////////
	function sorting($arr) // функция сортировки данных в массиве(метод пузырька)
	{
		for($i=0; $i<count($arr); $i++)
		{
           for($j=$i+1; $j<count($arr); $j++)
           {
           		if($arr[$i]->type==1)
           		{
           			$first=$arr[$i]->square_r();//находим площадь первого элемента в зависимости от типа фигуры
           		}
           		if($arr[$i]->type==2)
           		{
           			$first=$arr[$i]->square_c();
           		}
           		if($arr[$i]->type==3)
           		{
           			$first=$arr[$i]->square_p();
           		}
           		//////////////////////////////////////////
           		if($arr[$j]->type==1)
           		{
           			$second=$arr[$j]->square_r();//находим площадь пвторого элемента в зависимости от типа фигуры
           		}
           		if($arr[$j]->type==2)
           		{
           			$second=$arr[$j]->square_c();
           		}
           		if($arr[$j]->type==3)
           		{
           			$second=$arr[$j]->square_p();
           		}       
                
                if($first<$second)//сравниваем первый и второй элемент и заменяем их
                { 
                   $temp =  $arr[$j];
                   $arr[$j] = $arr[$i];
                   $arr[$i] = $temp;
                }
            }
        }
        $temp=$arr[count($arr)-1];//погрешность(не костыль)
        for($i=count($arr)-1;$i>0;$i--)
        {
        	$now=$arr[$i];
        	$arr[$i]=$arr[$i-1]; 
        	$arr[$i-1]=$now; 
        }
        $arr[0]=$temp; 
       	return $arr;
    }
    function print_mas($arr) // функция вывода данных
    {
       foreach ($arr as $i)
       {
          if ($i->type == 1)
          {
          	echo "Rectangle square = " . $i->square_r() . "</br>"; //вывод строчки со значением площади
          }
          if ($i->type == 2)
          {
          	echo "CirCle Square = " . $i->square_c() . "</br>"; 
          }

          if ($i->type == 3)
          {
          	echo "Pyramid square = " . $i->square_p() . "</br>"; 
          }
       }
    }


	$maiarray=filling(); // создание нового массива фигур
	save($maiarray); // сохранение текущего массива фигур
	print_mas($maiarray); // вывод текущего массива фигур
	echo "</br>"; 
	$arr=load($maiarray); // загрузка из файла массива фигур
    $maiarray=sorting($maiarray); // сортировка текущего массива фигур
	print_mas($maiarray);  // вывод текущего массива фигур
?>