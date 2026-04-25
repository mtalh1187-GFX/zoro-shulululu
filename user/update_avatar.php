<?php
require('../_config.php');
session_start();

if(isset($_POST['avatar']) && isset($_POST['user_id'])) {
    $avatar = mysqli_real_escape_string($conn, $_POST['avatar']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    
    $update_query = "UPDATE `user_form` SET `image` = '$avatar' WHERE `id` = '$user_id'";
    
    if(mysqli_query($conn, $update_query)) {
        echo "Avatar updated successfully";
    } else {
        echo "Error updating avatar: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>