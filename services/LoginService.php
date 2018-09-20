<?php
class LoginService {
  public static function login($username, $password) {
    if($username=="sliit" && $password == "123") {
      return true;
    } else {
      return false;
    }
  }
}