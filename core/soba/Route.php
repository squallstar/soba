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
  private $_method;

  // E.g. 'users/:id'
  private $_route;

  // Callback
  private $_callback;

  public function __construct($method = 'GET', $route, $callback)
  {
    $this->_method = $method;
    $this->_route = $route;
    $this->_callback = $callback;
  }

  public static function get($route, $callback)
  {
    $route = new \Soba\Route('GET', $route, $callback);
    \Soba\Application::instance()->router->addRoute($route);
  }
}