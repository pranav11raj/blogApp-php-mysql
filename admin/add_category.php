
<?php include ("includes/header.php"); ?>


<?php

  $db=new Database();

  /*
  *   Form action for add_post.php
  */

  if(isset($_POST['submit']) and $_POST['submit']=="Add Category")

  {

    $category = mysqli_real_escape_string($db->link,$_POST['catName']);

    $query="INSERT INTO categories (name) VALUES ('$category')";

    $insertCat=$db->insert($query);
    
  }



?>


<h2> Add Category </h2>

<form method="post" action="add_category.php">
  <div class="form-group">
    <label for="catName">Category Name</label>
    <input type="text" class="form-control" placeholder="Category Name" name="catName">
  </div>

  
  
  <input type="submit" class="btn btn-success" value="Add Category" name="submit">

  <a href="index.php"><button class="btn btn-danger">Cancel</button></a>
</form>
<br>
<br>


<?php include ("includes/footer.php"); ?>