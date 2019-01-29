<?php $pdo = new PDO('mysql:host=database; dbname=ma_db', 'mon_user', 'secret!'); 
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>