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
    <title>Send Money</title>
    <link rel="stylesheet" href="transfer.css" >
    <link rel="stylesheet" href="nav.css" >
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class = "transfer">
      <div class="head">
          <h2>Send Money</h2>
      </div>
      <table>
        <tr>
          <th>Sr.No</th>
          <th>Name</th>
          <th>Email-ID</th>
          <th>Balance Amount</th>
          <th>Operation</th>
        </tr>
        <?php 
          while ($row = mysqli_fetch_assoc($result)) {
            echo '
              <tr>
                <td>'.$row['Sr.no'].'</td>
                <td>'.$row['Name'].'</td>
                <td>'.$row['Email-ID'].'</td>
                <td>'.$row['Balance Amount'].'</td>
                <td id="transfer"; ><a href="transfer_process.php?id= '.$row['Sr.no'].'"> <button type="button">TRANSFER</button></a></td> 
              </tr>
            ';
          }
        ?>
      </table>    
    </div>
</body>
</html>