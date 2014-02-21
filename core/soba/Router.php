<?php
/**
 * Router class
 *
 * @package  Soba - PHP Framework
 * @author   Nicholas Valbusa <squallstar@gmail.com>
 */

namespace Soba;

class Router
{
  private $_routes;

  /*
   * Adds a route to the router
   */
  public function addRoute($route)
  {
    $this->_routes[] = $route;
  }

  /*
   * Gets the available routes
   */
  public function routes()
  {
    if (!$this->_routes)
    {
      $this->_routes = array();
      require BASE_PATH . 'config/routes.php';
    }

    return $this->_routes;
  }

  /*
   * Runs the router with the current request
   */
  public function run()
  {
    foreach ($this->routes() as $route)
    {
      var_dump($route);
    }
  }
}