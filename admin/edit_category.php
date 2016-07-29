
<?php include ("includes/header.php"); ?>

<?php 

	$db=new Database();
	
	$id=$_GET['id'];

	$query="SELECT * FROM categories WHERE id =".$id;

	$category=$db->select($query)->fetch_assoc();  



?>

<?php


  /*
  *   Form action for add_post.php
  */

  if(isset($_POST['editCat']) and $_POST['editCat']=="Edit Category")

  { 
    $name = mysqli_real_escape_string($db->link,$_POST['catName']);
    

    $query="UPDATE categories
            SET
            name='$name'
            WHERE id=".$id;

    $updatePost=$db->update($query);  
    
  }

  if(isset($_POST['deleteCat']) and $_POST['deleteCat']=="Delete Category")
  {
      $query="DELETE FROM categories WHERE id=".$id;

      $delete_Post = $db->delete($query);

  }


?>

<h2> Edit Category </h2>

<form method="post" action="edit_category.php?id=<?php echo $id; ?>" >
  <div class="form-group">
    <label for="catName">Category Name</label>
    <input type="text" class="form-control" placeholder="Category Name" name="catName" value="<?php echo $category['name'];  ?>">
  </div>

  
  
  <input type="submit" name="editCat" class="btn btn-success" value="Edit Category">
  <input type="submit" name="deleteCat" class="btn btn-danger" value="Delete Category">

  
</form>

<br>
<a href="index.php"><button class="btn btn-danger">Cancel</button></a>
<br>


<?php include ("includes/footer.php"); ?>