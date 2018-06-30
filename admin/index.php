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
</div>
</div>
<!-- /.row -->

       
                <!-- /.row -->
                
<div class="row">

<div class="col-lg-3 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-file-text fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<?php
    
    $query = "SELECT * FROM posts";
    $select_posts_result = mysqli_query($connection, $query);
    $num_of_posts = mysqli_num_rows($select_posts_result);
    
    echo "<div class='huge'>$num_of_posts</div>";
    
?>
<div>Posts</div>
</div>
</div>
</div>
<a href="posts.php">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>

<div class="col-lg-3 col-md-6">
<div class="panel panel-green">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-comments fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<?php
    
    $query = "SELECT * FROM comments";
    $select_comments_result = mysqli_query($connection, $query);
    $num_of_comments = mysqli_num_rows($select_comments_result);
    
    echo "<div class='huge'>$num_of_comments</div>";
    
?>
<div>Comments</div>
</div>
</div>
</div>
<a href="comments.php">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>

<div class="col-lg-3 col-md-6">
<div class="panel panel-yellow">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-user fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<?php
    
    $query = "SELECT * FROM users";
    $select_users_result = mysqli_query($connection, $query);
    $num_of_users = mysqli_num_rows($select_users_result);
    
    echo "<div class='huge'>$num_of_users</div>";
    
?>
<div> Users</div>
</div>
</div>
</div>
<a href="users.php">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>

<div class="col-lg-3 col-md-6">
<div class="panel panel-red">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-list fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<?php
    
    $query = "SELECT * FROM catagories";
    $select_catagories_result = mysqli_query($connection, $query);
    $num_of_catagories = mysqli_num_rows($select_catagories_result);
    
    echo "<div class='huge'>$num_of_catagories</div>";
    
?>
<div>Categories</div>
</div>
</div>
</div>
<a href="categories.php">
<div class="panel-footer">
<span class="pull-left">View Details</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>
</div>
</div>
<!-- /.row -->

<div class="row">
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawStuff);

  function drawStuff() {
    var data = new google.visualization.arrayToDataTable([
      ['Data', 'Count'],

<?php 
        $element_title = ["Active Post", "Comments", "Users", "Categories"];
        $element_count = [$num_of_posts, $num_of_comments, $num_of_users, $num_of_catagories];
        
        for($i = 0; $i < 4; $i++) {
            echo "['{$element_title[$i]}'" . ", ". "'{$element_count[$i]}'],";
        }
?>

      
    ]);

    var options = {
      width: '100%',
      legend: { position: 'none' },
      chart: {
        title: '',
        subtitle: '' },
      axes: {
        x: {
          0: { side: 'top', label: ''} // Top x-axis.
        }
      },
      bar: { groupWidth: "90%" }
    };

    var chart = new google.charts.Bar(document.getElementById('top_x_div'));
    // Convert the Classic options to Material options.
    chart.draw(data, google.charts.Bar.convertOptions(options));
  };
</script>
    <div id="top_x_div" style="width: 100%; height: 600px;"></div>
</div>

</div>
<!-- /.container-fluid -->

</div>


<?php include "includes/admin_footer.php"; ?>