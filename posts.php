


<?php include("includes/header.php"); ?>


<?php 

  // Testing DB Connection

  $db = new Database();



//Getting category value from the variable


  if(isset($_GET['category']))
  {
    $category=$_GET['category'];

    $query= "SELECT * FROM posts WHERE category=".$category;

    $posts= $db->select($query);
  }

  else
  {
    $query= "SELECT * FROM posts";

    $posts= $db->select($query);
  }


  

  $query= "SELECT * FROM categories";

  $categories= $db->select($query);


 ?>

 <?php if($posts) {  ?>

  <?php while ($row=$posts->fetch_assoc() ):  ?>



          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author'];  ?></a></p>

            <?php echo shortenText($row['body']); ?>

            <br><br>

            
            <a class= "readMore" href="post.php?id=<?php echo $row['id'];  ?>"><button class="btn btn-primary"> Read More </button></a>
          </div><!-- /.blog-post -->

          

      <?php endwhile; ?>

  <?php } else {

    echo "<p>There are no posts yet!</p>";

  }


    ?>

        <?php include("includes/footer.php"); ?>