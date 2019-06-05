<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../vendor/chepew23/symfony1/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{

  static protected $zendLoaded = false;
 
  static public function registerZend()
  {
    if (self::$zendLoaded)
    {
      return;
    }
 
    set_include_path(sfConfig::get('sf_lib_dir').'/vendor'.PATH_SEPARATOR.get_include_path());
    require_once sfConfig::get('sf_lib_dir').'/vendor/Zend/Loader/Autoloader.php';
    Zend_Loader_Autoloader::getInstance();
    self::$zendLoaded = true;
  }
  
  public function setup()
  {
    //$this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins(array(
      'sfDoctrinePlugin', 
      'sfDoctrineGuardPlugin'
    ));
  }
}
