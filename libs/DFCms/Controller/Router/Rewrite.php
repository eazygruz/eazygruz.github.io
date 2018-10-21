<?php
class DFCms_Controller_Router_Rewrite extends Zend_Controller_Router_Rewrite
{
    protected $_siteAreaKey = 'area';
    protected $_languageKey = 'language';
    protected $_config;

    public function __construct(array $params = array())
    {
        $this->setConfig(Zend_Registry::getInstance()->get('Config'));
        parent::__construct($params);
    }
    public function route(Zend_Controller_Request_Abstract $request)
    {
        $config = $this->getConfig();
        foreach(array('linkPartSeparator', 'SiteLanguage', 'EnableMultiLanguage') as $val)
        {
            if(!$config->$val)
            {
                throw new DFCms_Controller_Router_Exception(' Unknown config variable ' . $val);
            }
        }
        $uri = $request->getRequestUri();
        $uri = preg_replace('/'.preg_quote($config->webPageFileType).'$/si', '', $uri);
        $uriArray = explode($config->linkPartSeparator, substr($uri, 1));
        $currentLanguage = ($uri == '/' || $config->EnableMultiLanguage == 'n') ? $config->SiteLanguage : array_shift($uriArray);
        $this->_setRequestParams($request, array(
            $this->getLanguageKey() => $currentLanguage,
            $this->getSiteAreaKey() => 'front'
        ));
        $request->setRequestUri('/' . join(self::URI_DELIMITER, $uriArray));
        parent::route($request);
    }
    public function assemble($userParams, $name = null, $reset = false, $encode = true)
    {
        $uri = '';
        $uri .= ($this->getConfig()->EnableMultiLanguage == 'y') ? $this->getFrontController()->getRequest()->getParam($this->getLanguageKey()) . $this->getConfig()->linkPartSeparator : '' ;
        $uri .= str_replace(self::URI_DELIMITER, $this->getConfig()->linkPartSeparator, substr(parent::assemble($userParams, $name, $reset, $encode ), 1)) . $this->getConfig()->webPageFileType;
        return $uri;
    }

    public function __call($methodName, $args)
    {
        $methodPrefix = substr($methodName, 0, 3);
        if(in_array($methodPrefix, array('get', 'set')))
        {
            $propertyName = '_'.strtolower(substr($methodName, 3, 1)).substr($methodName, 4);
            if(property_exists($this, $propertyName))
            {
                switch($methodPrefix)
                {
                    case 'get':
                        return $this->$propertyName;
                    case 'set':
                        $this->$propertyName = $args[0];
                        return $this;
                }
            }
        }
        return parent::__call($methodName, $args);
    }
}
