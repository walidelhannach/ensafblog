<?php
include 'partials/header.php';

//get back form data if there was a registration error
$firstName = $_SESSION['add-user-data']['firstName'] ?? null;
$lastName = $_SESSION['add-user-data']['lastName'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$createPassword = $_SESSION['add-user-data']['createPassword'] ?? null;
$confirmPassword = $_SESSION['add-user-data']['confirmPassword'] ?? null;

// delete session data

unset($_SESSION['add-user-data']);
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add User</h2>
        <?php if(isset($_SESSION['add-user'])): ?>
                <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-user'];
                    unset($_SESSION['add-user']);
                    ?>
                </p>
            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-user-logic.php" enctype="multipart/form-data" method="post">
            <input type="text" name="firstName" value="<?=$firstName?>" placeholder="First Name">
            <input type="text" name="lastName" value="<?=$lastName?>" placeholder="Last Name">
            <input type="text" name="username" value="<?=$username?>" placeholder="Username">
            <input type="text" name="email" value="<?=$email?>" placeholder="Email">
            <input type="password" name="createPassword" value="<?=$createPassword?>" placeholder="Create Password">
            <input type="password" name="confirmPassword" value="<?=$confirmPassword?>" placeholder="Confirm Password">
            <select name="userrole">
                <option value="0">Student</option>
                <option value="1">Professor</option>
            </select>
            <div class="form__control">
                <label for="avatar">User Avatar</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button class="btn" name="submit" type="submit">Add User</button>
        </form>
    </div>
</section>

<?php
include '../partials/footer.php'
?>