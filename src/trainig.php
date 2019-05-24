<?php
$fileName = 'D:/Apache24/htdocs/info.log';
$lar = [];  // result array

$pattern = '#^.*Просмотр изделия:(.*)$#iU';
//2019-05-12 14:30:04 [127.0.0.1][-][-][info][info_cat] Просмотр изделия: Выкройка №2
//           in D:\WebWorksPHP\hmdoll.ru\controllers\ItemsController.php:137
if(!is_file($fileName)) {
	exit('Файл не обнаружен');
}
$fh = fopen($fileName, 'r');

while(!feof($fh)){
	preg_match($pattern,fgets($fh),$matches);
	if(count($matches)>0){
		$item = $matches[1];
		if(isset($lar[$item])) {
			$lar[$item]['quantity']++;
		} else {
			$lar[$item] = [
				'item' => $item,
				'quantity' => 1,
			];
		}
	}
}
fclose($fh);
print_r($lar);

