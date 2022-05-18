<?php

@include 'config.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Produtos | Temdetudo</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">
</head>

<body>

   <?php include 'header.php'; ?>

   <div class="container">

      <section class="products" id="products">

         <h1 style="font-size: 3.8rem;" class="h1-responsive font-weight-bold text-center my-4">PRODUTOS</h1>

         <div class="box-container">

            <?php

            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if (mysqli_num_rows($select_products) > 0) {
               while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>

                  <form action="" method="post">
                     <div class="box">
                        <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                        <h3><?php echo $fetch_product['name']; ?></h3>
                        <div class="price">R$<?php echo $fetch_product['price']; ?></div>
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                     </div>
                  </form>

            <?php
               };
            };
            ?>

         </div>

      </section>

   </div>

   <script src="js/script.js"></script>

</body>

</html>