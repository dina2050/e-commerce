<?php
$db = new PDO('mysql:host=localhost;dbname=shop', "root", "plop");
$reqqo = $db->query('DELETE FROM basket_line WHERE id_Product = '.$_POST["id_Product"]);
?>