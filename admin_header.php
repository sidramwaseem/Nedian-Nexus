<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">

      <a href="dashboard.php" class="logo">Seller<span>Panel</span></a>

      <nav class="navbar">
         <a href="dashboard.php">HOME</a>
         <a href="products.php">PRODUCTS</a>
         <a href="placed_orders.php">ORDERS</a>
         <a href="messages.php">MESSAGES</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <a href="update_profile.php" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="register_admin.php" class="option-btn">register</a>
            <a href="admin_login.php" class="option-btn">login</a>
         </div>
         <a href="home.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
      </div>

   </section>

</header>