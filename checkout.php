<?php

@include 'config.php';

if (isset($_POST['order_btn'])) {

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if (mysqli_num_rows($cart_query) > 0) {
      while ($product_item = mysqli_fetch_assoc($cart_query)) {
         $product_name[] = $product_item['name'] . '(' . $product_item['quantity'] . ')';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };


   $total_product = implode(', ', $product_name);

   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, street, city, state, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$total_product','$price_total')") or die('query failed');

   if ($cart_query && $detail_query) {
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Compra realizada com sucesso!</h3>
         <div class='order-detail'>
            <span>" . $total_product . "</span>
            <span class='total'> Total : R$" . $price_total . " </span>
         </div>
         <div class='customer-details'>
            <p> Seu nome: <span>" . $name . "</span> </p>
            <p> Seu número: <span>" . $number . "</span> </p>
            <p> Seu e-mail: <span>" . $email . "</span> </p>
            <p> Seu endereço: <span>" . $street . ", " . $flat . ", " . $city . ", " . $state . "</span> </p>
            <p> Método de pagamento: <span>" . $method . "</span> </p>
            <p>Seu produto chegará em breve!</p>
         </div>
            <a href='cart.php?delete_all' class='btn'>Continuar comprando</a>
         </div>
      </div>
      ";
   }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Finalizar compra | Temdetudo</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/header_index.css">

</head>

<body>

   <?php include 'header_index.php'; ?>

   <div class="container">

      <section class="checkout-form">

         <h1 class="heading">Complete seu pedido</h1>

         <form action="" method="post">

            <div class="display-order">
               <?php
               $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
               $total = 0;
               $grand_total = 0;
               if (mysqli_num_rows($select_cart) > 0) {
                  while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                     $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                     $grand_total = $total += $total_price;
               ?>
                     <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
               <?php
                  }
               } else {
                  echo "<div class='display-order'><span>Seu carrinho está vazio!</span></div>";
               }
               ?>
               <span class="grand-total"> Total : R$<?= $grand_total; ?></span>
            </div>

            <div class="flex">
               <div class="inputBox">
                  <span>Seu nome</span>
                  <input type="text" placeholder="Ex.: João" name="name" id="name_confirmacao" required>
               </div>
               <div class="inputBox">
                  <span>Seu número</span>
                  <input type="text" placeholder="Ex.: (61) 99999-4444" name="number" id="numero_confirmacao" required>
               </div>
               <div class="inputBox">
                  <span>Seu e-mail</span>
                  <input type="email" placeholder="Ex.: joao@gmail.com" name="email" id="email_confirmacao" class="numero_confirmacao" required>
               </div>
               <div class="inputBox">
                  <span>Método de pagamento</span>
                  <select name="method">
                     <option value="Dinheiro" selected>Dinheiro</option>
                     <option value="PIX">PIX</option>
                     <option value="Crédito">Crédito</option>
                     <option value="Débito">Débito</option>
                  </select>
               </div>
               <div class="inputBox">
                  <span>Endereço</span>
                  <input type="text" placeholder="Ex.: Condomínio Rio, Quadra 12" name="street" required>
               </div>
               <div class="inputBox">
                  <span>Número</span>
                  <input type="text" placeholder="Ex.: 10" name="flat" required>
               </div>
               <div class="inputBox">
                  <span>Cidade</span>
                  <input type="text" placeholder="Ex.: Taguatinga" name="city" required>
               </div>
               <div class="inputBox">
                  <span>Estado</span>
                  <input type="text" placeholder="Ex.: DF" name="state" required>
               </div>

            </div>
            <input type="button" onclick="enviarEmailConfirmacao()" value="Enviar e-mail de confirmação (opcional)" name="order_btn" class="btn">
            <input type="submit" value="Enviar pedido" name="order_btn" class="btn">
         </form>

      </section>

   </div>

   <script src="js/script.js"></script>

   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
   </script>
   <script type="text/javascript">
      (function() {
         emailjs.init("1TLlMH070uuppliAQ");
      })();
   </script>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

   <script type="text/javascript">
      var options = {
         onKeyPress: function(phone, e, field, options) {
            var masks = ['(00) 00000-0000', '(00) 0000-0000'];
            var mask = (phone.length > 14) ? masks[1] : masks[0];
            $('#celular').mask(mask, options);
         }
      };

      $("#numero_confirmacao").mask("(00) 00000-0000", options);
   </script>

</body>

</html>