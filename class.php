<?
class Page
{
function header()
{ 
?>
<html>
<head>
 <title>РЭУ им. Г. В. Плеханова Кемеровский институт</title>
 <meta http-equiv="Content-Type" content="text/html;  charset=windows=1251">
 <META name="Author" content="http://ailus.ru"><meta name="Copyright" content="http://ailus.ru">
 </head>
 
 <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" rightmargin="0" bottommargin="0" bgcolor="#ffffff">
 <link href="index.css" type="text/css" rel="STYLESHEET">
 
 <table border=1 width=100% height=20%>
 <tr>
 <td width=100% height=20% align=center> Лабораторные работы по курсу "Разработка интернет прилоджений" <br> Студентки группы ПИ-153 Голдаевой Кристины Олеговны <br> Проверил: к. т. н. доц. Назимов А. С.</td>
 
 </table>
 
 <table border=1 width=100%>
<td width=30%  align=left valign=top>
 
<a href="orderform.php"> Первая лабораторная рaбота </a>
<br><br>
<a href="orderform_2.php"> Вторая лабораторная рaбота </a>
<br><br>
<a href="orderform_3_1.php"> Третья лабораторная рaбота </a>
<br><br>
<a href="orderform_4.php"> Четвертая лабораторная рaбота </a>
<br><br>
<a href="orderform_5"> Пятая лабораторная рaбота </a>
<br><br>
<a href="index_6.php"> Шестая лабораторная рaбота </a>

</td>
<td width=70%  align=center>

<?

}

function footer()

{
?>
</td>
</table>


<table border=1 width=100% height=10%>

	<td width=100% height=10% align=center> Кемеровский институт (филиал) РЭУ им. Г. В. Плеханова, Кафедра вычислительной техники и информационных технологий, 2017</td>

</table>
</body>
</html>
<?
}

function orderform()
{
?>
<html>
<head>
	<title>Кондитерская "Восход"</title>
</head>
<h1>Лабораторная работа № 3 по теме: Сохранение и восстановление данных посредством СУБД - MySQL</h1>
<h2>Кондитерская "Восход"</h2>
<h3>Форма заказа</h3>

<form action="processorder_3_1.php" method=post>
<table border=0>
<tr bgcolor=#cccccc>
	<td width=150>Товар</td>
	<td width=15>Количество</td>
</tr>
<tr>
	<td>Пирожные</td>
	<td align="left"><input type="text" name="cakeqty" size="3" maxlength="3"></td>
</tr>
<tr>
	<td>Конфеты</td>
	<td align="left"><input type="text" name="candyqty" size="3" maxlength="3"></td>
</tr>
<tr>
	<td>Печенье</td>
	<td align="left"><input type="text" name="cookieqty" size="3" maxlength="3"></td>
</tr>
<tr>
	<td>ФИО клиента</td>
	<td align="left"><input type="text" name="fio" size="40" maxlength="40"></td>
</tr>
<tr>
	<td>Адрес доставки</td>
	<td align="left"><input type="text" name="address" size="40" maxlength="40"></td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" value="Отправить заказ"></td>
</tr>
</table>
</form>
</body>
</html>
<?
}

function connect()
{

$hostname="localhost";
$user="root";
$password="";
$db="lab3";

if(!$link = mysql_connect($hostname, $user, $password))

{
	echo "<br> не могу соединиться с сервером базы данных<br>";
	exit();
}
echo "<br> Соединение с сервером базы данных прошло успешно<br>";

if(!mysql_select_db($db, $link))
{
	echo "<br> не могу выбрать базу данных<br>";
	exit();
}
else
{
	echo "<br> Выбор базы данных прошел успешно<br>";
}

}

function processorder($cakeqty, $candyqty, $cookieqty, $fio, $address)
{
?>
<html>
<head>
	<title>Кондитерская "Восход" - Результаты заказа</title>
</head>
<body>

<h1> Лабораторная работа № 3 по теме: "Сохранение и восстановление данных посредством СУБД - MySQL"</h1>
<h2>Кондитерская "Восход"</h2>
<h3>результаты заказа</h3>

<?
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

	$outputstring = $date."\t".$cakeqty." пирожных\t".$candyqty."  коробок конфет\t".$cookiqty." печенья\t\$".$total."\t Адрес доставки товара: \t". $address."\t ФИО клиента: ".$fio."\n";

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

<a href="vieworders_3_1.php"> Интерфейс персонала для просмотра файла заказов</a>

</body>
</html>
<?
}

function vieworders()
{
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
	
?>
<html>
<head>
	<title>Кондитерская "Восход" - Заказы клиентов</title>
</head>
<body>

<h1> Лабораторная работа № 3 по теме: "Сохранение и воостановление данных посредством СУБД MySQL"</h2>
<h3>Заказы клиентов</h3>
<?
$query_1="select zakaz.id, zakaz.fio, zakaz.address, zakaz.data, tovar.id, tovar.cakeqty, tovar.candyqty, tovar.cookieqty from zakaz, tovar where zakaz.id=tovar.id order by zakaz.data";
$result_1=mysql_query($query_1);
?>

<table border=1 color=black width=100% height=100%>
<tr>
<td><b>№</b></td><td><b>ФИО</b></td><td><b>Адрес</b></td><td><b>Дата заказа</b></td><td><b>Пирожные</b></td><td><b>Конфеты</b></td><td><b>Печенье</b></td>

<?
while($row_1=mysql_fetch_array($result_1))
{
	$id=$row_1["id"];
	$fio=$row_1["fio"];
	$address=$row_1["address"];
	$data=$row_1["data"];
	$cakeqty=$row_1["cakeqty"];
	$candyqty=$row_1["candyqty"];
	$cookieqty=$row_1["cookieqty"];
?><tr>

<td> <? echo $id ?> </td><td> <? echo $fio ?> </td><td> <? echo $address ?> </td><td> <? echo $data ?> </td><td> <? echo $cakeqty ?> </td><td> <? echo $candyqty ?> </td><td> <? echo $cookieqty ?> </td>

</tr>
<?

}

?> </table> 
</body>
</html>

<?

}

}

?>