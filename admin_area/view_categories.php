<h3 class="text-center text-success overflow-y-hidden">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th class="bg-info text-center">SIno</th>
            <th class="bg-info text-center">Category Title</th>
            <th class="bg-info text-center">Edit</th>
            <th class="bg-info text-center">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $select_cat = "Select * from `categories`";
            $result = mysqli_query($con, $select_cat);
            $number=0;

            while ($row=mysqli_fetch_assoc($result)) {
                $category_id = $row['category_id'];
                $category_title = $row['category_title'];
                $number++;
        ?>
        <tr>
            <td class="bg-secondary text-light text-center"><?php echo $number;?></td>
            <td class="bg-secondary text-light text-center"><?php echo $category_title;?></td>
            <td class='bg-secondary text-light text-center'><a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td class='bg-secondary text-light text-center'><a href='index.php?delete_category=<?php echo $category_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>