<?php 
  include('../includes/connect.php');
  include('../functions/common_function.php');
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS link -->
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

    <link rel="stylesheet" href="../style.css">

    <style>
        .admin_image {
            width: 100px;
            object-fit: contain;
        }

        .footer {
            position: absolute;
            bottom: 0px;
        }

        .user_img {
          width:100px ;
          height: 100px;
          object-fit: contain;
        }
        /* button {
            color: aliceblue;
            width: 70px;
            height: 40px;
        } */
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logoo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- Second Child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- Third Child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#">
                        <img src="../images/kabras 1kg.jpg" alt="" class="admin_image">
                    </a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3">
                        <a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a>
                    </button>
                    <button>
                        <a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a>
                    </button>
                    <button>
                        <a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a>
                    </button>
                    <button>
                        <a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a>
                    </button>
                    <button>
                        <a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a>
                    </button>
                    <button>
                        <a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a>
                    </button>
                    <button>
                        <a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a>
                    </button>
                    <button>
                        <a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a>
                    </button>
                    <button>
                        <a href="index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a>
                    </button>
                    <button>
                        <a href="" class="nav-link text-light bg-info my-1">Log Out</a>
                    </button>
                </div>
            </div>
        </div>

        <!-- Fourth child -->
        <div class="container my-2">
            <?php 
                if (isset($_GET['insert_category'])) {
                    include('insert_categories.php');   
                }

                if (isset($_GET['insert_brand'])) {
                    include('insert_brands.php');
                }  
                if (isset($_GET['view_products'])) {
                    include('view_products.php');
                }   
                if (isset($_GET['edit_products'])) {
                    include('edit_products.php');
                }  
                if (isset($_GET['delete_products'])) {
                    include('delete_product.php');
                }                         
                if (isset($_GET['view_categories'])) {
                    include('view_categories.php');
                }  
                if (isset($_GET['view_brands'])) {
                    include('view_brands.php');
                }  
                if (isset($_GET['edit_category'])) {
                    include('edit_category.php');
                }  
                if (isset($_GET['edit_brands'])) {
                    include('edit_brands.php');
                }  
                if (isset($_GET['delete_category'])) {
                    include('delete_category.php');
                }  
                if (isset($_GET['delete_brand'])) {
                    include('delete_brand.php');
                }  
                if (isset($_GET['list_orders'])) {
                    include('list_orders.php');
                }      
                if (isset($_GET['list_payments'])) {
                    include('list_payments.php');
                } 
                if (isset($_GET['list_users'])) {
                    include('list_users.php');
                }                                                                                    
            ?>
        </div>


<!-- include footer -->
<?php 
  include("../includes/footer.php");
?>
</div>
    

<!-- Bootstrap JS link -->
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
  crossorigin="anonymous"></script>

<script 
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
  crossorigin="anonymous"></script>

<script 
   src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
   integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
   crossorigin="anonymous"></script>

<script 
   src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
   integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
   crossorigin="anonymous"></script>
   
</body>
</html>