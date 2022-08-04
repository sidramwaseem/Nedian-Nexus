<?php

include 'connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

include 'wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./style.css">

</head>

<body>

   <?php include 'user_header.php'; ?>

   <div class="home-bg">

      <section class="home">

         <div class="swiper home-slider">

            <div class="swiper-wrapper">

               <div class="swiper-slide slide">
                  <div class="content">
                     <h3>Creative Products</h3>
                     <a href="shop.php" class="btn">shop now</a>
                  </div>
                  <div class="image">
                     <img src="./images/creativity.png" alt="creativity image">
                  </div>
               </div>

               <div class="swiper-slide slide">
                  <div class="content">
                     <h3>Suitable Discounts</h3>
                     <a href="shop.php" class="btn">shop now</a>
                  </div>
                  <div class="image">
                     <img src="./images/discount.png" alt="creativity image">
                  </div>
               </div>

               <div class="swiper-slide slide">
                  <div class="content">
                     <h3>Personalization Is What We Do!</h3>
                     <a href="shop.php" class="btn">shop now</a>
                  </div>
                  <div class="image">
                     <img src="./images/customization.png" alt="creativity image">
                  </div>
               </div>

            </div>

            <div class="swiper-pagination"></div>

         </div>

      </section>

   </div>

   <section class="category">

      <h1 class="heading">shop by category</h1>

      <div class="swiper category-slider">

         <div class="swiper-wrapper">

            <a href="category.php?category=Show pieces" class="swiper-slide slide">
            <i class="fa-solid fa-fan fa-9x"></i>
               <h3>Show pieces</h3>
            </a>

            <a href="category.php?category=Notebooks" class="swiper-slide slide">
            <i class="fa-solid fa-book-open fa-9x"></i>
               <h3>Notebooks</h3>
            </a>

            <a href="category.php?category=Novels" class="swiper-slide slide">
            <i class="fa-solid fa-book-bookmark fa-9x"></i>
               <h3>Novels</h3>
            </a>

            <a href="category.php?category=Art and Crafts" class="swiper-slide slide">
            <i class="fa-solid fa-pen-ruler fa-9x"></i>
               <h3>Art and Crafts</h3>
            </a>

            <a href="category.php?category=Batch Shirts" class="swiper-slide slide">
            <i class="fa-solid fa-shirt fa-9x"></i>
               <h3>Batch Shirts</h3>
            </a>

            <a href="category.php?category=Course Material" class="swiper-slide slide">
            <i class="fa-solid fa-swatchbook fa-9x"></i>
               <h3>Course Material</h3>
            </a>

         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>

   <section class="home-products">

      <h1 class="heading">latest products</h1>

      <div class="swiper products-slider">

         <div class="swiper-wrapper">

            <?php
            $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
               while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                  <form action="" method="post" class="swiper-slide slide">
                     <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                     <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                     <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                     <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
                     <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
                     <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
                     <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
                     <div class="name"><?= $fetch_product['name']; ?></div>
                     <div class="flex">
                        <div class="price"><span>$</span><?= $fetch_product['price']; ?><span>/-</span></div>
                        <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                     </div>
                     <input type="submit" value="add to cart" class="btn" name="add_to_cart">
                  </form>
            <?php
               }
            } else {
               echo '<p class="empty">no products added yet!</p>';
            }
            ?>

         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>









   <?php include 'footer.php'; ?>

   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

   <script src="script.js"></script>

   <script>
      var swiper = new Swiper(".home-slider", {
         loop: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
      });

      var swiper = new Swiper(".category-slider", {
         loop: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         breakpoints: {
            0: {
               slidesPerView: 2,
            },
            650: {
               slidesPerView: 3,
            },
            768: {
               slidesPerView: 4,
            },
            1024: {
               slidesPerView: 5,
            },
         },
      });

      var swiper = new Swiper(".products-slider", {
         loop: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         breakpoints: {
            550: {
               slidesPerView: 2,
            },
            768: {
               slidesPerView: 2,
            },
            1024: {
               slidesPerView: 3,
            },
         },
      });
   </script>

</body>

</html>