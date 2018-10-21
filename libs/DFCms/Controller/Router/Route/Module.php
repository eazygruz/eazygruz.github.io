<?php
class DFCms_Controller_Router_Route_Module extends  Zend_Controller_Router_Route_Module
{
    protected $_separator = self::URI_DELIMITER;
    protected $_parameterKey = 'param';
    protected $_defaultAction = 'index';
    protected $_defaultController = 'index';
//    protected $_siteAreaKey = 'area';
//    protected $_multiLanguage;
//    protected $_languageKey = 'language';
//    protected $_defaultWebPageFileTypes;
    protected $_webPageFileType;
//    protected $_accesors;
//    protected $_siteLanguage;

    public function __construct( $request, $params = array())
    {
        if(isset($params['linkPartSeparator']))
        {
            $this->setSeparator($params['linkPartSeparator']);
        }
        if(isset($params['webPageFileType']))
        {
            $this->setWebPageFileType($params['webPageFileType']);
        }
        parent::__construct(array(), null, $request);
    }

    public function match($path)
    {
        $values = array();

        $values[$this->getActionKey()] = $this->getDefaultAction();
        $values[$this->getControllerKey()] = $this->getDefaultController();

            if($this->getWebPageFileType())
            {
                $path = preg_replace('/'.preg_quote($this->getWebPageFileType()).'$/si', '', $path);
            }
            $path = explode($this->getSeparator(), $path);
            if (count($path) && !empty($path[0])) {
                $values[$this->getControllerKey()] = array_shift($path);
            }
            if (count($path) && !empty($path[0])) {
                $values[$this->getActionKey()] = array_shift($path);
            }
            if (count($path) && !empty($path[0])) {
                foreach($path as $key => $val)
                {
                    $values[$this->getParameterKey().($key + 1)] = $val;
                }
            }
        return $values;

    }


    public function assemble($data = array(), $reset = false, $encode = true, $partial = false)
    {
        $params = array();
        echo $this->_controllerKey;
        $params[$this->_controllerKey] = ($data[$this->_controllerKey]) ? $data[$this->_controllerKey] : $this->getDefaultController() ;
        $params[$this->_actionKey] = ($data[$this->_actionKey]) ? $data[$this->_actionKey] : $this->getDefaultAction() ;
//        echo $this->getDefaultActionKey();
//        echo 'assemble<br>';
        print_r($params);
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
