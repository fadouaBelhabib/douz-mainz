<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update Post | Check24Blog </title>
    <link rel="stylesheet" href="style.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Update Post</h2>
    <form action="/UpdatePost" method="POST">
      <div class="input-box">
        <input name="title" type="text" placeholder="Enter the title" required>
      </div>
      <div class="input-box">
        <input name="content" type="text" placeholder="Enter the content of post" required>
      </div>
      <div class="input-box">
        <input name="tag" type="integer" placeholder="Enter tag of post" required>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Add post">
        <input type="reset" value="Reset">
      </div>
    </form>
  </div>

</body>
</html>
