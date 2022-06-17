<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="displaycss.css">
    <link rel="stylesheet" href="home.css">
    <title>customer| Data</title>
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
    <br><br>

    <table id="customers">
        <tr>
        <th>SrNo</th>
        <th>Name</th>
        <th>Emailid</th>
        <th>Balance</th>
        <th >View</th>
        </tr>
<?php
error_reporting(0);
include("connection.php");
$query="select * from customer";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

if($total!=0)
{
    
    while($result=mysqli_fetch_assoc($data))
    {
        echo "
        <tr>
        <td>".$result['srno']."</td>
        <td>".$result['name']."</td>
        <td>".$result['emailid']."</td>
        <td>".$result['balnce']."</td>
        <td><button><a href= 'view.php?srno=$result[srno]'>&nbsp;&nbsp;View&nbsp;&nbsp;</a></button></td>
        
         </tr>";
    }
}
?>

</body>
</html>
