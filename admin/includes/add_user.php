<?php

if(isset($_POST['add_user'])) {
    
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    
    
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];
//    
//    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, user_username, user_email, user_password) ";
    $query .= "VALUES ('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$user_username}', '{$user_email}', '{$user_password}') ";
    
    $add_user_result = mysqli_query($connection, $query);
    
    if (!$add_user_result) {
        die('Sorry, we were not able to submit your form.');
    }
    
    echo "User Created: " . " " . "<a href='users.php'>View Users</a>";
}

?>

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="user_firstname">First Name</label>
    <input type="text" id="user_firstname" name="user_firstname" class="form-control" required>
    </div>
    
    <div class="form-group">
    <label for="user_lastname">Last Name</label>
    <input type="text" id="user_lastname" name="user_lastname" class="form-control" required>
    </div>
    
    <div class="form-group">
    <select name="user_role" >
        <option value="admin">Select Options</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
    </select>
    </div>
    
    <div class="form-group">
    <label for="user_username">Username</label>
    <input type="text" id="user_username" name="user_username" class="form-control" required>
    </div>
    
    <div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" id="user_email" name="user_email" class="form-control" required>
    </div>
    
    <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" id="user_password" name="user_password" class="form-control" required>
    </div>
    
    <div class="form-group">
    <input type="submit" id="add_user" name="add_user" class="btn btn-primary" required>
    </div>
    
</form>