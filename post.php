<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

<!-- Page Content -->
<div class="container">

<div class="row">

<!-- Blog Entries Column -->
<div class="col-md-8">
   

<?php
    
    if(isset($_GET['p_id'])) {
        $clicke_post_id = $_GET['p_id'];
        
        $postQuery = "SELECT * FROM posts WHERE post_id= $clicke_post_id";
        $postResult = mysqli_query($connection, $postQuery);
        
        while($row = mysqli_fetch_assoc($postResult)) {
        
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
   
        }
?>    
    

    <!-- First Blog Post -->
    <h2>
        <?php echo $post_title;?>
    </h2>
    <p class="lead">
        by <?php echo $post_author;?>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date;?></p>
    <hr>
    <img class="img-responsive"  style="min-width:100%"
        src="images/<?php echo $post_image; ?>" alt="Post Image">
    <hr>
    <p><?php echo $post_content;?></p>


    <hr>
        
<?php } ?>

    
<!-- Blog Comments -->
<?php
    
    if(isset($_POST['create_comment'])) {
        $post_id = $_GET['p_id'];
        $comment_author = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
        $comment_content = $_POST['comment_content'];
        
        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_content, comment_status, comment_date) VALUES ({$post_id}, '{$comment_author}', '{$comment_content}', 'approved', now())";
        $commentResult = mysqli_query($connection, $query);
        
        if(!$commentResult) {
        die('ERROR: Sorry, cant submit your comment!');
        }
        
        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1";
        $comment_count_result = mysqli_query($connection, $query);
    }
    
?>

<!-- Comments Form -->
<?php

if(isset($_SESSION['username'])) {

    echo '<div class="well">
<h4>Leave a Comment:</h4>
<form role="form" action="" method="post">
<div class="form-group">
<label for="">Your Comment</label>
<textarea class="form-control" name="comment_content" rows="3" required></textarea>
</div>
<button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
</form>
</div>';
    
}
    
    
    
?>

<hr>

<!-- Posted Comments -->

<!-- Comment -->


<?php
    $post_id = $_GET['p_id'];
    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status = 'approved' ORDER BY comment_id DESC";
    $selectCommentResult = mysqli_query($connection, $query);
   
    while($row = mysqli_fetch_assoc($selectCommentResult)) {
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_date = $row['comment_date'];
    
?>
<div class="media">
<a class="pull-left" href="#">
<img class="media-object" src="http://placehold.it/64x64" alt="">
</a>
<div class="media-body">
<h4 class="media-heading">
    <?php echo $comment_author; ?>
    <small><?php echo $comment_date; ?></small>
</h4>
<?php echo $comment_content; ?>
</div>
</div>

<?php } ?>





</div>

<!-- Blog Sidebar Widgets Column -->
<?php include 'includes/sidebar.php';  ?>

</div>
<!-- /.row -->

<hr>

<?php include 'includes/footer.php';  ?>
