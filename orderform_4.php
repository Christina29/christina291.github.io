<?php
require('header.inc');
?>
<html>
<head>
	<title>������������ "������"</title>
</head>
<h1>������������ ������ � 4 �� ����: ���������� � �������������� ������ ����������� ������������� �������� � ��������� ������</h1>
<h2>������������ "������"</h2>
<h3>����� ������</h3>

<form action="processorder_4.php" method=post>
<table border=0>
<tr bgcolor=#cccccc>
	<td width=150>�����</td>
	<td width=15>����������</td>
</tr>
<tr>
	<td>��������</td>
	<td align="left"><input type="text" name="cakeqty" size="3" maxlength="3"></td>
</tr>
<tr>
	<td>�������</td>
	<td align="left"><input type="text" name="candyqty" size="3" maxlength="3"></td>
</tr>
<tr>
	<td>�������</td>
	<td align="left"><input type="text" name="cookieqty" size="3" maxlength="3"></td>
	
</tr>
<tr>
	<td>��� �������</td>
	<td align="left"><input type="text" name="fio" size="40" maxlength="40"></td>
</tr>
<tr>
	<td>����� ��������</td>
	<td align="left"><input type="text" name="address" size="40" maxlength="40"></td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" value="��������� �����"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
require('footer.inc');
?>