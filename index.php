
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
    <div class="container">

        <div class="row">
            <?php
            $req = $db->query('SELECT * FROM Product');

            foreach ($req as $row) {
        ?>
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <?php
                    $req2 = $db->query('SELECT * FROM Image where id_Product = '.$row['id_Product']);
                    $image = $req2->fetch();
                ?>
                <img src=" <?php echo $image['url_Image'] ?>" class="card-img-top" alt="...">

                <div class="card-body">
                    <h5 class="card-title"> <?php echo $row['name_Product'] ?></h5>
                    <p class="card-text"> <?php echo $row['description_Product'];?></p>
                    <p class="card-text"><?php echo $row['price_Product'];?></p>
                    <a href="index1.php?product_id=<?php echo $row['id_Product'] ?>" class="btn btn-primary">Go somewhere</a>

                </div>
            </div>
        </div>
        <?php } ?>
        
        </div>
    </div>
</body>
</html>
