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

  private $_method;

  public function __construct()
  {
    parent::__construct();

    $this->_method = strtoupper($_SERVER['REQUEST_METHOD']);
  }

  /*
   * Adds a route to the router
   */
  public function add_route($route)
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

  public function is_current_route($route)
  {
    // First of all, check the route HTTP method
    if ($route->method != $this->_method) return FALSE;

    // Second, replace route variables with Regexps
    if (strpos($route->route, ':') !== -1)
    {
      preg_match(':([^:/]+', $route->route, $matches);
      if ($matches)
      {

      }
    }
  }

  /*
   * Runs the router with the current request
   */
  public function run()
  {
    foreach ($this->routes() as $route)
    {
      if ($this->is_current_route($route))
      {
        var_dump($route);
      }
    }
  }
}