<?php 
 include('../includes/connect.php');
 include('../functions/common_function.php');
//  @session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

    <!-- bootstrap CSS link -->
    <link 
       href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
       rel="stylesheet" 
       integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
       crossorigin="anonymous"
    >

    <style>
        img{
            width: 100%;
        }
    </style>

</head>
<body>

<!-- PHP code to access user id -->
<?php 
$user_ip = getIPAddress();
$get_user = "Select * from `user_table` where user_ip = '$user_ip'";
$result = mysqli_query($con, $get_user);
$run_query = mysqli_fetch_array($result);
$user_id = $run_query['user_id'];
?>
    <div class="container">
        <h2 class="text-center text-info">
            Payment Options
        </h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <a href="https://www.safaricom.co.ke/personal/m-pesa/lipa-na-m-pesa" target="_blank">
                    <img src="../images/mpesa.png" alt="">
                </a>               
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>">
                    <h2 class="text-center">
                       Pay Offline 
                    </h2>
                </a>               
            </div>            

            
        </div>
    </div>
</body>
</html>