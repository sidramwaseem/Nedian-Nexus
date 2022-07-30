<?php
 $ser = "localhost";
 $user = "root";
 $pass = "";
 $db = "shop_db";
 $connection = mysqli_connect($ser, $user, $pass, $db);
 $quer = "SELECT * FROM `products`";
 $query2="SELECT * FROM `wishlist`";
$query4="SELECT * FROM `messages`";
$query5="SELECT * FROM `orders`";
$query6="SELECT * FROM `cart`";

 

 $res = mysqli_query($connection, $quer);
 $res2=mysqli_query($connection,$query2);
 $res3=mysqli_query($connection,$query4);
 $res4=mysqli_query($connection,$query5);
 $res5=mysqli_query($connection,$query6);




?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
   
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<header class="header">

<section class="flex">
   <h1>ADMIN PANEL</h1>
   <a href="admin_logout.php">LOGOUT</a>
</section>


</header>
    <table  border="2" cellspacing="5px" cellpadding="5px">
        <h1>PRODUCT DETAILS</h1>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>DETAILS</th>
            <th>PRICE</th>
            <th>IMAGE1</th>
            <th>IMAGE2</th>
            <th>IMAGE3</th>
        </tr>
   

        
        <?php
        while ($rows = mysqli_fetch_assoc($res)) {

        ?>


            <tr>
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['name']; ?> </td>
                <td><?php echo $rows['details']; ?> </td>
                <td><?php echo $rows['price']; ?></td>
                <td><?php echo $rows['image_01']; ?> </td>
                <td><?php echo $rows['image_02']; ?> </td>
                <td><?php echo $rows['image_03']; ?> </td>
               


            </tr>

        <?php
        }
        ?>


<table border="2" cellspacing="5px" cellpadding="5px">
        <h1>WISHLIST DETAILS</h1>
        <tr>
            <th>ID</th>
            <th>USER_ID</th>
            <th>PID</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>IMAGE</th>
          
        </tr>       
        <?php
        while ($rows = mysqli_fetch_assoc($res2)) {

        ?>


            <tr>
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['user_id']; ?> </td>
                <td><?php echo $rows['pid']; ?> </td>
                <td><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['price']; ?> </td>
                <td><?php echo $rows['image']; ?> </td>
              
               


            </tr>

        <?php
        }
        ?>

<table border="2" cellspacing="5px" cellpadding="5px">
        <h1>FEEDBACK</h1>
        <tr>
            <th>ID</th>
            <th>USER_ID</th>         
            <th>NAME</th>
            <th>EMAIL</th>
            <th>NUMBER</th>
            <th>MESSAGE</th>
          
        </tr>
        <?php
        while ($rows = mysqli_fetch_assoc($res3)) {

        ?>


            <tr>
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['user_id']; ?> </td>
                <td><?php echo $rows['name']; ?> </td>
                <td><?php echo $rows['email']; ?></td>
                <td><?php echo $rows['number']; ?> </td>
                <td><?php echo $rows['message']; ?> </td>
              
               


            </tr>

        <?php
        }
        ?>
        <table border="2" cellspacing="5px" cellpadding="5px">
        <h1>ORDER DETAILS</h1>
        <tr>
            <td>ID</td>
            <td>USER_ID</td>
          
            <th>NAME</th>
            <th>NUMBER</th>
            <th>EMAIL</th>
            <th>METHOD</th>
            <th>ADDRESS</th>
            <th>TOTAL_PRODUCT</th>
            <th>TOTAL_PRICE</th>
            <th>PLACED_ON</th>
            <th>PAYMENT_STATUS</th>

          
        </tr>
   

        
        <?php
        while ($rows = mysqli_fetch_assoc($res4)) {

        ?>


            <tr>
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['user_id']; ?> </td>
                <td><?php echo $rows['name']; ?> </td>
                <td><?php echo $rows['number']; ?></td>
                <td><?php echo $rows['email']; ?> </td>
                <td><?php echo $rows['method']; ?> </td>
                <td><?php echo $rows['address']; ?> </td>
                <td><?php echo $rows['total_products']; ?> </td>
                <td><?php echo $rows['total_price']; ?> </td>
                <td><?php echo $rows['placed_on']; ?> </td>
                <td><?php echo $rows['payment_status']; ?> </td>
              
               


            </tr>

        <?php
        }
        ?>
       
</body>
</html>