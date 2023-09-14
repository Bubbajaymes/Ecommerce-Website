<h3 class="text-center text-success overflow-y-hidden">All Users</h3>
<table class="table table-bordered mt5">
    <thead>
        <?php



           $get_users = "Select * from `user_table`";
           $result = mysqli_query($con, $get_users);
           $row_count = mysqli_num_rows($result);

 

           if ($row_count==0) {
            echo "<h4 class='text-danger text-center overflow-y-hidden'>No users yet.</h4>";
           } else {
            echo "
               <tr>
                    <th class='bg-info'>SI No</th>
                    <th class='bg-info'>User Name</th>
                    <th class='bg-info'>User Email</th>
                    <th class='bg-info'>User Image</th>
                    <th class='bg-info'>User Address</th>
                    <th class='bg-info'>User Mobile</th>
                    <th class='bg-info'>Delete</th>
                </tr>
            ";            
            $number = 0;
            while ($row_data=mysqli_fetch_assoc($result)) {
                $user_id = $row_data['user_id'];
                $user_name = $row_data['user_name'];
                $user_email = $row_data['user_email'];
                $user_image = $row_data['user_image'];
                $user_address = $row_data['user_address'];
                $user_mobile = $row_data['user_mobile'];
                $number++;

                echo "
            <tr>
                <td class='bg-secondary text-light text-center'>$number</td>
                <td class='bg-secondary text-light text-center'>$user_name</td>
                <td class='bg-secondary text-light text-center'>$user_email</td>
                <td class='bg-secondary text-light text-center'><img src='../users_area/users_images/$user_image' alt='$user_name' class='user_img' /></td>
                <td class='bg-secondary text-light text-center'>$user_address</td>
                <td class='bg-secondary text-light text-center'>$user_mobile</td>
                <td class='bg-secondary text-light text-center'><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr> 
                ";
            }
           }
        ?>
    <tbody>

    </tbody>
</table> 