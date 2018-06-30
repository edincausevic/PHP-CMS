<?php

if(isset($_POST['create_post'])) {
    
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    
    $post_tags = strtolower($_POST['post_tags'] . ', ' . $_POST['post_title'] . ', ' . $_POST['post_author'] . ', ' .$_POST['post_category']);
    $post_content = $_POST['post_content'];
    $post_comment_count = 0;
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
    $query .= "VALUES ('{$post_category_id}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";
    
    $create_post_result = mysqli_query($connection, $query);
    
    if (!$create_post_result) {
        die('Sorry, we were not able to submit your form.');
    }
}

?>

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label for="post_title">Post Title</label>
    <input type="text" id="post_title" name="post_title" class="form-control">
    </div>
    
    
    <div class="form-group">
    <div><label for="post_status">Post Catagory</label></div>
    <select name="post_category"> 
<?php
    $query = "SELECT * FROM catagories";
    $all_catagories = mysqli_query($connection, $query);
        
    if(!$all_catagories) {
        die('Sorry, cant get the categories!');
    }    
        
    while($row = mysqli_fetch_assoc($all_catagories)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        echo "<option value='$cat_title'>$cat_title</option>";
    };



?>
    </select>
    </div>
<!--
    <div class="form-group">
    <label for="post_category_id">Post Category ID</label>
    <input type="text" id="post_category_id" name="post_category_id" class="form-control">
    </div>
-->
    
    <div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" id="post_author" name="post_author" class="form-control">
    </div>
    
    <div class="form-group">
    <label for="post_status">Post Status</label>
    <div>
        <select name="post_status">
        <option value="published">Published</option>
        <option value="draft">Draft</option>
    </select>
    </div>
    </div>
    
    <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
    </div>
    
    <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" id="post_tags" name="post_tags" class="form-control">
    </div>
    
    <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea name="post_content" id="post_content" cols="30" rows="10" class="form-control"></textarea>
    </div>
    
    <div class="form-group">
    <input type="submit" name="create_post" value="Publish Post" class="btn btn-primary">
    </div>
    
</form>