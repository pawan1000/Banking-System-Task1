<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="displaycss.css">
   <link rel="stylesheet" href="assets/css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>View Customer</title>
    <link rel="stylesheet" href="home.css">
    <style>

      form{
         width:50%;
         align-content:inline;
         margin:auto;
         padding:auto;
      }
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: red;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: 2px solid black;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.formre {
  border-radius: 5px;
  background-image: linear-gradient(aqua,white);
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
  padding-top:20px;
  margin-bottom:20px;
}
.transfer{
   
   align:center;
   padding : auto;
   margin:auto;
   background-color:red;
   height:90px;
   width:200px;
   border-top: 10px solid black;
   border-left: 10px solid black;
   color:white;
}
</style>



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
        <th>Name</th>
        <th>Emailid</th>
        <th>Balance</th>
        
        </tr>
<?php
error_reporting(0);
include("connection.php");
$srno=$_GET['srno'];
$balance=$_GET['balnce'];

$query= "SELECT * FROM CUSTOMER WHERE SRNO='$srno'";
$data=mysqli_query($conn,$query);
if (mysqli_num_rows($data) > 0) {
    // output data of each row
    while($result = mysqli_fetch_assoc($data)) {
    
  $name= $result['name'];
  $srno=$result['srno'];
    echo "
        <tr>
        <td>".$result['srno']."</td>
        <td>".$result['name']."</td>
        <td>".$result['emailid']."</td>
        <td>".$result['balnce']."</td>
        
         </tr>";
    }
  } else {
    echo "0 results";
  }


  mysqli_close($conn);
?>
</table>
<br><br><br><br><br>
<div class="transfer">
<center><h1>Transfer money</h1></center>
</div>
<div class="formre">
<form action="history.php" >
  
<strong><label for="srno_input">Select Senders Sr No</label></strong >
<center> <select name="sendersrno" required>
   <option value=" Pls Select Senders SrNo "> Pls Select Senders SrNo	</option>
    <option value=" 1">1	</option> 
    <option value=" 2">2	</option>
    <option value="3">3	          </option>
    <option value="4">4	        </option>
    <option value=" 5">5		</option>
    <option value=" 6">6		</option>
    <option value="7">	7	    </option>
    <option value="8 ">8		</option>
    <option value="9">9	         </option>
    <option value="10">10         </option>
   </select>
</center>
<br><br>


<strong>Select Senders Name</strong>
   <center> <select name="sendername" required>
   <option value="Select name">Select name	</option>
    <option value="Abhishek vleke">1. Abhishek vleke	</option>
    <option value="samir shelty">2. samir shelty		</option>
    <option value="john">3. john	          </option>
    <option value="prans">4. prans	        </option>
    <option value="harsh jospy">5. harsh jospy		</option>
    <option value="shyam vadora">6. shyam vadora		</option>
    <option value="raviraj">7. raviraj		    </option>
    <option value="Sakura sori">8. Sakura sori		</option>
    <option value="prachi">9. prachi	         </option>
    <option value="shapy">10. shapy            </option>
   </select>
</center>
<br><br>

<strong>Select Recivers Name</strong>
   <center> <select name="recivername" >
   <option value="Select name">Select name	</option>
    <option value="Abhishek vleke">1. Abhishek vleke	</option>
    <option value="samir shelty">2. samir shelty		</option>
    <option value="john">3. john	          </option>
    <option value="prans">4. prans	        </option>
    <option value="harsh jospy">5. harsh jospy		</option>
    <option value="shyam vadora">6. shyam vadora		</option>
    <option value="raviraj">7. raviraj		    </option>
    <option value="Sakura sori">8. Sakura sori		</option>
    <option value="prachi">9. prachi	         </option>
    <option value="shapy">10. shapy            </option>
   </select>
</center>
<br><br>

<strong>Select Recivers SrNo</strong>
<center> <select name="reciversrno">
   <option value=" Pls Select Senders SrNo "> Select srno	</option>
    <option value=" 1">1	</option> 
    <option value=" 2">2	</option>
    <option value="3">3	     </option>
    <option value="4">4	     </option>
    <option value=" 5">5	</option>
    <option value=" 6">6		</option>
    <option value="7">	7	    </option>
    <option value="8 ">8		</option>
    <option value="9">9	         </option>
    <option value="10">10         </option>
   </select>
</center>
<br><br>

<strong>Enter Amount</strong>
<center><input type="text" name="balance" placeholder="pls Enter Amount" required> </center>
<br>
<br><center>
<?php
  $sendername=$_GET['sendername'];
  $sendersrno=$_GET['sendersrno'];
  $recivername=$_GET['recivername'];
  $reciversrno=$_GET['reciversrno'];
  $balance=$_GET['balnce'];

  $sql= "UPDATE `customer` SET `balnce` = balnce + $add WHERE `customer`.`srno` = $srno;";
  $result=mysqli_query($conn,$sql);
 

?>

<a href="history.php"><input type="submit" id="button" name="submit" onclick="return mess();"></a>
</center>

  





</form>
</div>
<script type="text/javascript">
  function mess()
  {
    alert(" Transaction Succesful")
    return true;
  }

   </script>

</body>
</html>
