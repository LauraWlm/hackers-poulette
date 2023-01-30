
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hackers Poulette</title>
</head>
<body>
	<center>
		<h2>Contact us</h2>
		<form method="post" action="contact.php">

        <label for="name">Your name:</label> <br>
        <input type="text" name="name" id="name" required minlength="2" maxlength="255" />

        
        <label for="firstname">Your name:</label><br>
        <input type="text" name="firstname" id="firstname" required minlength="2" maxlength="255" />
 
       
        <label for="email">Email address:</label><br>
        <input type="email" id="email" name="email" required minlength="2" maxlength="255"><br>
 
       
        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment" required minlength="250" maxlength="1000"></textarea><br>
       
 
        <input type="submit" value="Submit" />

</form>

	</center>
</body>
</html>