<?php
/**
 * Application class
 *
 * @package  Soba - PHP Framework
 * @author   Nicholas Valbusa <squallstar@gmail.com>
 */

namespace Soba;

class Application
{
  // Singleton
  private static $_instance;

  // Soba Router
  private $_router;

  public function __construct()
  {
    self::$_instance =& $this;
  }

  /*
   * Gets back the app instance
   */
  public static function &instance()
  {
    return self::$_instance;
  }

  /*
   * Starts the boot process
   */
  public function boot()
  {
    // 1. Routes the app
    $this->router = new \Soba\Router;
    $this->router->run();
  }
}