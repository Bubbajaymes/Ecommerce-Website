
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
    <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" class="form-control " name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" class="form-control " name="dont_delete" value="Don't Delete Account">
        </div>        
        
    </form>

    <?php 
        $username_session = $_SESSION['user_name'];

        if (isset($_POST['delete'])) {
            $delete_query = "Delete from `user_table` where user_name = '$username_session'";
            $result = mysqli_query($con, $delete_query);

            if ($result) {
                session_destroy();
                echo "<script>alert('Account Deleted Successfully')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }

        if (isset($_POST['dont_delete'])) {
            echo "<script>window.open('profile.php','_self')</script>";
        }
    ?>

