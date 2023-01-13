<?php

namespace App\UserDb;

class newUser
{
  private function __construct()
  {}
  private function __clone()
  {}
  private function __wakeup()
  {}

  //запись есть, остается привести ее в нужный вид и добавлять запись а не переписывать файл
  public static function addUser($dataUser)
  {
    $pathToDb = 'app/userDb/db.json';
    
    $payload = file_exists($pathToDb) ? ",{$dataUser}]" : "[{$dataUser}]"; 
    $fileHandler = fopen($pathToDb, "c");
    fseek($fileHandler, -1, SEEK_END);
    fwrite($fileHandler, $payload);
    fclose($fileHandler);
  }
}

?>