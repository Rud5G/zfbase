<?php
/**
 * @author [rg] r.gravestein <rudgergravestein@gmail.com>, 28 jan. 2011
 */
class ZFPlugins_Application_Resource_Cache extends Zend_Application_Resource_ResourceAbstract
{
    /**
     * (non-PHPdoc)
     * @see Zend_Application_Resource_Resource::init()
     * @return Zend_Cache_Core
     */
    public function init ()
    {
        $options = $this->getOptions();
        // Zend_Cache_Core object
        $cache = Zend_Cache::factory($options['frontEnd'], $options['backEnd'], $options['frontEndOptions'], $options['backEndOptions']);
        Zend_Registry::set('cache', $cache);
        
        return $cache;
    }
}
