<?php
session_start();
require_once 'services/Token.php';

if(isset($_POST['email'], $_POST['token'])) {
    $email = $_POST['email'];
    
    if(!empty($email)) {
      if(Token::validate($_POST['token'])) {
        echo('Validation Successful!!!');
      }
      
    }
}
?>

<html>
<head>
  <title>CSRF Protection</title>
</head>

<body>
  <p>Your new email address</p>
  <form method="POST" action="  ">
    <input type="text" name="email" placeholder="Change your email address">
    <input type="hidden" name="token" value="<?php echo Token:: generate();?>">
    <button type="submit">change</button>
  </form>

</body>
</html>