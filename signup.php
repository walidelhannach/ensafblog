<?php

require 'config/database.php';

//get back form data if there was a registration error
$firstName = $_SESSION['signup-data']['firstName'] ?? null;
$lastName = $_SESSION['signup-data']['lastName'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createPassword = $_SESSION['signup-data']['createPassword'] ?? null;
$confirmPassword = $_SESSION['signup-data']['confirmPassword'] ?? null;

// delete signup data session

unset($_SESSION['signup-data']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage Blog Website</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign Up</h2>
        <?php if(isset($_SESSION['signup'])): ?>
                <div class="alert__message error">
                <p>
                    <?= $_SESSION['signup'];
                    unset($_SESSION['signup']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        <form action="<?=ROOT_URL?>signup-logic.php" enctype="multipart/form-data" method="post">
            <input type="text" name="firstName" value="<?=$firstName?>" placeholder="First Name">
            <input type="text" name="lastName" value="<?=$lastName?>" placeholder="Last Name">
            <input type="text" name="username" value="<?=$username?>" placeholder="Username">
            <input type="text" name="email" value="<?=$email?>"  placeholder="Email">
            <input type="password" name="createPassword" value="<?=$createPassword?>" placeholder="Create Password">
            <input type="password" name="confirmPassword" value="<?=$confirmPassword?>" placeholder="Confirm Password">
            <div class="form__control">
                <label for="avatar"></label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button class="btn" name="submit" type="submit"> Sign Up</button>
            <small>Already have an account? <a href="signin.php">Sign In</a></small>
        </form>
    </div>
</section>
</body>
</html>