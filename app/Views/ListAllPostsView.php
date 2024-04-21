<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> list of Post | Check24Blog </title>
    <link rel="stylesheet" href="style.css">
   </head>
<body>
  
    <div class="wrapper">
      <h2>List of Posts</h2>
      <?php 
        foreach($allPosts as $post) {
          echo '<b>'.$post->title . '</b><br>';
          echo $post->content . '<br>';
          echo $post->tag . '<br>';
          echo "<a href='/edit-post?id=".$post->id."'>Edit</a><br>";
          echo '<hr></hr>';
        }
      ?>
    </div>
</body>
</html>