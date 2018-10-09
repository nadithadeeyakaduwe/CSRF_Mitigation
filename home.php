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

  <div class="card bg-light text-center border-primary align-middle" style=" width: 500px; margin: auto; margin-top: 50px">
  <h5 class="card-header">Update Status</h5>
  <div class="card-body">
  <form method="POST" action="">
    <textarea class="text-center" type="textarea" name="content" placeholder="Status" style="height: 250px; width: 450px;"></textarea><br/><br/>
    <input type="hidden" name="token" value="<?php Token::returnCsrfToken(session_id()) ?>"><br/>
    <input class="btn btn-primary" type="submit" value="UPDATE">
  </form>
  </div>
  <div class="card-footer text-muted">
   <p><em><small>IT15014078 | Synchronized token pattern | SSD</small></em></p>
    
  </div>

</div>

</body>
</html>
