<?php

// define variables and set to empty values
$nameErr = $firstnameErr = $emailErr = $commentErr = "";
$name = $firstname =$email = $comment = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = 'Name is required';
} else {
  $name = test_input($_POST["name"]);
  // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z0-9\s]{2,255}$/",$name)) {
    $nameErr = "Only letters, numbers, and white spaces allowed, minimum 2 and maximum 255 characters";
  }
}
if (empty($_POST["firstname"])) {
    $firstnameErr = "First name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9\s]{2,255}$/",$firstname)) {
      $firstnameErr = "Only letters, numbers, and white spaces allowed, minimum 2 and maximum 255 characters";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
 
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
    if (!preg_match("/^.{255,1000}$/",$comment)) {
        $commentErr = "Comment must contain at least 255 characters, and a maximum of 1000";
    }
  }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
   

 // Check if all fields have correct data before inserting into database
 if (empty($nameErr) && empty($firstnameErr) && empty($emailErr) && empty($commentErr)) {

 // Prepare insert statement
 $sql = "INSERT INTO contact_form (name, firstname, emailAddress, comment)
 VALUES (:name, :firstname, :email, :comment)";
 $stmt = $pdo->prepare($sql);

// Bind values
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

// Execute statement
$stmt->execute();

// Message de confirmation
echo "Votre formulaire a été envoyé avec succès.";

// Close connection
unset($pdo);

}
?>