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

  private $_request_uri;

  public function __construct()
  {
    $this->_method = strtoupper($_SERVER['REQUEST_METHOD']);
    $this->_request_uri = $_SERVER['REQUEST_URI'];
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

  /*
   * Checks whether the given route is the current one
   */
  public function is_current_route($route)
  {
    // First of all, check the route HTTP method
    if ($route->method != $this->_method) return FALSE;

    $route = ltrim($route->route, '/');

    // Second, replace route variables with Regexps
    if (strpos($route, ':') !== -1)
    {
      preg_match('(:[A-z_]+)', $route, $matches);
      if ($matches)
      {
        foreach ($matches as $match)
        {
          $route = str_replace($match, '([^/]+)', $route);
        }
      }
    }

    return preg_match('/' . $route, $this->_request_uri) ? true : false
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