<?php
require('header.inc');
?>

<?php
	$cakeqty =$_POST['cakeqty'];
	$candyqty=$_POST['candyqty'];
	$cookieqty=$_POST['cookieqty'];
	$address=$_POST['address'];

	$DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];
	
$hostname="localhost";
$user="root";
$password="";
$db="lab3";

if(!$link = mysql_connect($hostname, $user, $password))

{
	//echo "<br> не могу соединиться с сервером базы данных<br>";
	exit();
}
echo "<br> Соединение с сервером базы данных прошло успешно<br>";

if(!mysql_select_db($db, $link))
{
	//echo "<br> не могу выбрать базу данных<br>";
	exit();
}
else
{
	echo "<br> Выбор базы данных прошел успешно<br>";
}
?>
<html>
<head>
	<title>Кондитерская "Восход" - Результаты заказа</title>
</head>
<body>

<h1> Лабораторная работа № 3 по теме: "Сохранение и восстановление данных посредством СУБД - MySQL"</h1>
<h2>Кондитерская "Восход"</h2>
<h3>результаты заказа</h3>

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
	echo '<p> Адрес доставки: '.$address.'<br />';

	$outputstring = $date."\t".$cakeqty." пирожных\t".$candyqty."  коробок конфет\t".$cookie." печенья\t\$".$total."\t Адрес доставки товара\t". $address."\t ФИО клиента: ".$fio."\n";

//Открыть файл для добавления

	$date_1=date("Y-m-d h:i:s", mktime());

	$query="insert into zakaz(fio, address, data) values('$fio','$address', '$date_1')";
	$result=mysql_query($query);

	$query_1="select zakaz.id  from zakaz where zakaz.fio='$fio' ";
	$result_1=mysql_query($query_1);
	
	
	while($row=mysql_fetch_array($result_1))
	{ 	
		$id=$row["id"];
	}

	$query="insert into tovar (id, cakeqty, candyqty, cookieqty) values('$id', '$cakeqty', '$candyqty', '$cookieqty')";
	$result=mysql_query($query);

	echo'<p>Заказ сохранен.</p>';
?>

<a href="vieworders_3.php"> Интерфейс персонала для просмотра файла заказов</a>

</body>
</html>
<?php
require('footer.inc');
?>