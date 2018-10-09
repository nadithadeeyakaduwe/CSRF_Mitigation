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

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>

<body>
<div class="card text-center border-primary align-middle" style="width: 400px; margin: auto; margin-top: 75px">
<div class="card-header">
<h3>Synchronized Token Pattern</h3>
</div>
<div class="card-body">
  <div class="alert alert-secondary m-2" role="alert">
  Use "sliit" as username and "123" as password
</div>
  <form method="POST" action="">

    <div class="input-group p-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
  </div>
  <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>

<div class="input-group p-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
  </div>
  <input type="password" name="password" placeholder="Passsword" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>


    <button class="btn btn-primary" type="submit">Login</button>
  </form>

   <div class="card-footer text-muted">
   <p><em><small>IT15014078 | Assignment - 2 | SSD</small></em></p>
    
  </div>
  </div>
  </div>

</body>
</html>