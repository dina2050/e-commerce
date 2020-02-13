<?php
$db = new PDO('mysql:host=localhost;dbname=shop', "root", "plop");

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
    <?php

    $req = $db->query('SELECT * FROM Product where id_Product = '.$_GET['product_id']);
     $produit = $req->fetch();

    $req3 = $db->query('SELECT * FROM Image where id_Product = '.$_GET['product_id']);
     $image2 = $req3->fetch();
    
     ?>

<div class="container">
        <div class="row no-gutters">
           
           <div class='col-6'>
                     <img class='w-100 img-product' src = " <?php echo $image2['url_Image']; ?>">
                </div>

                <div class='col-6'>
                        <h2 class='heading'><?php echo $produit['name_Product'];?> </h2>
                        <p>Color :</p>
                <span>blue</span>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <!-- <label class="form-check-label" for="inlineCheckbox1">1</label> -->
                </div>
                <span>red</span>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <!-- <label class="form-check-label" for="inlineCheckbox2">2</label> -->
                </div>
                <span>green</span>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                    <!-- <label class="form-check-label" for="inlineCheckbox3">3</label> -->
                </div>

                <p class="mt-4">Size :</p>
                <span>L</span>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                    <!-- <label class="form-check-label" for="inlineCheckbox1">1</label> -->
                </div>
                <span>M</span>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <!-- <label class="form-check-label" for="inlineCheckbox2">2</label> -->
                </div>
                <span>S</span>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                    <!-- <label class="form-check-label" for="inlineCheckbox3">3</label> -->
                </div>
                <div class="row mt-4 no-gutters">
                    <div class="col-6">
                        <h4 class="price"></h4>
                    </div>
                    <div class="col-6">
                    <form action ="index3.php" method="post">
                    <input type="submit" value="Ajouter">
                    <input name ="id_Product" type="hidden" value="<?php echo $produit['id_Product']?>">
                    </form>
                 </div>
            <div class="col-12">
            <?php 
                date_default_timezone_set('Europe/Paris');
                $time = strtotime($produit['updated_at']);
                setlocale(LC_ALL,'fr_FR.utf8','fra');
                $newformat = strftime('%A %d %B %Y',$time);
                ?>
                <p>Derniere mise à jour le <?php echo $newformat ?></p>
            </div>
                
                 </div>
       
</div>
 
</body>
</html>
