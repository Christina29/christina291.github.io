<?php
require('header.inc');
?>
<?php
	$DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];
?>

<html>
<head>
	<title>������������ "������" - ������ ��������</title>
</head>
<body>

<h1> ������������ ������ � 3 �� ����: "���������� � �������������� ������ ����������� ���� MySQL"</h2>
<h3>������ ��������</h3>

<?php

$hostname="localhost";
$user="root";
$password="";
$db="lab3";

if(!$link = mysql_connect($hostname, $user, $password))

{
	//echo "<br> �� ���� ����������� � �������� ���� ������<br>";
	exit();
}
echo "<br> ���������� � �������� ���� ������ ������ �������<br>";

if(!mysql_select_db($db, $link))
{
	echo "<br> �� ���� ������� ���� ������<br>";
	exit();
}
else
{
	echo "<br> ����� ���� ������ ������ �������<br>";
}

$query_1="select zakaz.id, zakaz.fio, zakaz.address, zakaz.data, tovar.id, tovar.cakeqty, tovar.candyqty, tovar.cookieqty from zakaz, tovar where zakaz.id=tovar.id order by zakaz.data";
$result_1=mysql_query($query_1);

?>
<table border=1 color=black width=100% height=50%>
<tr>
<td><b>�</b></td><td><b>���</b></td><td><b>�����</b></td><td><b>���� ������</b></td><td><b>��������</b></td><td><b>�������</b></td><td><b>�������</b></td>

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



?> </table> <?

?>
</body>
</html>

<?php
require('footer.inc');
?>