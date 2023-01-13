<?php

namespace App\Controllers;
use App\Controllers\Valide;

class Auth
{
  public static function register($data)
  {
    $login           = $data["username"];
    $password        = $data["password"];
    $salt            = self::generateSalt();
    $confirmPassword = $data["confirm_password"];
    $email           = $data["email"];
    $fullName        = $data["full_name"];
    $today           = date('Y-m-d H:i:s');

    Valide::Login($login, $email);
    Valide::Password($password, $confirmPassword);
    Valide::Email($email);
    Valide::Name($fullName);
    Valide::Header();

    $newUser = [
      "login" => $login,
      "email" => $email,
      "password_hash" => md5($salt . $password),
      "salt" => $salt,
      "name" => $fullName,
      "created_at" => $today,
    ];

    self::addUser($newUser);
  }

  public static function addUser($dataUser)
  {
    $pathToDb = 'app/userDb/db.json';

    $user = "";
    foreach($dataUser as $k => $v){
      $user .= "    \"{$k}\":\"{$v}\",\n";
    }
    $user = substr($user,0,-2);

    $payload = file_exists($pathToDb) ? 
      ",\n  {\n".$user."\n  }\n]":
      "[  {".$user."\n  }\n]";
    $fileHandler = fopen($pathToDb, "c");
    fseek($fileHandler, -1, SEEK_END);
    fwrite($fileHandler, $payload);
    fclose($fileHandler);
    
    header("Location: /login");
  }

	public static function generateSalt()
	{
		$salt = '';
		$saltLength = 8;
		
		for($i = 0; $i < $saltLength; $i++) {
			$salt .= chr(mt_rand(33, 126));
		}
		
		return $salt;
	}
}