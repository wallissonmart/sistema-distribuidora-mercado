<?php

@include 'config.php';

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Produto já adicionado ao carrinho!';
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
        $message[] = 'Produto adicionado ao carrinho com sucesso!';
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header_index.css">
    <link rel="stylesheet" href="css/sobre.css">
    <link rel="stylesheet" href="css/contato.css">
    <link rel="stylesheet" href="css/footer.css">

    <title>Home | Temdetudo</title>

</head>

<body>
    <?php

    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message"><span>' . $message . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
        };
    };

    ?>

    <?php include 'header_index.php'; ?>

    <div id="myCarousel" class="carousel slide bg-inverse w-100 ms-auto me-auto" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active bg-light" style="border-radius: 50%; width: 14px; height: 14px;"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="1" class="active bg-light" style="border-radius: 50%; width: 14px; height: 14px;"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="2" class="active bg-light" style="border-radius: 50%; width: 14px; height: 14px;"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active text-center">
                <img class="d-block w-100 fs-1 text-dark" src="img/slide-1.jpeg" height="400px" alt="Primeiro slide">
            </div>
            <div class="carousel-item text-center">
                <img class="d-block w-100 fs-1 text-dark" src="img/slide-2.jpeg" height="400px" alt="Segundo slide">
            </div>
            <div class="carousel-item text-center">
                <img class="d-block w-100 fs-1 text-dark" src="img/slide-3.jpeg" height="400px" alt="Terceiro slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
            <span style="font-size: 4rem; color: #fff;" aria-hidden="true"><i class="fa-solid fa-circle-chevron-left"></i></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
            <span style="font-size: 4rem; color: #fff;" aria-hidden="true"><i class="fa-solid fa-circle-chevron-right"></i></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>


    <div class="container">

        <section class="products" id="products">

            <h2 class="h1-responsive font-weight-bold text-center my-4">PRODUTOS</h2>

            <div id="divBusca">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="txtBusca" placeholder="Digite algum produto que deseja encontrar..." />
            </div>

            <div class="box-container my-5">

                <?php

                $select_products = mysqli_query($conn, "SELECT * FROM `products`");
                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                ?>
                        <form action="" method="POST">
                            <div class="box box-index">
                                <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                                <h3><?php echo utf8_encode($fetch_product['name']); ?></h3>
                                <div class="price">R$ <?php echo $fetch_product['price']; ?></div>
                                <input type="hidden" name="product_name" class="product_name" value="<?php echo $fetch_product['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                                <input type="submit" class="btn" value="Adicionar ao carrinho" name="add_to_cart">
                            </div>
                        </form>

                <?php
                    };
                };
                ?>

            </div>

        </section>

    </div>

    <?php include 'components/sobre.php'; ?>

    <?php include 'components/contato.php'; ?>

    <?php include 'components/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
    </script>
    <script type="text/javascript">
        (function() {
            emailjs.init("1TLlMH070uuppliAQ");
        })();
    </script>
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

</body>

</html>