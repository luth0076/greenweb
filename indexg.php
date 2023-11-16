<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/Login.css" />
    <title>Login Form</title>
  </head>
  <body style="background: url('assets/img/2.png');">
    <div class="login-container">
      <h2>Login</h2>
      <form action="controller/login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <button type="submit" name="login">Login</button>
      </form>
      <div class="login-as-student">
        <p>Login as <a href="index.php">Student</a></p>
      </div>
    </div>
  </body>
</html>
