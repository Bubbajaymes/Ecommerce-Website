<?php 
  include('../includes/connect.php');

  if (isset($_POST['product_title'])) {

    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    //accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name']; 
    
    //Checking empty condition
    if ($product_title==='' or $description==='' or $product_keywords==='' or $product_category==='' or $product_brands==='' or $product_price==='' or $product_image1==='' or $product_image2==='' or $product_image3==='') {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        //Insert query
        $insert_products = "insert into `products` (product_title,product_description,product_keywords,
        category_id,brand_id,product_image1,product_image2,product_image3,product_price,
        date,status) values('$product_title','$description','$product_keywords','$product_category','$product_brands','$product_image1',
        '$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con, $insert_products);

        if ($result_query) {
            echo "<script>alert('Successfully inserted the products')</script>";
        exit();
        }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashboard</title>

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
        h1 {
            overflow-y: hidden;
        }
    </style>

</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>

        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title </label>
                <input type="text" name="product_title" class="form-select" id="product_title" placeholder="Enter product title" autocomplete="off" required="requared">
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description </label>
                <input type="text" name="description" class="form-select" id="description" placeholder="Enter product description" autocomplete="off" required="requared">
            </div>

            <!-- Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords </label>
                <input type="text" name="product_keywords" class="form-select" id="product_keywords" placeholder="Enter keywords " autocomplete="off" required="requared">
            </div>

            <!-- Categories -->

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>

                    <?php 
                        $select_query = "Select * from `categories`";
                        $result_query = mysqli_query($con, $select_query);

                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];

                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>

                    
                </select>
            </div>

            <!-- Brands -->

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a Brands</option>
                    <?php 
                        $select_query = "Select * from `brands`";
                        $result_query = mysqli_query($con, $select_query);

                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];

                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>
                    
                </select>
            </div>

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1 </label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2 </label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>   
            
            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3 </label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>  
            
            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price </label>
                <input type="text" name="product_price" id="product_price" class="form-select" placeholder="Enter price " autocomplete="off" required="requared">
            </div>
            
            <!-- Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px" value="Insert Product">
            </div>            


        </form>
    </div>
    
</body>
</html>