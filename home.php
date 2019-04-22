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
  padding: 30px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  top :250%;
  
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 50%;
  width: 250px;
}

.button1 {
  background-color: #F9A2C6; 
  color: black; 
  border: 2px solid #181515;
}

.button1:hover {
  background-color: #EA4122;
  color: white;
}

.button2 {
  background-color: #F9A2C6; 
  color: black; 
  border: 2px solid #181515;
}

.button2:hover {
  background-color: #EA4122;
  color: white;
}




</style>
</head>
<body>
<div class="background">
<center>
<h1>
<div style="font-size: 80px;font-color: black; font-style: oblique;text-align: center; margin: 140px 20px;">CREDIT MANAGEMENT</div></h1>

<a href="view_users.php">
<input type="button" class="button button1" name="users" value="All users" >
</a>

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<a href="credit_amount.php">
<input type="button" class="button button1" name="credit" value="Credit amount" >
</a>

</center>
</div>
</body>
</html>

