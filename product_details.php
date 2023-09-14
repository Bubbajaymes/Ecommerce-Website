<?php 
  include('includes/connect.php');
  include('functions/common_function.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERENE TRADERS</title>

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
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <!-- NAVBAR -->
<div class="container-fluid p-0">

    <!-- First Child -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">

      <img src="./images/logoo.png" alt="" class="logo">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"><sup><?php cart_item(); ?></sup></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php total_cart_price(); ?>/-  </a>
        </li>

      </ul>
      <form class="d-flex" action="search_product.php" method="get">
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

<!-- Fourth Child -->
<div class="row px-3">
  <div class="col-md-10">
    <!-- Products -->
    <div class="row">

      <!-- Fetching Products -->
      <?php 
        //calling function
         view_details();
         get_unique_categories();
         get_unique_brands();

      ?>

      
    </div>
  </div>

  <!-- Sidenav -->
  <div class="col-md-2 bg-secondary p-0">

  <!-- Brands to be displayed -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
      </li>

      <?php 

        getbrands();

      ?>

    </ul>

<!-- Categories to be displayed -->
<ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4> Categories</h4></a>
      </li>

      <?php  

        getcategories();


      ?>

    </ul>
  </div>
</div>

<!-- Last Child -->
<!-- include footer -->
<?php 
  include("./includes/footer.php");
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