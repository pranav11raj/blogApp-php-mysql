
<?php include ("includes/header.php"); ?>

<?php

  $id=$_GET['id'];

  $db = new Database();

  $query = "SELECT * FROM posts WHERE id=".$id;

  $post = $db->select($query)->fetch_assoc();

  $query = "SELECT * FROM categories";

  $categories = $db->select($query);

  //$category = $categories->fetch_assoc();

?>


<?php


  /*
  *   Form action for add_post.php
  */

  if(isset($_POST['editPost']) and $_POST['editPost']=="Edit Post")

  { 
    $title = mysqli_real_escape_string($db->link,$_POST['postTitle']);
    $author = mysqli_real_escape_string($db->link,$_POST['postAuthor']);
    $category = mysqli_real_escape_string($db->link,$_POST['postCategory']);
    $tags = mysqli_real_escape_string($db->link,$_POST['postTags']);
    $body = mysqli_real_escape_string($db->link,$_POST['postBody']);

    $query="UPDATE posts
            SET
            title='$title',
            author='$author',
            category='$category',
            tags='$tags',
            body='$body'
            WHERE id=".$id;

    $updatePost=$db->update($query);  
    
  }

  if(isset($_POST['deletePost']) and $_POST['deletePost']=="Delete Post")
  {
      $query="DELETE FROM posts WHERE id=".$id;

      $delete_Post = $db->delete($query);

  }


?>

<h2> Edit Post </h2>

<form method="post" action="edit_post.php?id=<?php echo $id;  ?>">
  <div class="form-group">
    <label for="postTitle">Post Title</label>
    <input type="text" class="form-control" placeholder="Title" name="postTitle" value="<?php echo $post['title'];  ?>">
  </div>

  <div class="form-group">
    <label for="postAuthor">Author</label>
    <input type="text" class="form-control" placeholder="Author" name="postAuthor" value="<?php echo $post['author'];  ?>">
  </div>

  <div class="form-group">
    <label for="postCategory">Post Category</label>
    <select name="postCategory" class="form-control">

    <?php while ($row = $categories->fetch_assoc()): ?>

      <?php  if($row['id']==$post['category']): ?>
        <?php $selected="selected";  ?>
      <?php else: $selected=" ";  ?>
      <?php endif;  ?>
      <option <?php echo $selected;?> value = <?php echo $row['id'];?> ><?php echo $row['name'];  ?></option>
    <?php endwhile;  ?>
    </select>
  </div>

  <div class="form-group">
    <label for="postTags">Tags</label>
    <input type="text" class="form-control" placeholder="Enter Tags" name="postTags" value="<?php echo $post['tags']; ?>">
  </div>

  <div class="form-group">
    <label for="postBody">Post Body</label>
    <textarea style="width:100%" name="postBody" class="form-control" placeholder="Your post's body goes here..." ><?php echo $post['body']; ?></textarea>
  </div>
  
  <input type="submit" name="editPost" class="btn btn-success" value="Edit Post">

  <input type="submit" name="deletePost" class="btn btn-danger" value="Delete Post">


  

  
</form>


<br>

<a href="index.php"><button class="btn btn-danger">Cancel</button></a>

<br>
<br>



<?php include ("includes/footer.php"); ?>