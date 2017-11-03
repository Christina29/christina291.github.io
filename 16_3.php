<?php
require('Photo/header.inc');
?>

<table width=100% height=100% >

<td width=100% height=100% >

<table width=100% height=100% cellspacing=0 cellpadding=0 border=0>

<tr>
<td colspan=4> <center><img src="<?php echo $f?>"></center></td>
</tr>

<?php

function scanDir_1($Thumbs0)
// сканируетс€ каталог с миниатюрами $dirPath, миниатюры вывод€тс€ на страницу
{
	//ѕытаемс€ сменить текущий каталог на $dirPath
	
	if (@chdir($Thumbs0)==false)
	{
		echo 'каталог фотографий не существует или не доступен';
		return (false);
		
	};
	
	//теперь $dirPath стал текущим
	
	$d = opendir('.'); // открываем текущий каталог
	$i =0;
	while (($f=readdir($d))!==false)
	{
		//пока в каталоге есть файлы
		{
			if (is_file($f))
				$list = GetImageSize($f);
				
				if ($list[0]>0)
				{ if($i==4) {$i=0; echo '<tr>';} $i=$i+1;

print <<<HERE
<td><a href="16_3.php?f=$f"> <img src="Photo/Thumbs0/$f" border="0"> </a> <br> </td>
HERE;


	$f1 = strtok($f,".");
	$f1[0];
	
				};
		};
	};
	
	closedir($d); //закрываем каталог
	return(true);
	
};

scanDir_1('Photo/Thumbs0');

?>

</table>

</table>

<?php
require('Photo/footer.inc');
?>