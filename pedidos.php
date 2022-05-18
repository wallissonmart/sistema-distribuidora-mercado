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

            <h1 style="font-size: 3.8rem;" class="h1-responsive font-weight-bold text-center my-4">PEDIDOS</h1>

            <div class="box-container">

                <?php

                $select_products = mysqli_query($conn, "SELECT * FROM `order`");
                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_order = mysqli_fetch_assoc($select_products)) {
                ?>
                        <div class="">
                            <i style="font-size: 3.5rem" class="fa-solid fa-paperclip"></i>
                            <div class="box">
                                <h3 name="update_status_id">Número do pedido: <?php echo $fetch_order['id']; ?></h3>
                                <h3>Cliente: <?php echo $fetch_order['name']; ?></h3>
                                <h3>Metódo de pagamento: <?php echo $fetch_order['method']; ?></h3>
                                <h3>Produtos: <?php echo $fetch_order['total_products']; ?></h3>
                                <h3>Total: R$<?php echo $fetch_order['total_price']; ?></h3>
                                <h3>Status: <br> <span>A caminho...</span></h3>
                            </div>
                        </div>
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