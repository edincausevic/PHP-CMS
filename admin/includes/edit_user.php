<?php

if(isset($_GET['edit_user'])) {
    $edit_user_id = $_GET['edit_user'];
    
    $query = "SELECT * FROM users WHERE user_id=$edit_user_id";
    $get_user_result = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_assoc($get_user_result)) {
             
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $user_username = $row['user_username'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
    }
}

if(isset($_POST['edit'])) {
    
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
    
    $query = "UPDATE users SET user_firstname='$user_firstname', user_lastname='$user_lastname', user_role='$user_role', user_username='$user_username', 
    user_email='$user_email', user_password='$user_password' WHERE user_id=$edit_user_id";
    
    $edit_user_result = mysqli_query($connection, $query);
    
    if (!$edit_user_result) {
        die('Sorry, we were not able to submit your form.');
    }
}

?>

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="user_firstname">First Name</label>
    <input type="text" value="<?php echo $user_username; ?>" id="user_firstname" name="user_firstname" class="form-control" required>
    </div>
    
    <div class="form-group">
    <label for="user_lastname">Last Name</label>
    <input type="text" value="<?php echo $user_lastname; ?>" id="user_lastname" name="user_lastname" class="form-control" required>
    </div>
    
    <div class="form-group">
    <select name="user_role">
       <?php 
        echo "<option value='subscriber'>$user_role</option>";
        
        if($user_role == 'admin') {
            echo "<option value='subscriber'>subscriber</option>";
        }else {
            echo "<option value='admin'>admin</option>";
        }
        ?>
    </select>
    </div>
    
    <div class="form-group">
    <label for="user_username">Username</label>
    <input type="text" value="<?php echo $user_username; ?>" id="user_username" name="user_username" class="form-control" required>
    </div>
    
    <div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" value="<?php echo $user_email; ?>" id="user_email" name="user_email" class="form-control" required>
    </div>
    
    <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" value="<?php echo $user_password; ?>" id="user_password" name="user_password" class="form-control" required>
    </div>
    
    <div class="form-group">
    <input type="submit" id="add_user" name="edit" class="btn btn-primary" value="Update User" required>
    </div>
    
</form>