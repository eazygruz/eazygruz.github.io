<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Администратор
 * Date: 04.10.13
 * Time: 10:04
 * To change this template use File | Settings | File Templates.
 */

class DFCms_ControllerFront extends Zend_Controller_Front
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

}




?>