<?php 
use App\Services\Page;
Page::part("head");

if ($_SESSION){
  Page::part("header");
  Page::part("articles1");
} else{
  Page::part("not_authorized");
}

Page::part("footer");
?>