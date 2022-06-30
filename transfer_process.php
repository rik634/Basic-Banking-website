<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';

    $from = $_GET['id'];
    $to = $_POST['to'];
    $credit = $_POST['credit'];

    $sql = "SELECT * from `users` where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from `users` where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    // check input value is negative or not
    if (($credit)<0) {
        echo '<script type="text/javascript">alert("Oops! Negative values cannot be Transferred") </script>';
    }

    // check insufficient amount.
    else if($credit > $sql1['amount']) {
        echo '<script type="text/javascript">alert("Oops! Insufficient Amount") </script>';
    }
    
    // check zero values
    else if($credit == 0) {
        echo '<script type="text/javascript">alert("Oops! Zero value cannot be Transferred") </script>';
    }

    else {
        
        // deducting credit from sender's account
        $newamount = $sql1['amount'] - $credit;
        $sql = "UPDATE users set amount=$newamount where id=$from";
        mysqli_query($conn,$sql);
        

        // adding credit to reciever's account
        $newamount = $sql2['amount'] + $credit;
        $sql = "UPDATE users set amount=$newamount where id=$to";
        mysqli_query($conn,$sql);
        
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$credit')";
        $query=mysqli_query($conn,$sql);

        // window.location='index.php';
        if($query){
            echo "<script> alert('Transaction Successful'); window.location='index.php'; </script>"; 
        }

        $newamount= 0;
        $credit =0;
    }   
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
</body>
</html>