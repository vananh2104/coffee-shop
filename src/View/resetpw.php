<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    .login-block {
      background: #f7f7f7;
      padding: 50px 0;
    }
    .login-sec {
      background: #fff;
      padding: 50px;
      border-radius: 5px;
      box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
    }
    .login-form {
      text-align: center;
    }
    .login-form p {
      text-align: left;
    }
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .login-form input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .login-form input[type="submit"] {
      background: #000;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    .copy-text {
      text-align: center;
      margin-top: 20px;
    }
    .copy-text a {
      color: #000;
      text-decoration: none;
    }
  </style>
</head>
<body>

<section class="login-block">
  <div class="container">
    <div class="row">
      <div class="col-md-4 login-sec">
        <form action="/login?action=forget&act=reset" class="login-form" method="post">
        <p>Enter Code </p>
          <input type="number" name='code' required>
          <p>Enter New password</p>
          <input type="password" name='password' required>
          <input type="submit" name="submit_password" value="Reset Password">
        </form>
        <div class="copy-text">Thecoffeehouse<i class="fa fa-heart"></i> <a href="/login?action=forget">Forgot Password ?</a></div>
      </div>
    </div>
  </div>
</section>

</body>
</html>
