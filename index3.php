<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<?php
$db = new PDO('mysql:host=localhost;dbname=shop', "root", "plop");
if(isset($_POST['id_Product'])){

  $reqqi=$db->query('SELECT * FROM  basket_line where id_Product = '.$_POST["id_Product"]);
  $count = $reqqi->rowCount();
  if($count != 0) {
    $line=$reqqi->fetch();
    $newquantity = $line['quantity_Add']+1;
    $db->query("UPDATE basket_line SET quantity_Add= ".$newquantity." WHERE id_Product = ".$_POST["id_Product"]);
    
  }
  else {
    $db->query('INSERT INTO basket_line (id_product,id_basket,quantity_Add) VALUES ('.$_POST["id_Product"].', 1, 1)');
  }
}
// else if(isset($_GET['delete'])){
    
//         $reqqo = $db->query('DELETE FROM basket_line WHERE basket_line.id_Product = '.$_GET["delete"]);
//     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
 <div class="row">
 <div class="col-12">
 
 <table class="table">
 <thead>
   <tr>
     
     
     <th scope="col">Product</th>
     <th scope="col">QTY</th>
     <th scope="col">PU</th>
     <th scope="col">TOTAL</th>
   </tr>
 </thead>
<?php

$req = $db->query('SELECT * FROM  basket_line,Product where basket_line.id_Product = Product.id_product');
$total = 0;
foreach ($req as $row){
  $total = $total + $row['price_Product']*$row['quantity_Add'];?>
  

        <tbody>
          <tr>
            <th scope="row"><?php echo $row['name_Product'];?></th>
            <td><form method="post"><input class = "quantity" id = "<?php echo $row['id_Product']?>" type = "number" name = "quantity" value="<?php echo $row['quantity_Add']?>"></form></td>
            <td><?php echo $row['price_Product'];?></td>
            <td><?php echo $row['price_Product']*$row['quantity_Add']?></td>
            <td><button><a class = "remove" id = "<?php echo $row['id_Product'];?>">X</a></button></td>
            
          </tr>
         
        </tbody>
<?php } ?>
      </table>
      <table class="table">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">TOTAL:</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td>TVA:</td>
              </tr>
              <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td>TOTAL TTC: <?php echo $total;?></td>
              </tr>

              <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td><button id ="btn">BTN</button></td>
              </tr>
              <script src="./node_modules/jquery/dist/jquery.min.js"></script> 
             <script>
             $(document).ready(function(){

             $("#btn").click(function(){
               var postData = {
                 id_Product:1,
                 newquantity:42
               }
              $.post('quantityUpdate.php',postData, function(data){
                console.log(data)
             });
             })


             $(".quantity").change(function(){
               var postData = {
                 id_Product:$(this).attr("id") ,
                 newquantity:$(this).val()
               }
              $.post('quantityUpdate.php',postData, function(data){
                console.log(data)
             });
             })

             $(".remove").click(function(){
               var postData = {
                 id_Product:$(this).attr("id")
               }
              $.post('deleteline.php',postData, function(data){
                $(this).parents("tbody").remove()
             });
             return false;
             })

             })
             </script>
            </tbody>
          </table>
          </div>
 </div>
</div> 
</body>
</html>