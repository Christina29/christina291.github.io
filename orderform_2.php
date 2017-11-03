<?php
require('header.inc');
?>
<html>
<head>
	<title>Кондитерская "Восход"</title>
</head>
<h1>Лабораторная работа № 2 по теме: Сохранение и восстановление данных посредством текстовых файлов</h1>
<h2>Кондитерская "Восход"</h2>
<h3>Форма заказа</h3>

<form action="processorder_2.php" method=post>
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
<?php
require('footer.inc');
?>