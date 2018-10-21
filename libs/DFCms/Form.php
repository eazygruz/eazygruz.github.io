<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Администратор
 * Date: 07.10.13
 * Time: 15:14
 * To change this template use File | Settings | File Templates.
 */


class DFCms_Form extends Zend_Form
{
    public function __construct($options = null)
    {
        parent::__construct($options);
        $this->setView(new Zend_View());

    }
}

?>