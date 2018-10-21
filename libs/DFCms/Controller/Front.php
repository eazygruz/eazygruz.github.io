<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Администратор
 * Date: 04.10.13
 * Time: 10:04
 * To change this template use File | Settings | File Templates.
 */

class DFCms_Controller_Front extends Zend_Controller_Front
{

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function getResponse()
    {
        if (is_null($this->_response))
        {
            $this->_response = new Zend_Controller_Response_Http();
        }

        return $this->_response;
    }
    public function getRequest($uri)
    {
        if (is_null($this->_request))
        {
            $this->setRequest(new Zend_Controller_Request_Http($uri));
        }

        return $this->_request;
    }
    public function getRouter()
    {
        if (is_null($this->_router))
        {
            $this->setRouter(new DFCms_Controller_Router_Rewrite());
//            $this->setRouter(new Zend_Controller_Router_Rewrite());
        }

        return $this->_router;
    }
    public function getDispatcher()
    {
        if (!$this->_dispatcher instanceof Zend_Controller_Dispatcher_Interface) {
            $this->_dispatcher = new DFCms_Controller_Dispatcher_Standard();
        }
        return $this->_dispatcher;
    }

}
?>