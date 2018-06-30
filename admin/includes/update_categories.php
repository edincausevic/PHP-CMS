<!-- EDIT CATEGORY-->
<form action="" method="post">
<div class="form-group">
<label for="edit_cat_title">Edit Category</label>
<?php

if(isset($_GET['edit'])) {

    $edit_cat_id = $_GET['edit'];
    
    $query = "SELECT * FROM catagories WHERE cat_id = {$edit_cat_id}";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $edit_cat_title = $row['cat_title'];
    echo "<input class='form-control' id='edit_cat_title' type='text' name='edit_cat_title' value='{$edit_cat_title}'>";
}
?>
</div>
<div class="form-group">
<input class="btn btn-primary" type="submit" name="update_category" value="Update">
</div>
</form>

<?php

if(isset($_POST['update_category'])) {

    $edit_cat_title = $_POST['edit_cat_title'];
    $query = "UPDATE catagories SET cat_title = '{$edit_cat_title}' WHERE cat_id = {$edit_cat_id}";

    $result = mysqli_query($connection, $query);
    if(!$result) { die('Query failt!'); }
    header("Location: categories.php");
}
?>