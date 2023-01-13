<?php

namespace App\Controllers;
use App\UserDb\OpenDb;

class Valide
{
  public static $strError = "Location:/register?";

  public static function Login($login, $email)
  {
    $users = OpenDb::Json();

    //unique login
    foreach ($users as $user){
      if ($user->login === $login){
        self::$strError .= "login1=nul&";
        break;
      }
    }

    //valide min 6 symbols
    if (strlen($login) < 6){
      self::$strError .= "login2=min6&";
    }
  }

  public static function Password($pass,$confPass)
  {
    //valide min 6 symbols
    if (strlen($pass) < 6){
      self::$strError .= "pass1=min6&";
    }
    
    //valide number & symbols
    
    $pattern = '/(?=.*\d)[a-zA-Z\d]{0,25}/';
    if (preg_match($pattern, $pass) == false){
      self::$strError .= "pass2=ns&";
    }

    //password match
    if ($pass !== $confPass){
      self::$strError .= "pass3=not&";
    }
  }

  public static function Email($email)
  {
    $users = OpenDb::Json();
    
    //valide email php-fuction
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false){
      self::$strError .= "email2=not&";
    }

    //unique email
    foreach ($users as $user){
      if ($user->email === $email){
        self::$strError .= "email1=nul&";
        break;
      }
    }
  }

  public static function Name($name)
  {
    //valide min 2 symbols
    if (strlen($name) < 2){
      self::$strError .= "name1=min2&";
    }

    //valide symbols
    $pattern = '/^[A-zА-яЁё]+$/';
    if (preg_match($pattern, $name) == false){
      self::$strError .= "name2=not&";
    }
  }

  public static function Header()
  {
    if(strlen(self::$strError) > 19){
      header(self::$strError);
      die();
    }
  }
}

?>