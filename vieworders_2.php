<?php
require('header.inc');
?>
<?php
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>

<html>
<head>
	<title>Кондитерская "Восход" - Результаты заказа</title>
</head>
<body>

<h1> Лабораторная работа № 2 по теме: "Сохранение и воcстановление данных посредством текстовых файлов"</h2>
<h3>Заказы клиентов</h3>

<?php
	$fp = fopen("orders.txt",'r');
	
	if (!$fp)
	{
		echo '<p><strong>Нет ожидающих заказов.'. 'Пожалуйста, попытайтесь позже.</strong></p>';
		exit;
	}

	while (!feof($fp))
	{
		$order = fgets($fp, 999);
		echo $order. '<br />';
	}

	fclose($fp);
?>

</body>
</html>


<?php
require('footer.inc');
?>