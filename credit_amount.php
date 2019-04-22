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
  padding: 230px 0;
  
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
  width: 50%;
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
<form method="post">
<center>
<h1>
<div style="font-size: 50px;font-color: black; font-style: oblique;text-align: center; margin: 100px 20px;">CREDIT AMOUNT</div></h1>


<label class="font">Enter Your name :</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" class="text" name="user1"  >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<label class="font">Enter User to credit :</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" class="text" name="user2"  >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<label class="font">Enter Amount :</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="text" class="text" name="amount"  ><br><br><br>
<input type="submit" class="button button1" name="credit" value="Credit Amount" >
<br><br><br><br>

<?php

	$connect=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($connect,"credit");
   
	if(isset($_POST["credit"]))
	{
		$v1=$_REQUEST["user1"];     
		$v2=$_REQUEST["user2"];
		$v3=$_REQUEST["amount"];
		$q="SELECT * from transfer where username= '$v1';";
		$val=mysqli_query($connect,$q);
		$q2="SELECT * from transfer where username= '$v2';";
		$val1=mysqli_query($connect,$q2);
		$row=mysqli_fetch_array($val,MYSQLI_ASSOC);
		$row1=mysqli_fetch_array($val1,MYSQLI_ASSOC);
				
       /* echo "<br>";	
        echo $row["amount"];
        echo"<br>";			
		echo $row1["username"];
        echo"<br>";	
		echo $row1["amount"];
        echo"<br>";*/
     if($row["amount"]>0 && $row1["amount"]>0)
	 {
		$row["amount"]=$row["amount"]-$v3;
		$row1["amount"]=$row1["amount"]+$v3;	
        $a=$row["username"];
		$a1=$row["amount"];
		$b=$row1["username"];
		$b1=$row1["amount"];
				
		$w="UPDATE transfer SET amount='$a1' WHERE username='$a'";
		$w1="UPDATE transfer SET amount='$b1' WHERE username='$b'";
		mysqli_query($connect,$w);
		mysqli_query($connect,$w1);
		echo "<br>";	
		echo "<font size='8px' face='Arial'>";
		echo $row["username"]."&nbspTransaction Done Successfully!!!!!!";
		echo "</font>";
		/*echo "<br>";	
		echo $row["username"];
        echo "<br>";	
        echo $row["amount"];
        echo"<br>";			
		echo $row1["username"];
        echo"<br>";	
		echo $row1["amount"];
        echo"<br>";	*/
		echo "<table id=tb_users>";
            echo "<tr>";
                echo "<th>Name</th>";
                
                echo "<th>Amount</th>";
                
            echo "</tr>";
        
            echo "<tr>";
                echo "<td>". $row['username'] . "</td>";
                
                echo "<td>". $row['amount'] . "</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>". $row1['username'] . "</td>";
                
                echo "<td>". $row1['amount'] . "</td>";
                
            echo "</tr>";
        
        echo "</table>";
	 }
		else {
			echo "!!!Low Balance, Transaction cannot be done!!!";
		}
	}

	
?>


</center>
</form>
<center>
<br>
<br>
<a href="home.php">
<input type="submit" value="Home"style="font-style: italic; font-family:  Helvetica, sans-serif; font-weight: bold; font-size: 17px;" ></a>&nbsp&nbsp&nbsp&nbsp
<a href="view_users.php">
<input type="submit" value="View all Users" style="font-style: italic; font-family:  Helvetica, sans-serif; font-weight: bold; font-size: 17px;"></a>
</center>
</div>
</body>
</html>