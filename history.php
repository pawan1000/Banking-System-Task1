<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="displaycss.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<div class="city">
        
        <img align="left" src="https://www.thesparksfoundationsingapore.org/images/logo_small.png" width="100" height="150" > 
       <h1><center>Sparks Bank</center></h1>
        <br>
        <p id="part1">
            <a href="index.html"><b>HOME</b></a>&nbsp;&nbsp;&nbsp; <a href="https://www.thesparksfoundationsingapore.org/"  target=”_blank”><b>ABOUT US</b></a>
        </p>
        <br><br>
    </div>

<table id="customers">
       <tr>
       <th>SrNo</th>
        <th>Sender</th>
        <th>Reciver</th>
        <th>Amount</th>
        <th>Time</th>
        
        </tr>
<?php
include("connection.php");
$sendername=$_GET['sendername'];
$recivername=$_GET['recivername'];
$sendersrno=$_GET['sendersrno'];
$reciversrno=$_GET['reciversrno'];
$balance=$_GET['balance'];

error_reporting(0);

$query="select * from transfer";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

if($total!=0)
{
    
    while($result=mysqli_fetch_assoc($data))
    {
        echo "
        <tr>
        <td>".$result['srno']."</td>
        <td>".$result['sender']."</td>
        <td>".$result['reciver']."</td>
        <td>".$result['amount']."</td>
        <td>".$result['Time']."</td>

        
        
         </tr>";
    }
}
?>
<?php

       
        
$query = "SELECT * FROM `customer` WHERE srno='$reciversrno'";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
if($total!=0)
{
    
    while($result=mysqli_fetch_assoc($data))
    {
         $balanceprev= $result['balnce'];
    }
}
  echo "<br>";
  
$newbalance=$balanceprev + $balance;

$sql= "UPDATE `customer` SET `balnce` = $newbalance WHERE `customer`.`srno` = $reciversrno;";
$result=mysqli_query($conn,$sql);




$query = "SELECT * FROM `customer` WHERE srno='$sendersrno'";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
if($total!=0)
{
    
    while($result=mysqli_fetch_assoc($data))
    {
         $balanceprev= $result['balnce'];
    }
}
  echo "<br>";
  
$newbalance=$balanceprev - $balance;

$sql= "UPDATE `customer` SET `balnce` = $newbalance WHERE `customer`.`srno` = $sendersrno;";
$result=mysqli_query($conn,$sql);


?>
<?php
error_reporting(0);
$query="INSERT INTO `transfer` (`sender`, `reciver`, `amount`, `Time`) VALUES ('$sendername','$recivername','$balance',NOW());";
$data=mysqli_query($conn,$query);
if($data)
{
   echo "<script>window.location='http://localhost/banking system/transfer.php';
   </script>";
}
else{
    echo "failed";
}

?>

</table>

</body>
</html>
