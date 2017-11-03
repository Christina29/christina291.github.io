<?php
require('class.php');

$Page = new Page();
$Page -> header();
$Page -> connect();
$Page -> processorder($cakeqty, $candyqty, $cookieqty, $fio, $address);
$Page -> footer();

?>