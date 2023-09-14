<h3 class="text-center text-success overflow-y-hidden">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th class="bg-info text-center">SIno</th>
            <th class="bg-info text-center">Brand Title</th>
            <th class="bg-info text-center">Edit</th>
            <th class="bg-info text-center">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $select_cat = "Select * from `brands`";
            $result = mysqli_query($con, $select_cat);
            $number=0;

            while ($row=mysqli_fetch_assoc($result)) {
                $brand_id = $row['brand_id'];
                $brand_title = $row['brand_title'];
                $number++;
        ?>
        <tr>
            <td class="bg-secondary text-light text-center"><?php echo $number;?></td>
            <td class="bg-secondary text-light text-center"><?php echo $brand_title;?></td>
            <td class='bg-secondary text-light text-center'><a href='index.php?edit_brands=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td class='bg-secondary text-light text-center'><a href='index.php?delete_brand=<?php echo $brand_id ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Button trigger modal......from bootstrap -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4 class="overflow-y-hidden">Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" class="text-light text-decoration-none">No</a> </button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id ?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>