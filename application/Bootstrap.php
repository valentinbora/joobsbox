<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'Joobsbox',
            'basePath'  => dirname(__FILE__),
        ));
        
        $autoloader->addResourceType('exception', 'exceptions', 'Exception');
        
        return $autoloader;
    }
    
    // public function _initDoctrine()
    //     {
    //         require_once 'Doctrine.php';        
    //         $loader = Zend_Loader_Autoloader::getInstance();
    //         $loader->pushAutoloader(array('Doctrine', 'autoload'));
    // 
    //         $doctrineConfig = $this->getOption('doctrine');
    //         
    //         $manager = Doctrine_Manager::getInstance();
    //         $manager->setAttribute(Doctrine::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
    //         $manager->setAttribute(Doctrine::ATTR_QUOTE_IDENTIFIER, true);
    //         $manager->setAttribute(Doctrine::ATTR_AUTOLOAD_TABLE_CLASSES, true);
    //         
    //         Doctrine_Core::loadModels($doctrineConfig['models_path'] . '/generated');
    //         Doctrine_Core::loadModels($doctrineConfig['models_path']);
    //         
    //         $conn = Doctrine_Manager::connection($doctrineConfig['connection_string'], 'doctrine');
    // 
    //         return $manager;
    //     }
    
    /**
     * Bootstrap the view doctype
     * 
     * @return void
     */
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_TRANSITIONAL');
    }
    
    protected function _initTranslate()
    {
        $config = new Zend_Config_Xml(ROOT_PATH . '/config/config.xml');
        $resource = new Zend_Application_Resource_Translate(array(
            'adapter' => 'gettext',
            'locale'  => $config->locale,
			'data'    => ROOT_PATH . "/data/locales/{$config->locale}/",
			'options' => array('disableNotices' => true)
		));
        
        $resource->setBootstrap($this);
        
        return $resource->init();
    }
    
    protected function _initRouter()
    {
        $front = $front = Zend_Controller_Front::getInstance();   
        $router = $front->getRouter();
    }
}

