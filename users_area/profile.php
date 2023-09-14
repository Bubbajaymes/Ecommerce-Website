<?php 
  include('../includes/connect.php');
  include('../functions/common_function.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['user_name'] . "." ?> </title>

    <!-- bootstrap CSS link -->
    <link 
       href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
       rel="stylesheet" 
       integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
       crossorigin="anonymous"
    >

    <!-- font awsome link -->
       <link rel="stylesheet" 
       href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
       integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
       crossorigin="anonymous" 
       referrerpolicy="no-referrer" 
    />

    <!-- CSS files -->
    <link rel="stylesheet" href="../style.css">

    <style>
        .body {
            overflow-x: hidden;
        }
        .profile_img {
            display: block;
            width: 90%;
            margin: auto;
            /* height: 100%; */
            object-fit: contain;
            overflow-y: hidden;
        }

        .edit_img {
          width:100px ;
          height: 100px;
          object-fit: contain;
        }
    </style>

</head>
<body>
    <!-- NAVBAR -->
<div class="container-fluid p-0">

    <!-- First Child -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">

      <img src="../images/logoo.png" alt="" class="logo">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"><sup><?php cart_item(); ?></sup></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"> <?php total_cart_price(); ?>/- </a>
        </li>

      </ul>
      <form class="d-flex" action="../search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php 
  cart();
?>

<!-- second Child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">

    <?php 

      if (!isset($_SESSION['user_name'])) {
        echo "
        <li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li>       
        ";
      } else {
        echo "
        <li class='nav-item'>
        <a class='nav-link' href='#'>Welcome ".$_SESSION['user_name']."</a>
      </li>       
        ";        
      }    

      if (!isset($_SESSION['user_name'])) {
        echo "
        <li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
        </li>        
        ";
      } else {
        echo "
        <li class='nav-item'>
        <a class='nav-link' href='./users_area/logout.php'>Logout</a>
        </li>        
        ";        
      }
    ?>
  </ul>
</nav>

<!-- Third Child -->
<div class="bg-light">
  <h3 class="text-center">Serene Traders</h3>
  <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
</div>

<!-- fourth Child -->
<div class="row">
    <div class="col-md-2  ">
        <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
            <li class="nav-item bg-info">
              <a class="nav-link text-light" href="#"><h4>Your Profile</h4> </a>
            </li> 
            <?php 
               $username = $_SESSION['user_name'];
               $user_image = "Select * from `user_table` where user_name = '$username'";
               $user_image = mysqli_query($con, $user_image);
               $row_image = mysqli_fetch_array($user_image);
               $user_image = $row_image['user_image'];
               echo "
                        <li class='nav-item '>
                            <img src='./users_images/$user_image' class='profile_img my-4' alt=''>
                        </li>
                    ";
            ?>
             
            <li class="nav-item ">
              <a class="nav-link text-light" href="profile.php"> Pending Orders</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link text-light" href="profile.php?edit_account"> Edit Acccount</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link text-light" href="profile.php?my_orders"> My Orders</a>
            </li> 
            <li class="nav-item ">
              <a class="nav-link text-light" href="profile.php?delete_account"> Delete Account</a>
            </li>            
            <li class="nav-item ">
              <a class="nav-link text-light" href="logout.php"> Log Out</a>
            </li>                       
        </ul>
    </div>
    <div class="col-md-10 text-center">
      <?php 
        get_user_order_details();

        if (isset($_GET['edit_account'])) {
          include('edit_account.php');
        }
        if (isset($_GET['my_orders'])) {
          include('user_orders.php');
        } 
        if (isset($_GET['delete_account'])) {
          include('delete_account.php');
        }                
      ?>
    </div>
</div>

<!-- Last Child -->
<!-- include footer -->
<?php 
  include("../includes/footer.php");
?>
</div>
 
    

<!-- bootstrap js link -->
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
  crossorigin="anonymous">
</script>

</body>
</html>