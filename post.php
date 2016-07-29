
<?php include("includes/header.php"); ?>

<?php 

// Testing DB Connection

  $db = new Database();

  $id=$_GET['id'];

  $query="SELECT MAX(id) FROM posts";
  $resId= $db->select($query);
  $resId=$resId->fetch_array();
  $maxId=$resId[0];

    

    


  
  
  if($id!=1)
  {
    $idNav[0]=$id-1; // id of previous post
    $prevLink="http://localhost/webApps/blogApp/post.php?id=".$idNav[0];
  }
  if($id!=$maxId)
  {
    $idNav[1]=$id+1; // id of next post
    $nextLink="http://localhost/webApps/blogApp/post.php?id=".$idNav[1];

  }

  $query= "SELECT * FROM posts WHERE id=".$id;

  $post= $db->select($query);

  $post=$post->fetch_assoc();

  $query= "SELECT * FROM categories";

  $categories= $db->select($query);


 ?>

          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($post['date']); ?> by <a href="#"><?php echo $post['author'];  ?></a></p>

            <?php echo $post['body']; ?>
          </div><!-- /.blog-post -->

          

          

          <nav>
            <ul class="pager">

            <?php if(isset($prevLink)):   ?>
              <li><a href="<?php echo $prevLink;  ?>">Previous</a></li>
            <?php endif; ?>
            <?php if(isset($nextLink)):   ?>
              <li><a href="<?php echo $nextLink;  ?>">Next</a></li>
            <?php endif; ?>
            </ul>
          </nav>

        <?php include("includes/footer.php"); ?>