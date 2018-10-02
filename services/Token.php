<?php
print_r($_REQUEST);
class Token {
  public static function generate($sessionid) {
    $TokenFile = fopen("Tokens.txt", "w") or die("Error in opening Tokens.txt file!");
    // unset($tkn);
    $csrfTkn = (base64_encode(openssl_random_pseudo_bytes(32))).",".$sessionid;
    fwrite($TokenFile, $csrfTkn);
    fclose($TokenFile);
  }

  public static function returnCsrfToken($sessionid) {
    $TokenFile = fopen("Tokens.txt", "r") or die("Unable to open file!");
		list($token,$sessionId) = explode(",",chop(fgets($TokenFile)),2);
    fclose($TokenFile);
    if($sessionid == $sessionId ){
      echo($token);
    }
  }

  public static function validate($Ctoken, $session) {
    $TokenFile = fopen("Tokens.txt", "r") or die("Unable to open file!");
		list($token,$sessionId) = explode(",",chop(fgets($TokenFile)),2);
		fclose($TokenFile);
		if($Ctoken == $token){
			if($session == $sessionId ){
				return true;
			}
		}
  }

}

