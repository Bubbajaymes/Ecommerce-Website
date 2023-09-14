<?php 
  include('../includes/connect.php');
  session_start();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERENE TRADERS-Checkout Page</title>

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

    <style>
      .logo {
         width: 5%;
         height: 4%;
      }
    </style>

    <!-- CSS files -->
    <link rel="stylesheet" href="style.css">

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
          <a class="nav-link" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>



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
        <a class='nav-link' href='logout.php'>Login</a>
        </li>        
        ";
      } else {
        echo "
        <li class='nav-item'>
        <a class='nav-link' href='login.php'>Logout</a>
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
  <div class="col-md-12">
    <!-- Products -->
    <div class="row">
        <?php 
          if (!isset($_SESSION['user_name'])) {
            include('user_login.php');
          } else {
            include('payment.php');
          }
        ?>
    </div>
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