


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Hackers Poulette</title>
</head>
<body>
	<center>
		<h1>Contact form</h1>
		<form action="insert.php" method="post">
			
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo isset($name) ? $name : ''; ?>">
        <?php if (!empty($name_error)): ?>
        <p class="error-message"><?php echo $name_error; ?></p>
        <?php endif; ?> <br>

        <label for="firstname">First name</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo isset($firstname) ? $firstname : ''; ?>">
        <?php if (!empty($firstname_error)): ?>
        <p class="error-message"><?php echo $firstname_error; ?></p>
        <?php endif; ?> <br>

        <label for="email">Email address</label>
        <input type="email" name="email" id="email" value="<?php echo isset($email) ? $email : ''; ?>">
        <?php if (!empty($email_error)): ?>
        <p class="error-message"><?php echo $email_error; ?></p>
        <?php endif; ?> <br>

        <label for="comment">Comment</label>
        <textarea name="comment" id="comment"><?php echo isset($comment) ? $comment : ''; ?></textarea>
        <?php if (!empty($comment_error)): ?>
        <p class="error-message"><?php echo $comment_error; ?></p>
        <?php endif; ?> <br>

        <input type="submit" value="Submit"> 

       <!-- Captcha -->
        <div class="g-recaptcha" data-sitekey="YOUR_RECAPTCHA_PUBLIC_KEY"></div>
        <span class="error">* <?php echo $captcha_error; ?></span><br><br>
        <input type="submit" value="Validate captcha">

        </form>

	</center>
</body>
</html>