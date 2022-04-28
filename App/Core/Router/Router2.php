<?php
namespace App\Core\Router;

class Router2
{
  private $pages = array();

  function addRoute($url, $path){
    $this->pages[$url] = $path;
 }
  function route($url){
    $path = $this->pages[$url];
    $file_dir = "pages/".$path;
    }
}
