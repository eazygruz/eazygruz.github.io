<?php
/**
 * Created by PhpStorm.
 * User: Roma
 * Date: 10/26/2014
 * Time: 2:58 PM
 */

class RG_Request_Request {

    protected $_controller = false;
    protected $_params = array();

    function __construct()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        if($_GET)
            $requestUri = substr($requestUri, 0, mb_stripos($requestUri, '?'));

        if($requestUri == '/')
        {
           $this->setController('main');
        }
        else
        {
            $parampArr = explode('/', $requestUri) ;

            unset($parampArr[0]);

            $i = 0;
            foreach($parampArr as $val)
            {
                if($i == 0)
                {
                    $this->setController($val);
                }
                else
                {
                   $this->_params['param' . $i] = $val;
                }
                $i++;
            }
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
    }

} 