<?php
require('header.inc');
?>

<?php
	$cakeqty =$_POST['cakeqty'];
	$candyqty=$_POST['candyqty'];
	$cookieqty=$_POST['cookieqty'];
	$address=$_POST['address'];
	$fio=$_POST['fio'];
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<head>
	<title>������������ "������" - ���������� ������</title>
</head>
<body>

<h1> ������������ ������ � 4 �� ����: "���������� � ��c����������� ������ ����������� ������������ �������� � ��������� ������"</h1>
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
	echo '<p> ����� ��������: '.$address.'<br />';

	$product=array("$date", "$cakeqty", "$candyqty", "$cookieqty", "$total", "$address", "$fio");
	$outputstring = $product[0]."\t".$product[1]." ��������\t".$product[2]."  ������� ������\t".$product[3]." �������\t".$product[4]."\t ����� �������� ������: \t". $product[5]."\t ��� �������: \t".$product[6]."\n";


	//������� ���� ��� ����������

	$fp = fopen("orders_4.txt", 'a');

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

<a href="vieworders_4.php"> ��������� ��������� ��� ��������� �����</a>

</body>
</html>

<?php
require('footer.inc');
?>
