<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
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
      
    //$this->setWebDir($this->getRootDir()); // Se coloca para arreglar el problema de publicaciones de plugins
    
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfThumbnailPlugin');
    $this->enablePlugins('sfDependentSelectPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfTCPDFPlugin');
    
  }
  
  
  public function configureDoctrine(Doctrine_Manager $manager)
    {
        //$manager->setAttribute(Doctrine::ATTR_QUERY_CACHE, new Doctrine_Cache_Apc());
    }


}
