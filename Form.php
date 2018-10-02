<?php
require_once 'services/Token.php';
require_once 'services/LoginService.php';

if(isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(!empty($username) && !empty($password)) {
        if (LoginService::login($_POST['username'], $_POST['password'])) {
          session_start();
          setcookie("CSRFsessionID",session_id());
          Token:: generate(session_id());
          header('Location: home.php');
        } else {
          echo("log in Failed <br/>");
        }
    }
}
?>

<html>
<head>
  <title>CSRF Protection</title>
</head>

<body>
  <h3>Login Service for IT15014078</h3>
  <p>Use "sliit" as username and "123" as password</p>
  <form method="POST" action="">
    <input type="text" name="username" placeholder="Username"><br/><br/>
    <input type="password" name="password" placeholder="Passsword"><br/>
    <button type="submit">Login</button>
  </form>

</body>
</html>