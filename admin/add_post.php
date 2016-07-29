
<?php include ("includes/header.php"); ?>

<?php

  $db=new Database();

  /*
  *   Form action for add_post.php
  */

  if(isset($_POST['submit']) and $_POST['submit']=="Add Post")

  {

    $title = mysqli_real_escape_string($db->link,$_POST['postTitle']);
    $author = mysqli_real_escape_string($db->link,$_POST['postAuthor']);
    $category = mysqli_real_escape_string($db->link,$_POST['postCategory']);
    $tags = mysqli_real_escape_string($db->link,$_POST['postTags']);
    $body = mysqli_real_escape_string($db->link,$_POST['postBody']);

    $query="INSERT INTO posts (title, author, category, tags, body) VALUES ('$title','$author','$category','$tags','$body')";

    $insertPost=$db->insert($query);
    
  }



?>





<?php 

  

  $query="SELECT * FROM categories";

  $categories=$db->select($query);  



?>

<h2> Add Post </h2>

<form method="post" action="add_post.php">
  <div class="form-group">
    <label for="postTitle">Post Title</label>
    <input type="text" class="form-control" placeholder="Title" name="postTitle"required>
  </div>

  <div class="form-group">
    <label for="postAuthor">Author</label>
    <input type="text" class="form-control" placeholder="Author" name="postAuthor" required>
  </div>

  <div class="form-group">
    <label for="postCategory">Post Category</label>
    <select  name="postCategory" class="form-control" required>
      <?php while($category=$categories->fetch_assoc()):   ?>
      <option value="<?php echo $category['id'];  ?>"><?php echo $category['name'];  ?></option>
      <?php endwhile;  ?>
    </select>
  </div>

  <div class="form-group">
    <label for="postTags">Tags</label>
    <input type="text" class="form-control" placeholder="Enter Tags" name="postTags" required>
  </div>

  <div class="form-group">
    <label for="postBody">Post Body</label>
    <textarea name="postBody" class="form-control" placeholder="Your post's body goes here..." required></textarea>
  </div>
  
  <input type="submit" class="btn btn-success" value="Add Post" name="submit">

  
</form>
<br>
<a href="index.php"><button class="btn btn-danger">Cancel</button></a>
<br>
<br>


<?php include ("includes/footer.php"); ?>