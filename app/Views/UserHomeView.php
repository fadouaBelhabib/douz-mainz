<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Home | Check24Blog </title>
   </head>
<body>
  <div class="wrapper">
    <h2>Welcome <?php echo $_SESSION['userName']?> !</h2>
    <a href='/profil'>My profile</a> - <a href='/myposts'>My posts</a> - <a href='/allposts'>All posts</a> - <a href='/logout'>Logout</a>
  </div>
</body>
</html>