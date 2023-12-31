<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    //get updated form data
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $firstName = filter_var($_POST['firstName'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastName = filter_var($_POST['lastName'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'],FILTER_SANITIZE_NUMBER_INT);

    //check for valid input

    if(!$firstName || !$lastName){
        $_SESSION['edit-user'] = "Invalid Form Input on edit page";
    }else{
        // update user
        $query = "UPDATE users SET firstName = '$firstName', lastName = '$lastName', is_admin=$is_admin WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection,$query);

        if(mysqli_errno($connection)){
            $_SESSION['edit-user'] = "Failed to update user.";
        }else{
            $_SESSION['edit-user-success'] = "User $firstName $lastName updated successfully";
        }
    }
}

header('location: ' . ROOT_URL . 'admin/manage-users.php');
die();