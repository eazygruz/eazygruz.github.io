<?php
class DFCms_Controller_Router_Route_Module extends  Zend_Controller_Router_Route_Module
{
    protected $_separator = self::URI_DELIMITER;
    protected $_parameterKey = 'param';
    protected $_siteAreaKey = 'area';
    protected $_multiLanguage;
    protected $_languageKey = 'language';
    protected $_defaultWebPageFileTypes;
    protected $_webPageFileType;
    protected $_accesors;
    protected $_siteLanguage;

    public function __construct( $request, $params = array())
    {
        if(isset($params['linkPartSeparator']))
        {
            $this->setSeparator($params['linkPartSeparator']);
        }
        if(isset($params['EnableMultiLanguage']))
        {
            $this->setMultiLanguage($params['EnableMultiLanguage']);
        }
        if(isset($params['defaultWebPageFileTypes']))
        {
            $this->setDefaultWebPageFileTypes($params['defaultWebPageFileTypes']);
        }
        if(isset($params['webPageFileType']))
        {
            $this->setWebPageFileType($params['webPageFileType']);
        }
        if(isset($params['accesors']))
        {
            $this->setAccesors($params['accesors']);
        }
        if(isset($params['languageKey']))
        {
            $this->setLanguageKey($params['languageKey']);
        }
        if(isset($params['siteLanguage']))
        {
            $this->setSiteLanguage($params['siteLanguage']);
        }
        else
        {
            throw new DFCms_Controller_Router_Route_Exception('Unknown site language');
        }
        parent::__construct(array(), null, $request);
    }

    public function match($path)
    {
        $values = array();

        $values[$this->getActionKey()] = 'index';
        $values[$this->getControllerKey()] = 'index';

        $values[$this->getLanguageKey()] = $this->getSiteLanguage();
        foreach($this->getAccesors() as $key => $val)
        {
            if(preg_match('/^(\/'.$val.')/si', $path, $mathes))
            {
                $values[$this->getSiteAreaKey()] = $key;
                $path = explode('/', substr($path, 1));
                if (count($path) && !empty($path[0]))
                {
                   $values[$this->getControllerKey()] = preg_replace('/\.php$/si', '', $path[1]);
                }
                foreach($this->_request->getParams() as $key => $val)
                {
                    $values[$key] = $val;
                }
            }
        }
        if(!array_key_exists($this->getSiteAreaKey(), $values))
        {
            $values[$this->getSiteAreaKey()] = 'front';

            if($this->getDefaultWebPageFileTypes())
            {
                $pregMath = '/('.str_replace(',','|', preg_quote($this->getDefaultWebPageFileTypes())).')$/si';
                if(preg_match($pregMath, $path, $mathes))
                {
                    $path = preg_replace($pregMath, $this->getWebPageFileType(), $path);
                }
            }
            if($this->getWebPageFileType())
            {
                $path = preg_replace('/'.preg_quote($this->getWebPageFileType()).'$/si', '', $path);
            }

            $path = explode($this->getSeparator(), substr($path, 1));


            if (count($path) && !empty($path[0]) && ($this->getMultiLanguage() == 'y')) {
                array_shift($path);
            }

            if (count($path) && !empty($path[0])) {
                $values[$this->getControllerKey()] = array_shift($path);
            }
            else
            {
                $values[$this->getControllerKey()] = 'index';
            }

            if (count($path) && !empty($path[0])) {
                $values[$this->getActionKey()] = array_shift($path);
            }
            else
            {
                $values[$this->getActionKey()] = 'index';
            }

            if (count($path) && !empty($path[0])) {
                foreach($path as $key => $val)
                {
                    $values[$this->getParameterKey().($key + 1)] = $val;
                }
            }
        }
        return $values;

    }

    public function assemble($data = array(), $reset = false, $encode = false)
    {
        $url = array();
        $params = $this->_request->getUserParams();
//        print_r($params);
        if($params[$this->getSiteAreaKey()] == 'front')
        {
            if($params[$this->getControllerKey()] == 'index')
            {
               return '/';
            }
            else
            {
                $url[] = $params[$this->getControllerKey()];
                $url[] = $params[$this->getActionKey()];
                foreach($params as $key => $val)
                {
                    if(preg_match('/^'.$this->getParameterKey().'/si', $key, $matches))
                    {
                        $url[] = $val;
                    }
                }
                return '/'.join($this->getSeparator(),$url).$this->getWebPageFileType();
            }
        }
        else
        {

        }
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
