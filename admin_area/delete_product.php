<?php 
   if (isset($_GET['delete_products'])) {
    $delete_id = $_GET['delete_products'];
    // 
    // delete query 
    $delete_product = "Delete from `products` where product_id=$delete_id";
    $result_product = mysqli_query($con, $delete_product);

    if ($result_product) {
        echo "<script>alert('Product Deleted Successfully ')</script>";
        echo "<script>window.open('./index.php', '_self')</script>";        
    }
   }
?>