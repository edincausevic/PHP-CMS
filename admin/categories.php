<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

<?php include "includes/admin_navigation.php"; ?>

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Welcome to admin
<small><?php echo $_SESSION['username']; ?></small>
</h1>

<div class="col-xs-6">
  
    <!-- ADD CATEGORY-->
    <form action="" method="post">
    <div class="form-group">
    <label for="cat_title">Add Category</label>
    <input class="form-control" id="cat_title" type="text" name="cat_title">
    </div>
    <div class="form-group">
    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
    </div>
    </form>
    <!--  ADD CATEGORY-->
    <?php insert_category(); ?>
    <!--  DELETE CATEGORY-->
    <?php deleteCategories(); ?>
    
    
    <?php
        if(isset($_GET['edit'])) {
            
            include 'includes/update_categories.php';
        }
    ?>
    
</div>

<div class="col-xs-6">
   
    <table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Category Title</th>
    </tr>
    </thead>
    
    <tbody>
    <!--  CREATE TABLE DATA WITH CATEGORY-->
    <?php findAllCategories();  ?>
    
    <?php deleteCategories(); ?>
    </tbody>
    </table>
    
</div>


</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>


<?php include "includes/admin_footer.php"; ?>