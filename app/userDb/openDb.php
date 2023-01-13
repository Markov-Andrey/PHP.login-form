<?php

namespace App\UserDb;

class OpenDb
{
  private function __construct()
  {}
  private function __clone()
  {}
  private function __wakeup()
  {}

  public static function Json()
  {
    $pathToDb = 'app/userDb/db.json';
    if(is_file($pathToDb)){
      $user = file_get_contents($pathToDb);
      $json = json_decode($user);
    } else {
      die ("Fatal error! Database path not found.");
    }
    

    return $json;
  }
}

?>