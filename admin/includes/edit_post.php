<?php
    
if(isset($_GET['edit'])) {
    $edit_post_id = $_GET['edit'];
    
    $query = "SELECT * FROM posts WHERE post_id=$edit_post_id"; 
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
    }
    
    if(isset($_POST['update_post'])) {
        
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_comment_count = 0;

        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        if(empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id=$edit_post_id";
            $select_image = mysqli_query($connection, $query);
            
            $post_image =mysqli_fetch_assoc($select_image)['post_image'];
        }
        

        $query = "UPDATE posts SET post_category_id='$post_category_id', post_title='$post_title', post_author='$post_author', post_date='$post_date', post_image='$post_image', post_content='$post_content', post_tags='$post_tags', post_status='$post_status' WHERE post_id=$edit_post_id";

        $create_post_result = mysqli_query($connection, $query);

        if (!$create_post_result) {
            die('Sorry, we were not able to submit your form.');
        }else {
            // go to weiw all posts
            //header('Location')
        }
    }
}    
?>

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" id="post_title" name="post_title" value="<?php echo $post_title; ?>" class="form-control">
    </div>
    
    
    <div class="form-group">
    <select name="post_category"> 
<?php
    $query = "SELECT * FROM catagories";
    $all_catagories = mysqli_query($connection, $query);
        
    if(!$all_catagories) {
        die('Sorry, cant get the categories!');
    }    
        
    while($row = mysqli_fetch_assoc($all_catagories)) {
        $cat_title = $row['cat_title'];
        if ($cat_title == $post_category_id) {
            echo "<option value='$post_category_id'>$post_category_id</option>";
        }else {
            echo "<option value='$cat_title'>$cat_title</option>";
        }
    };



?>
    </select>
    </div>
    
    <div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" id="post_author" name="post_author" value="<?php echo $post_author; ?>" class="form-control">
    </div>
    
    <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" id="post_status" name="post_status" value="<?php echo $post_status; ?>" class="form-control">
    </div>
    
    <div class="form-group">
    <img width="100" name="image" src="../images/<?php echo $post_image; ?>" alt="Post Image">
    <label for="post_image">Post Image</label>
    <input type="file" value="<?php echo $post_image; ?>" name="image">
    </div>
    
    <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" id="post_tags" name="post_tags" value="<?php echo $post_tags; ?>" class="form-control">
    </div>
    
    <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea name="post_content" id="post_content" cols="30" rows="10" class="form-control"><?php echo $post_content; ?></textarea>
    </div>
    
    <div class="form-group">
    <input type="submit" name="update_post" value="Update Post" class="btn btn-primary">
    </div>
    
</form>