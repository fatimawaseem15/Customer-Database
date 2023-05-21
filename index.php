<?php
if(isset($_POST ['Submit'])){
    $Submit=false;

    
$server ="localhost";
$username ="root";
$password ="";
$con = mysqli_connect($server , $username , $password );
if (!$con) {
    die ("connection not establish" . mysqli_connect_error());}

//echo "success connecting to db";

$customer_Id = $_POST['customer_Id'];
$fname = $_POST['fname'];
$last_name = $_POST['last_name'];
$contact = $_POST['contact_no'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO  `bank_db`.`custom` (`customer_Id`, `fname`, `last_name`, `contact_no`, `email`, `password`) VALUES ('$customer_Id', '$fname', '$last_name ', '$contact', '$email', '$password');";
//INSERT INTO `custom` (`customer_Id`, `fname`, `last_name`, `contact_no`, `email`, `password`) VALUES ('2', 'Liaba', 'Waseem', '03314498', 'laibawaseem38@gmail.com', 'jkdfsjifwe');
//echo $sql;

if($con->query($sql) == true)
{
    $Submit=true;
    echo "Successfully Inserted";
}
else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Management </title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
    *{
    box-sizing: border-box;
    margin: 0%;
    padding: 0%;
 }
 .contain
 {
     max-width: 80%;
     background-color: rgb(154, 81, 223);
     padding: 34px;
     margin: auto;
 }
 .contain h1 , p ,h2 ,h3
 {
     text-align: center;
 }
 input , textarea
 {
     display: block;
     width: 80%;
     margin-top: 10px;
     margin-bottom: 10px;
     padding: 7px;
     border: 2px solid black;
     border-radius: 10px;
     outline: none;
 }
 .btn
 {
     color: aliceblue;
     background-color: purple;
     padding: 10px;
     font-size: 20px;
     border: 2px solid white;
     border-radius: 7px;
     cursor: pointer;
 }
</style>

<body>
    <div class="contain">
        <h1>Welcome to Bank Management System</h1>
        <h2>Customer Data</h2>

        <p>Enter Your Data Carefully</p>
        <?php
        if($Submit=true);
        echo "<h3>Thanks for Submitting your Data</h3>";
        ?>
        

        <form action="http://localhost/cwh/index.php" method="POST">
            <input type="number" name="customer_Id" id="customer_Id " placeholder="Customer Id">
            <input type="text" name="fname" id="fname" placeholder="First Name">
            <input type="text" name="last_name" id="last_name" placeholder="last Name" >
            <input type="number" name="contact_no" id="contact_no" placeholder="Contact No">
            <input type="email" name="email" id="email" placeholder="email here:">
            <input type="password" name="password" id="password" placeholder="password">
            <button type="submit" class="btn" name="Submit">Submit</button>

        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>