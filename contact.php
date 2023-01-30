<?php
require('connexion.php');
// Get form data
if (isset($_POST['name']) &&
    isset($_POST['firstname']) &&
    isset($_POST['email']) &&
    isset($_POST['comment'])) {

    // Server-side data validation
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
    
    // Check if all fields are filled
    if (empty($name) || empty($firstname) || empty($email) || empty($comment)) {
        echo '<p class="error">Please fill in all fields</p>';
    } else {
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

        // Redirect to confirmation page
        header('Location: index.php');
        exit;
    }
}
?>


