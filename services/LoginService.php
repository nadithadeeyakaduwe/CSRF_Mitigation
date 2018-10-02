<?php
class LoginService {
  public static function login($username, $password) {
    if($username=="sliit" && $password == "123") {
      echo(session_id());
      setcookie("sessionID", session_id());
      return true;
    } else {
      return false;
    }
  }
}