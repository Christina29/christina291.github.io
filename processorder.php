<?php
require('header.inc');
?>
<html>
<head>
	<title>Кондитерская "Восход" - Результаты заказа</title>
</head>
<body>

<h1> Лабораторная работа № 1 по теме: "Передача данных из формы в основную программу и их последующая обработка"</h1>
<h2>Кондитерская "Восход"</h2>
<h3>Результаты заказа</h3>

<?php
	echo '<p>Заказ обработан в ';
	echo date('H:i, jS F');
	echo '</p>';

	$cakeqty =$_POST['cakeqty'];
	$candyqty=$_POST['candyqty'];
	$cookieqty=$_POST['cookieqty'];

	echo '<p>Список вашего заказа: </p>';
	echo $cakeqty . ' пирожных</br>';
	echo $candyqty . ' коробок конфет</br>';
	echo $cookieqty . ' печенья</br>';

	$totalqty=0;
	$totalqty=$cakeqty + $candyqty + $cookieqty;
	echo 'Заказано товаров: '.$totalqty.'</br>';
	

	$totalamount = 0.00;
	
	define('CAKEPRICE',50);
	define('CANDYPRICE',150);
	define('COOKIEPRICE', 60);

	$totalamount = $cakeqty*CAKEPRICE + $candyqty*CANDYPRICE+$cookieqty*COOKIEPRICE;
	echo 'Итого: $'.number_format($totalamount,3). '</br>';

	$taxrate=0.10;
	$totalamount =$totalamount*(1+$taxrate);
	echo 'Всего, включая налог с продаж: $' . number_format($totalamount,2). '<br>';

?>
На вопрос как Вы нашли нашу компанию был получен ответ: <? echo $find; ?>
</body>
</html>
<?php
require('footer.inc');
?>