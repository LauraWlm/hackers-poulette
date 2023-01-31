
<!DOCTYPE HTML>  
<html>
<head>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>  
    <main>
<?php

include('connexion.php');
include('validate.php');
?>

<h2>Contact us</h2>
<span class="error">* required field</span>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
<label for="name">Name:</label> <br>
<input type="text" name="name" id="name">
<span class="error">* <br><?php echo $nameErr;?></span>
<br>

<label for="firstname">Your firstname:</label><br>
<input type="text" name="firstname" id='firstname' >
<span class="error">* <br><?php echo $firstnameErr;?></span>
<br>


<label for="email">E-mail:</label><br> 
<input type="text" name="email" id="email">
<span class="error">* <br><?php echo $emailErr;?></span>
<br>

<label for="comment">Comment:</label><br>
<textarea name="comment" id="comment" rows="10" cols="55" ></textarea>
<span class="error">* <br><?php echo $commentErr;?></span>
<br>

<input type="submit" name="submit" value="Submit">  
</form>

</main>
</body>
</html>