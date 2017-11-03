<?php
require('header.inc');
?>

<?php
	$cakeqty =$_POST['cakeqty'];
	$candyqty=$_POST['candyqty'];
	$cookieqty=$_POST['cookieqty'];
	$address=$_POST['address'];

	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<head>
	<title>Кондитерская "Восход" - Результаты заказа</title>
</head>
<body>

<h1> Лабораторная работа № 2 по теме: "Сохранение и воcстановление данных посредством текстовых файлов"</h1>
<h2>Кондитерская "Восход"</h2>
<h3>Результаты заказа</h3>

<?php
	$totalqty=0;
	$totalqty += $cakeqty;
	$totalqty += $candyqty;
	$totalqty += $cookieqty;

	$totalamount= 0.00;
	
	define('CAKEPRICE',50);
	define('CANDYPRICE',150);
	define('COOKIEPRICE', 60);
	
	$date = date('H:i, jS F');
	
	echo '<p>Заказ обработан в ';
	echo $date;
	echo'<br />';
	echo '<p>Список вашего заказа: ';
	echo '<br />';

	if ($totalqty==0)
	{
		echo 'Вы ничего не заказали на предыдущей странице!<br />';
	}
	else
	{
		if ($cakeqty>0) echo $cakeqty. ' Пирожных <br />';
		if ($candyqty>0) echo $candyqty. ' Коробок конфет <br />';
		if ($cookieqty>0) echo $cookieqty. ' Печенья <br />';
	}

	$total = $cakeqty*CAKEPRICE + $candyqty*CANDYPRICE+$cookieqty*COOKIEPRICE;
	$total=number_format($total,2,'.',' ');
	

	echo '<p> Итого к заказу: '.$total.'</p>';
	echo '<p> ФИО клиента: '.$fio.'</p>';
	echo '<p> Адрес доставки'.$address.'<br />';

	$outputstring = $date."\t".$cakeqty." пирожных\t".$candyqty."  коробок конфет\t".$cookieqty." печенья\t\$".$total."\t Адрес доставки товара\t". $address."\t ФИО клиента: ".$fio."\n";


	//Открыть файл для добавления

	$fp = fopen("orders.txt", 'a');

	flock($fp, LOCK_EX);

	if(!$fp)
	{
		echo '<p><strong>В настоящий момент ваш запрос не может быть обрботан. '. '.</strong></p></body></html>';
	exit;

	}
	fwrite($fp, $outputstring);
	flock($fp, LOCK_UN);
	fclose($fp);

	echo '<p>Заказ сохранен.</p>';
?>

<a href="vieworders_2.php"> Интерфейс персонала для просмотра файла</a>

</body>
</html>


