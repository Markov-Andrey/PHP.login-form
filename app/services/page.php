<?php

namespace App\Services;

class Page
{
  private function __construct()
  {}

  public static function part($partName)
  {
    require_once "views/components/". $partName . ".php";
  }

  public static function errors($codeError)
  {
    echo "<div class='error'>{$codeError}</div>";
  }
}