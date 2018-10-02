<?php
require_once 'services/Token.php';

  session_start();

  if(isset($_POST['content'], $_POST['token'])) {
    $content = $_POST['content'];
    $token = $_POST['token'];
    
    if(!empty($content) && !empty($token)) {
        if (Token::validate($_POST['token'], session_id())) {
          header('Location: success.html');
        } else {
          header('Location: denied.html');
        }
    }
}
  
?>
<html>
<head>
  <title>CSRF Protection</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
  <h3>HOME</h3>
  <form method="POST" action="">
    <input type="text" name="content" placeholder="Type Name"><br/><br/>
    <input type="hidden" name="token" value="<?php Token::returnCsrfToken(session_id()) ?>"><br/>
    <input type="submit" value="UPDATE">
  </form>

</body>
</html>
