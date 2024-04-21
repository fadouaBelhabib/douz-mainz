<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Update my infos | Check24Blog </title>
    <link rel="stylesheet" href="style.css">
   </head>
<body>
  <div class="wrapper">
    <h2>Update User</h2>
    <form action="/UpdateUser" method="POST">
      <div class="input-box">
        <input name="name" type="text" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <input name="password" type="password" placeholder="Create password" required>
      </div>
      <div class="input-box">
        <input name="confirmpassword" type="password" placeholder="Confirm password" required>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Update">
        <input type="reset" value="Reset">
      </div>
    </form>
  </div>

</body>
</html>
