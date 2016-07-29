<?php include("config/config.php"); ?>

<?php include("libraries/Database.php"); ?>

<?php include("helpers/format_helper.php"); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap Blog Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/blog.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="blog-masthead">
      
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Home</a>
          <a class="blog-nav-item" href="posts.php">All Posts</a>
        </nav>
      </div>

    </div>

    <div class="container">

      <div class="blog-header">
        <div class="logo">
          <img height= 140px width= 140px src="images/logo.png">
        </div>
        <h1 class="blog-title">Blog Application</h1>
        <p class="lead blog-description">A PHP Blog. For you. With you. Always.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">