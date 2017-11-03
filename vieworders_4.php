<?php
require('header.inc');
?>

<h1> Лабораторная работа № 4 по теме: "Сохранение и воcстановление данных посредством использования массивов и текстовых файлов"</h2>
<h2>Заказы клиентов</h2>

<?php
//Считывание всего файла
//Каждый заказ становится элементом массива
$orders=file("orders_4.txt");
//Подсчет количеста заказов, хранящихся в массиве
$number_of_orders=count($orders);

echo 'Количество заказов: ',"$number_of_orders";

if ($number_of_orders == 0)
{
	echo '<p><strong>Нет ожидающих заказов. Пожалуйста, попытайтесь позже.</strong></p>';
}

echo '<table border=1>';
echo '<tr><th bgcolor=\"#CCCCFF\"> Дата заказа </th>' . 
		'<th bgcolor=\"#CCCCFF\">Пирожных </th>' .
		'<th bgcolor=\"#CCCCFF\">Корбок конфет </th>'.
		'<th bgcolor=\"#CCCCFF\">Печенья </th>'.
		'<th bgcolor=\"#CCCCFF\">Всего </th>'.
		'<th bgcolor=\"#CCCCFF\">Адрес клиента </th>'.
		'<th bgcolor=\"#CCCCFF\">ФИО клиента </th>'.
	'</tr>';

for ($i=0; $i<$number_of_orders; $i++)
{
	//разбиение строк
	$line = explode("\t", $orders[$i]);
	//Сохранение только количества заказанных товаров
	$line[1]=intval($line[1]);
	$line[2]=intval($line[2]);
	$line[3]=intval($line[3]);
	//вывод заказов
	echo "<tr><td>$line[0]</td>
				<td align='right'>$line[1]</td>
				<td align='right'>$line[2]</td>
				<td align='right'>$line[3]</td>
				<td align='right'>$line[4]</td>
				<td>$line[6]</td>
				<td>$line[8]</td>
	
	</tr>";
}

echo "</table>";


require('footer.inc');
?>