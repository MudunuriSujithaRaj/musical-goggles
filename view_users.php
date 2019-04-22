<!DOCTYPE html>
<html>
<head>
<style>
.background {
  background-image: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url("back.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  
  -moz-background-size: cover;
  -webkit-background-size: cover;
  -o-background-size: cover;
  -ms-background-size: cover;
  background-position: center center;
  padding: 220px 0;
  
  }
  
.button {
  background-color: #181515; 
  border: none;
  color: white;
  
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  
  
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 50%;
  width: 180px;
  height: 50px;
  
}

.button1 {
  background-color: #FAABC6; 
  color: black; 
  border: 2px solid #181515;
}

.button1:hover {
  background-color: #525EF6;
  color: white;
}


.text {
  
  width: 200px;
  padding: 12px 20px;
  margin: 0px 0;
  display: inline-block;
  border: 1px solid #0D0D0D;
  border-radius: 7px;
  box-sizing: border-box;
	
}
.font {
	font-style: italic;
	font-family:  Helvetica, sans-serif;
	font-weight: bold;
	font-size: 20px;
}

#tb_users {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 70%;
}

#tb_users td, #tb_users th {
  border: 1px solid #010203;
  padding: 8px;
}

#tb_users tr:nth-child(even){background-color: #DCDCDC;}
#tb_users tr:nth-child(odd){background-color: #DCDCDC;}

#tb_users tr:hover {background-color: #ddd;}

#tb_users th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}


</style>
</head>
<body>
<div class="background">
<center>
<h1>
<div style="font-size: 50px;font-color: black; font-style: oblique;text-align: center; margin: 100px 20px;">LIST OF USERS</div></h1>
<?php

$link = mysqli_connect("localhost", "root", "")or die("could not connect");
 $db=mysqli_select_db($link,"credit")or die("could not select");

$sql = "SELECT * FROM transfer";
if($result= mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table id=tb_users>";
            echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Amount</th>";
                
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>". $row['username'] . "</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp". $row['email'] . "&nbsp&nbsp&nbsp&nbsp</td>";
                echo "<td>". $row['amount'] . "</td>";
                
            echo "</tr>";
        }
        echo "</table>";

        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

mysqli_close($link);

?>
<br>
<br>
<a href="home.php">
<input type="submit" value="Home"style="font-style: italic; font-family:  Helvetica, sans-serif; font-weight: bold; font-size: 17px;" ></a>&nbsp&nbsp&nbsp&nbsp
<a href="credit_amount.php">
<input type="submit" value="Credit amount" style="font-style: italic; font-family:  Helvetica, sans-serif; font-weight: bold; font-size: 17px;"></a>
</center>
</div>
</body>
</html>