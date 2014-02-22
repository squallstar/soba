<?php
/**
 * Router class
 *
 * @package  Soba - PHP Framework
 * @author   Nicholas Valbusa <squallstar@gmail.com>
 */

namespace Soba;

class Route
{
  // HTTP method: GET/POST/PATCH/DELETE/
  public $method;

  // E.g. 'users/:id'
  public $route;

  // Callback
  public $callback;

  public function __construct($method = 'GET', $route, $callback)
  {
    $this->method = strtoupper($method);
    $this->route = $route;
    $this->callback = $callback;
  }

  public static function get($route, $callback)
  {
    $route = new \Soba\Route('GET', $route, $callback);
    \Soba\Application::instance()->router->add_route($route);
  }
}