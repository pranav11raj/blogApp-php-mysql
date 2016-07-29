<?php include ("includes/header.php");   ?>


<?php

// create DB Object

$db=new Database();

$query="SELECT posts.*, categories.name FROM posts
        INNER JOIN categories
        WHERE posts.category=categories.id ORDER BY posts.date DESC";

$posts=$db->select($query);

$query="SELECT * FROM categories ORDER BY id DESC";

$categories=$db->select($query);






?>


  <h2 align="center"> Dashboard </h2>

  <?php if(isset($_GET['msg'])):  ?>

    <div class= "alert alert-success">

      <?php echo htmlentities($_GET['msg']); ?>

    </div>


  <?php endif; ?>

  

  <div class="table-responsive">
    
    <table class="table table-hover">

      <tr class="info">

        <th>Post ID #</th>
        <th>Post Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Date</th>

      </tr>

    <?php if($posts):  ?>

      <?php while ($row=$posts->fetch_assoc()):  ?>

      <tr>
      
        <td><?php echo $row['id'];  ?></td>
        <td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title'];  ?></a></td>
        <td><?php echo $row['name'];  ?></td>
        <td><?php echo $row['author'];  ?></td>
        <td><?php echo formatDate($row['date']);  ?></td>

      </tr>

    <?php  endwhile; ?>

    <?php  

      else:
        
          echo "No Posts to show.";

        endif;

    ?>


      
    </table>

    <table class="table table-hover">

      <tr class="info">

        <th>Category ID #</th>
        <th>Category Name</th>
        

      </tr>

      <?php if($categories):  ?>

      <?php while ($row=$categories->fetch_assoc()):  ?>

      <tr>
      
        <td><?php echo $row['id'];  ?></td>
        <td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name'];  ?></a></td>
        

      </tr>

      <?php  endwhile; ?>

    <?php  

      else:
        
          echo "No categories to show.";

        endif;

    ?>



      
    </table>

  </div>




<?php include ("includes/footer.php"); ?>