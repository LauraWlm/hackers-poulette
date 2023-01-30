<?php 

$firstName = $lastName = $email = $comment = $city = $code = $country = "";

$errFirstName = $errLastName = $errEmail = $errComment = $errCity = $errCode = $errCountry = "";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['submit'])){

        if (!empty($_POST['firstName'])){
        $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
            if (preg_match('/^[a-zA-ZÀ-ù-]{1,30}$/', $firstName)){
                $firstName = $_POST['firstName'];
                $_SESSION['firstName'] = $firstName;
              } else {
                $errFirstName = "First name must be less than 30 characters and letters only";    
                $firstName = "";
                $errors[] =  "name";
                $classError = "style='background-color:#F8787C'";
               
            }
        } else {
        $errFirstName = "First name cannot be empty";
        $errors[] =  "name";
        $classError = "style='background-color:#F8787C'";

        }
        if (!empty($_POST['lastName'])){
        $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
        if (preg_match('/^[\sa-zA-ZÀ-ù-]{1,30}$/', $lastName)){
            $lastName = $_POST['lastName'];
          } else {
            $errLastName = "Last name must be less than 30 characters";    
            $lastName = "";
            $errors[] =  "last name";
            $classError = "style='background-color:#F8787C'";
        }
    
    } else {
        $errLastName = "Last name cannot be empty";
        $errors[] =  "last name";
        $classError = "style='background-color:#F8787C'";

        }
        if (!empty($_POST['email'])){

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errEmail = "Invalid email format";
        $email = "";
        $errors[] =  "email";
        $classError = "style='background-color:#F8787C'";

        } else {
            $email = $email;
        }

        } else {

        $errEmail = "Email cannot be empty";
        $errors[] =  "email";
        $classError = "style='background-color:#F8787C'";


        }
        if (!empty($_POST['comment'])){

        $comment= filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
    
        if (preg_match('/^[.°\sa-zA-Z0-9-]*$/', $comment)){
            $comment = $comment;
          } else {
            $errComment = "Comment cannot contain special characters";   
            $comment = "";
            $errors[] =  "comment";
            $classError = "style='background-color:#F8787C'";
        }

        } else {
    
        $errComment = "Comment cannot be empty";
        $errors[] =  "comment";
        $classError = "style='background-color:#F8787C'";
                
        };
 
}}

?>
<form style="display:<?php echo ($orderPlaced == true) ? "none" : "flex";?>" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

<label for="firstName">First Name</label>
<input name="firstName" <?php echo (isset($classError)) ? $classError : "" ?> id="firstName" type="text" value="<?php echo $firstName;?>" required/>
<?php echo '<span class="error">'.$errFirstName.'</span>'; ?>

<label for="lastName">Last Name</label>
<input name="lastName" <?php echo (isset($classError)) ? $classError : "" ?> id="lastName" type="text" value="<?php echo $lastName;?>" required/>
<?php echo '<span class="error">'.$errLastName.'</span>'; ?>

<label for="email">Email</label>
<input name="email" <?php echo (isset($classError)) ? $classError : "" ?> type="email" id="email" value="<?php echo $email;?>" required>
<?php echo '<span class="error">'.$errEmail.'</span>'; ?>

<label for="address">Comment</label>
    <input name="comment" <?php echo (isset($classError)) ? $classError : "" ?> type="text" id="comment" value="<?php echo $comment;?>" required>
    <?php echo '<span class="error">'.$errComment.'</span>'; ?>

</form>