<?php
if(Token::validate($_POST['token'])) {
  echo('Validation is Successful!!! <br/>');
} else {
  echo('Validation is not Successful!!! ERROR!!! <br/>');
}
?>

<html>
<head>
  <title>CSRF Protection</title>
</head>

<body>
  <h3>HOME</h3>
  <form method="POST" action="  ">
    <h3>verified!!!</h3>
  </form>

</body>
</html>