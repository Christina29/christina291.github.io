<?php
require('page_5.inc');

class OrderformPage extends Page 

{
	var $row2buttons=array ('Re-engineering'=>'reengineering.php','Standarts Compliance'=>'standards','Buzzword Compliance'=>'buzzword.php','Mission Statements'=>'mission');
	
	function Display_1($cakeqty)
	
	{	
		echo $cakeqty;
	}
	
	function Display($cakeqty, $candyqty,$cookieqty, $address, $DOCUMENT_ROOT,$fio)
	
	{
		echo "<html>\n<head>\n";	
		$this->DisplayTitle();
		$this->DisplayKeywords();	
		$this->DisplayStyles();
		echo "</head>\n<body>\n";
		$this->DisplayHeader();
		$this->DisplayMenu($this->buttons);
		$this->DisplayMenu($this->row2buttons);
		?> <table width=100% height=100% border = 1><tr><td class=cont> <? echo $this->order($cakeqty, $candyqty,$cookieqty, $address, $DOCUMENT_ROOT,$fio); ?> </td></table> <?
	
		//echo $this->content;
		$this->DisplayFooter();	
		echo "</body>\n</html>\n";
	}
	
	function order($cakeqty, $candyqty,$cookieqty, $address, $DOCUMENT_ROOT, $fio)
	{
		
		$cakeqty =$_POST['cakeqty'];
		$candyqty=$_POST['candyqty'];
		$cookieqty=$_POST['cookieqty'];
		$address=$_POST['address'];

		$DOCUMENT_ROOT = $HTTP_SERVER_VARS['DOCUMENT_ROOT'];
	
		$hostname="localhost";
		$user="root";
		$password="";
		$db="lab3";
		
		if(!$link=mysql_connect($hostname, $user, $password))
		{	
			echo "<br> �� ���� ����������� � �������� ���� ������<br>";
			exit();
		}
		if (!mysql_select_db($db,$link))
		{
			exit();
		}
		
		else {echo "<br> ���������� � �������� ���� ������ ������ �������<br>";}
		
	}
?>
	<html>
<head>
	<title>������������ "������" - ���������� ������</title>
</head>
<body>

<h1> ������������ ������ � 6 �� ����: "���������� � �������������� ������ ����������� ���� - MySQL"</h1>
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

	$outputstring = $date."\t".$cakeqty." ��������\t".$candyqty."  ������� ������\t".$cookie." �������\t\$".$total."\t ����� �������� ������\t". $address."\t ��� �������: ".$fio."\n";

	//������� ���� ��� ����������

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

	echo'<p>����� ��������.</p>';
?>
	

	<a href="vieworders_5.php">  ��������� ��������� ��� ��������� ����� �������</a>
	<?
}
}	
	$services = new OrderformPage();
	$content='cdcd';
	$services-> SetContent($content);
	$services->SetTitle('������������ ������ �� ����: ��� �� PHP ')
	$services->SetName('������������ ������ �� �����: ���������� �������� ���������� ����������� PHP � MySQL <br> ��������� ������ ��-153: ��������� �������� �������� <br> ��������: �. �. �. ���. ������� �. �.');
	$services->Display($cakeqty, $candyqty,$cookieqty, $address, $DOCUMENT_ROOT, $fio);
?>

