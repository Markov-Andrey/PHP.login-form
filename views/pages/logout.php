<?php 
use App\Services\Page;
Page::part("head");

session_start();
session_destroy();
header("Location:/");

?>