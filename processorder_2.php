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
	<title>������������ "������" - ���������� ������</title>
</head>
<body>

<h1> ������������ ������ � 2 �� ����: "���������� � ��c����������� ������ ����������� ��������� ������"</h1>
<h2>������������ "������"</h2>
<h3>���������� ������</h3>

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
	
	echo '<p>����� ��������� � ';
	echo $date;
	echo'<br />';
	echo '<p>������ ������ ������: ';
	echo '<br />';

	if ($totalqty==0)
	{
		echo '�� ������ �� �������� �� ���������� ��������!<br />';
	}
	else
	{
		if ($cakeqty>0) echo $cakeqty. ' �������� <br />';
		if ($candyqty>0) echo $candyqty. ' ������� ������ <br />';
		if ($cookieqty>0) echo $cookieqty. ' ������� <br />';
	}

	$total = $cakeqty*CAKEPRICE + $candyqty*CANDYPRICE+$cookieqty*COOKIEPRICE;
	$total=number_format($total,2,'.',' ');
	

	echo '<p> ����� � ������: '.$total.'</p>';
	echo '<p> ��� �������: '.$fio.'</p>';
	echo '<p> ����� ��������'.$address.'<br />';

	$outputstring = $date."\t".$cakeqty." ��������\t".$candyqty."  ������� ������\t".$cookieqty." �������\t\$".$total."\t ����� �������� ������\t". $address."\t ��� �������: ".$fio."\n";


	//������� ���� ��� ����������

	$fp = fopen("orders.txt", 'a');

	flock($fp, LOCK_EX);

	if(!$fp)
	{
		echo '<p><strong>� ��������� ������ ��� ������ �� ����� ���� ��������. '. '.</strong></p></body></html>';
	exit;

	}
	fwrite($fp, $outputstring);
	flock($fp, LOCK_UN);
	fclose($fp);

	echo '<p>����� ��������.</p>';
?>

<a href="vieworders_2.php"> ��������� ��������� ��� ��������� �����</a>

</body>
</html>


