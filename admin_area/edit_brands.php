<?php 
    if (isset($_GET['edit_brands'])) {
        $edit_brand = $_GET['edit_brands'];
        // echo $edit_brand;

        $get_brands = "Select * from `brands` where brand_id = $edit_brand";
        $result = mysqli_query($con, $get_brands);
        $row = mysqli_fetch_assoc($result);
        $brand_title = $row['brand_title'];
        // echo $brand_title;
    }

    if (isset($_POST['edit_brand'])) {
        $brand_title = $_POST['brand_title'];
        $update_query = "update `brands` set brand_title='$brand_title' where brand_id=$edit_brand";
        $result_brand = mysqli_query($con, $update_query);

        if ($result_brand) {
            echo "<script>alert('Brand has been updated successfully')</script>";
            echo "<script>window.open('./index.php?view_brands', '_self')</script>";
        }
    }

 ?>

<div class="container mt-3">
    <h1 class="text-center overflow-y-hidden">Edit Brand</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" value="<?php echo $brand_title ?>" name="brand_title" id="brand_title" class="form-control" required="required">
        </div>
        <input type="submit" value="Update Brand" name="edit_brand" class="btn btn-info px-3 mb-3">
    </form>
</div>