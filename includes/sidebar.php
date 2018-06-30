<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
    <input type="text" 
           name="search"
           class="form-control"
           autocomplete="off">
    <span class="input-group-btn">
    <button class="btn btn-default" 
            name="submit"
            type="submit">
    <span class="glyphicon glyphicon-search"></span>
    </button>
    </span>
    </div>
    </form><!-- search form -->
<!-- /.input-group -->
</div>

<?php 
  
if(!isset($_SESSION['username'])) {

echo  '<div class="well">
        <h4>Login</h4>
        <form action="includes/login.php" method="post">
        <div class="form-group">
        <input type="text" 
               name="username"
               class="form-control"
               placeholder="Enter username"
               autocomplete="off"
               reqired>   
        </div>
        <div class="form-group">
        <input type="password" 
               name="password"
               class="form-control"
               placeholder="Enter password"
               autocomplete="off"
               reqired>         
        </div>
        <input type="submit" value="Login"
            class="btn btn-primary" name="login">
        </form><!-- search form -->
    <!-- /.input-group -->
    </div>';
}
    
?>


<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
    <div class="col-lg-6">
    <ul class="list-unstyled">
<?php
    $query = "SELECT * FROM catagories LIMIT 7"; 
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        
        echo "<li><a href='catagory.php?catagory=$cat_title'>{$cat_title}</a></li>";
    }
?>
    </ul>
    </div>
    <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include 'widget.php'; ?>

</div>