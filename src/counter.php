<!-- Начало кода счётчика -->
<style>
.example1 {
    padding-top:0px;
    width:88px;
    padding-left:0px;
    height:31px;
    background-image:url("./hit.gif");
    color:#ffaa01;
    font-family:Arial, Helvetica, sans-serif;
    font-size:12px; 
     
}
</style>
<div class="example1" title="Adatum: показано всего просмотров/просмотров страницы, уникальных просмотров/уникальных просмотров страницы">
<?php
$versionclient = $_SERVER['HTTP_USER_AGENT'];
$name = $_SERVER['REQUEST_URI'];
$user = $_SERVER['REMOTE_ADDR'];
$site = $_SERVER['HTTP_REFERER'];
$da = date("d.m.Y");
$ho = date("h")+6;
$min = date(":i:s");
$tim = $ho.$min;
$db = new PDO('sqlite:./database/cont.sqlite'); 
$db->exec('INSERT INTO  cont (versionclient,name,user,site,date,time) VALUES ("'.$versionclient.'","'.$name.'","'.$user.'","'.$site.'","'.$da.'","'.$tim.'")');
//Всего просмотров:
$player_stat = $db->query("SELECT COUNT(id) FROM cont")->fetchColumn();
echo "&nbsp;".$player_stat." / ";
//Всего просмотров страницы:
$player = $db->query('SELECT COUNT(id) FROM cont WHERE name="'.$name.'"')->fetchColumn();
echo $player."<br>";
//Уникальных просмотров:
$player_stat = $db->query("SELECT COUNT(distinct user) FROM cont")->fetchColumn();
echo "&nbsp;".$player_stat." / ";
//Уникальных просмотров страницы:
$player_stat = $db->query('SELECT COUNT(distinct user) FROM cont WHERE name="'.$name.'"')->fetchColumn();
echo $player_stat."<br>";
?>
</div>
    <!-- Конц кода счётчика -->