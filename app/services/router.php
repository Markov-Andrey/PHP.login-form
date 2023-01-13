<?php

namespace App\Services;

class Router
{
  private static $list = [];

  public static function page($uri, $page_name)
  {
    self::$list[] = [
      "uri" => $uri,
      "page" => $page_name
    ];
  }

  public static function post($uri, $class, $method)
  {
    self::$list[] = [
      "uri"    => $uri,
      "class"  => $class,
      "method" => $method,
      "post"   => true

    ];
  }

  public static function enable()
  {
    $query = $_GET['q'];
    
    foreach(self::$list as $route){

      if(($route['post'] === true) && ($_SERVER['REQUEST_METHOD'] == 'POST')){
        $action = new $route["class"];
        $method = $route["method"];
        $action->$method($_POST);
        die();
      }

      if($route['uri'] === '/'.$query){
        require_once "views/pages/" . $route['page'] . ".php";
        die();
      }
    }
    self::error(404); //потенциально можно создать и иные ошибки со своими страницами
    }

  private static function error($err) {
    require_once "views/errors/{$err}.php";
  }
}