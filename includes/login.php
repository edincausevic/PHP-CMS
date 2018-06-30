<?php include 'db.php'; ?>
<?php session_start(); ?>


<?php

if(isset($_POST['login'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password); 
    
    $query = "SELECT * FROM users WHERE user_username='$username' AND user_password='$password'";
    $login_result = mysqli_query($connection, $query);
    
    if (!$login_result) {
        die('Query faild!' . mysqli_error($connection));
    }
    
    if(mysqli_num_rows($login_result) == 1) {
        
        while($row = mysqli_fetch_assoc($login_result)) {

            $user_id = $row['user_id'];
            $user_username = $row['user_username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_role = $row['user_role']; 
        }
        
        if ($username === $user_username && $password === $user_password) {
            
            $_SESSION['username'] = $user_username;
            $_SESSION['firstname'] = $user_firstname;
            $_SESSION['lastname'] = $user_lastname;
            $_SESSION['user_role'] = $user_role;
            
            header("Location: ../admin");
        }
        
    }else {
        header("Location: ../index.php");
    }
}
    
?>