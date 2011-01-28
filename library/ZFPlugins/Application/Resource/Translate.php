<?php
/**
 * 
 * @author [rg] r.gravestein <rudgergravestein@gmail.com>, 28 jan. 2011
 *
 */
class ZFPlugins_Application_Resource_Translate extends Zend_Application_Resource_ResourceAbstract
{
    /**
     * (non-PHPdoc)
     * @see Zend_Application_Resource_Resource::init()
     * @return Zend_Translate
     */
    public function init ()
    {
        $options = $this->getOptions();
        $adapter = $options['adapter'];
        $defaultTranslation = $options['default']['file'];
        $defaultLocale = $options['default']['locale'];
        
        $translate = new Zend_Translate($adapter, $defaultTranslation, $defaultLocale);
        foreach ($options['translation'] as $locale => $translation) {
            $translate->addTranslation($translation, $locale);
        }
        Zend_Registry::set('Zend_Translate', $translate);
        
        return $translate;
    }
}
