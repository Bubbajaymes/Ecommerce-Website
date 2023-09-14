<h3 class="text-center text-success overflow-y-hidden">All Payments</h3>
<table class="table table-bordered mt5">
    <thead>
        <?php



           $get_payments = "Select * from `user_payments`";
           $result = mysqli_query($con, $get_payments);
           $row_count = mysqli_num_rows($result);

 

           if ($row_count==0) {
            echo "<h4 class='text-danger text-center overflow-y-hidden'>No payment received yet.</h4>";
           } else {
            echo "
               <tr>
                    <th class='bg-info'>SI No</th>
                    <th class='bg-info'>Invoice Number</th>
                    <th class='bg-info'>Amount</th>
                    <th class='bg-info'>Payment Mode</th>
                    <th class='bg-info'>Order Date</th>
                    <th class='bg-info'>Delete</th>
                </tr>
            ";            
            $number = 0;
            while ($row_data=mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $payment_id = $row_data['payment_id'];
                $amount = $row_data['amount'];
                $invoice_number = $row_data['invoice_number'];
                $payment_mode = $row_data['payment_mode'];
                $date = $row_data['date'];
                $number++;

                echo "
            <tr>
                <td class='bg-secondary text-light'>$number</td>
                <td class='bg-secondary text-light'>$invoice_number</td>
                <td class='bg-secondary text-light'>$amount</td>
                <td class='bg-secondary text-light'>$payment_mode</td>
                <td class='bg-secondary text-light'>$date</td>
                <td class='bg-secondary text-light'><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr> 
                ";
            }
           }
        ?>
    <tbody>

    </tbody>
</table>