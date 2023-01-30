<?php
// Connexion à la base de données
try {
  $pdo = new PDO("mysql:host=localhost;dbname=hackers-poulette", "root", "");
} catch (PDOException $e) {
  die("Error: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validation et nettoyage des données
  $name = clean_input($_POST["name"]);
  $firstname = clean_input($_POST["firstname"]);
  $email = clean_input($_POST["email"]);
  $comment = clean_input($_POST["comment"]);

  $name_error = validate_input($name, 2, 255, "/^[a-zA-Z ]*$/", "Name is not valid.");
  $firstname_error = validate_input($firstname, 2, 255, "/^[a-zA-Z ]*$/", "First name is not valid.");
  $email_error = validate_input($email, 2, 255, "/^\S+@\S+\.[a-zA-Z]{2,}$/", "Email address is not valid.");
  $comment_error = validate_input($comment, 250, 1000, "/.*/", "Comment must have at least 250 characters.");

  // Vérification du captcha
  $recaptcha_secret = "YOUR_RECAPTCHA_PRIVATE_KEY";
  $recaptcha_response = $_POST["g-recaptcha-response"];
  $recaptcha_verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$recaptcha_response}");
  $recaptcha_verification = json_decode($recaptcha_verify, true);

  if (!$recaptcha_verification["success"]) {
    $captcha_error = "Captcha verification failed.";
  }

  // Si aucune erreur, envoi des données à la base de données
  if (empty($name_error) && empty($firstname_error) && empty($email_error) && empty($comment_error) && empty($captcha_error)) {
    $sql = "INSERT INTO form (name, firstname, email, comment) VALUES (:name, :firstname, :email, :comment)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
      ":name" => $name,
      ":firstname" => $firstname,
      ":email" => $email,
      ":comment" => $comment
    ));
    echo "Form submitted successfully!";
  }
}

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function validate_input($data, $min_length, $max_length, $pattern, $error_message) {
  if (strlen($data) < $min_length || strlen($data) > $max_length || !preg_match($pattern, $data)) {
    return $error_message;
  }
  return "";
}

?>