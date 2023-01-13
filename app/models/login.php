<?php
session_start();
class searchDB
{
  private function Json()
  {
    $pathToDb = '../userDb/db.json';
    if(is_file($pathToDb)){
      $user = file_get_contents($pathToDb);
      $json = json_decode($user);
    } else {
      die ("Fatal error! Database path not found.");
    }
    

    return $json;
  }

  public function Login()
  {
    $this->login = $_POST['login'];
    $this->password = $_POST['password'];
    $currentUser = null;

    foreach (self::Json() as $user){
      if ($user->login == $this->login){
        $this->currentUser = $user;
        }
      }

    $passCheck = md5($this->currentUser->salt.$this->password);

    if($this->currentUser->password_hash !== $passCheck){
      echo json_encode(array('success' => 2));
      die();
    }

    if ($this->currentUser){
      echo json_encode(array('success' => 1));
      setcookie("user", $this->currentUser->name, time()+3600);
      $_SESSION['user'] = [
        "login" => $this->currentUser->login,
        "email" => $this->currentUser->email,
        "name"  => $this->currentUser->name,
      ];
    } else {
      echo json_encode(array('success' => 0));
    }
  }

}
$search = new searchDB;
$search->Login();

?>