<header class="header header-index">

   <div class="flex">

      <a href="#" class="logo">Temdetudo</a>

      <nav class="navbar">
         <a href="index.php#myCarousel">Home</a>
         <a href="index.php#products">Produtos</a>
         <a href="index.php#sobre">Sobre</a>
         <a href="index.php#contato">Contato</a>
      </nav>

      <?php

      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('Falha na consulta');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">
         <i class="fa-solid fa-cart-shopping"></i> <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>