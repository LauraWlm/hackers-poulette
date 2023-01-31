
<!DOCTYPE HTML>  
<html>
<head>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>  

<?php

include('connexion.php');
include('validate.php');
?>

<h2>Contact us</h2>
<span class="error">* required field</span>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
    <label for="name">Name:</label> <br>

  <input type="text" name="name" id="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  <label for="firstname">Your firstname:</label><br>

  <input type="text" name="firstname" id='firstname' >
  <span class="error">* <?php echo $firstnameErr;?></span>
  <br><br>


  <label for="email">E-mail:</label><br> 
  
  <input type="text" name="email" id="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

  <label for="comment">Comment:</label><br>
  
  <textarea name="comment" id="comment" rows="5" cols="40" ></textarea>
  <span class="error">* <?php echo $commentErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $firstname;
echo "<br>";
echo $email;
echo "<br>";
echo $comment;

?>

</body>
</html>