<?php

    include '_dbconnect.php';
    $sql = "SELECT * FROM `all customers`";
    $result = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Customers</title>
    <link rel ="stylesheet" href ="view_customer.css">
    <link rel ="stylesheet" href ="nav.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class = "view_customer">
        <div class="head">
            <a  href="transfer.php">Send Money</a>  
            <h2> All Customers</h2>     
        </div>
        <table>
            <tr>
                <th>SR.No</th>
                <th>Name</th>
                <th>Email-ID</th>
                <th>Amount</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                    <td>".$row['Sr.no']."</td>
                    <td>".$row['Name']."</td>
                    <td>".$row['Email-ID']."</td>
                    <td>".$row['Balance Amount']."</td>
                </tr>
                ";
            }
            ?>
        </table>
    </div>
    
    
</body>
</html>