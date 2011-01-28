<?php
/**
 * 
 * @example
 * add to the /application/config/application.ini:
 * [APPLICATION_ENV]
 * pluginPaths.My_Resource = APPLICATION_PATH "/resources"
 * resources.foo[] = "value"
 * ; or
 * resources.foo.key = "value"
 * 
 * Access the ExamplePlugin
 *  * from ActionController 
 *  - $bootstrap = $this->getInvokeArg('bootstrap');
 *  - $examplePlugin = $bootstrap->getResource('ExamplePlugin');
 *  
 *  * from BootstrapResource
 *  - $bootstrap = $this->getBootstrap();
 *  - $bootstrap->init('ExamplePlugin');
 *  - $examplePlugin = $bootstrap->getResource('ExamplePlugin');
 *  
 *  * Statically
 *  - $front = Zend_Controller_Front::getInstance();
 *  - $bootstrap = $front->getParam('bootstrap');
 *  - $examplePlugin = $bootstrap->getResource('ExamplePlugin');
 * 
 * @author [rg] r.gravestein <rudgergravestein@gmail.com>, 28 jan. 2011
 *
 */
class ZFPlugins_Application_Resource_ExamplePlugin extends Zend_Application_Resource_ResourceAbstract
{
    /**
     * (non-PHPdoc)
     * @see Zend_Application_Resource_Resource::init()
     */
    public function init ()
    {
        $bootstrap = $this->getBootstrap();
        $layout = $bootstrap->getResource('layout');
        $view = $layout->getView();
        
        $config = Zend_Registry::get('config');
        $view->config = $config;
        
        $foo = new self();
        return $foo;
        
    }
}