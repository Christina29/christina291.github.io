<?php
require('header.inc');
?>
<html>
<head>
	<title>������������ "������" - ���������� ������</title>
</head>
<body>

<h1> ������������ ������ � 1 �� ����: "�������� ������ �� ����� � �������� ��������� � �� ����������� ���������"</h1>
<h2>������������ "������"</h2>
<h3>���������� ������</h3>

<?php
	echo '<p>����� ��������� � ';
	echo date('H:i, jS F');
	echo '</p>';

	$cakeqty =$_POST['cakeqty'];
	$candyqty=$_POST['candyqty'];
	$cookieqty=$_POST['cookieqty'];

	echo '<p>������ ������ ������: </p>';
	echo $cakeqty . ' ��������</br>';
	echo $candyqty . ' ������� ������</br>';
	echo $cookieqty . ' �������</br>';

	$totalqty=0;
	$totalqty=$cakeqty + $candyqty + $cookieqty;
	echo '�������� �������: '.$totalqty.'</br>';
	

	$totalamount = 0.00;
	
	define('CAKEPRICE',50);
	define('CANDYPRICE',150);
	define('COOKIEPRICE', 60);

	$totalamount = $cakeqty*CAKEPRICE + $candyqty*CANDYPRICE+$cookieqty*COOKIEPRICE;
	echo '�����: $'.number_format($totalamount,3). '</br>';

	$taxrate=0.10;
	$totalamount =$totalamount*(1+$taxrate);
	echo '�����, ������� ����� � ������: $' . number_format($totalamount,2). '<br>';

?>
�� ������ ��� �� ����� ���� �������� ��� ������� �����: <? echo $find; ?>
</body>
</html>
<?php
require('footer.inc');
?>