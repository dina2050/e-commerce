
<?php
$db = new PDO('mysql:host=localhost;dbname=shop', "root", "plop");

    $reqqa = $db->query("UPDATE basket_line SET quantity_Add= ".$_POST["newquantity"]." WHERE id_Product=".$_POST["id_Product"]);

?>
