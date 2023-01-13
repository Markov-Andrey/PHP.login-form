<?php 
use App\Services\Page;
Page::part("head");

if ($_SESSION){
  Page::part("header");
  Page::part("home");
} else{
  Page::part("not_authorized");
}

Page::part("footer");
?>