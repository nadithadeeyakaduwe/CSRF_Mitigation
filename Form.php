<?php
session_start();
require_once 'services/Token.php';
require_once 'services/LoginService.php';

if(isset($_POST['username'], $_POST['password'], $_POST['token'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(!empty($username) && !empty($password)) {
      if(Token::validate($_POST['token'])) {
        echo('Validation is Successful!!! <br/>');
        if (LoginService::login($_POST['username'], $_POST['password'])) {
          echo("User Successfully loged in <br/>");
        } else {
          echo("log in Failed <br/>");
        }
      } else {
        echo('Validation is not Successful!!! ERROR!!! <br/>');
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
  <form method="POST" action="  ">
    <input type="text" name="username" placeholder="Username"><br/><br/>
    <input type="password" name="password" placeholder="Passsword"><br/>
    <input type="hidden" name="token" value="<?php echo Token:: generate();?>"><br/>
    <button type="submit">Login</button>
  </form>

</body>
</html>