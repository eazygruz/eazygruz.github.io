<?php
abstract class DFCms_Pagination_Abstract
{
    protected $_currPage;
    protected $_range;
    protected $_countPages;
    protected $_pages;

    public function __construct($currPage, $countPages, $range)
    {
            $this->setCurrPage($currPage)->setRange($range)->setCountPages($countPages)->getPagesList();
    }

    abstract function getPagesList();


    public function getPaginationArray()
    {
        $array = array();
        if($this->getCountPages() > 1)
        {
            $array['prevPage'] = ($this->getCurrPage() - 1 !== 0) ? $this->getCurrPage() - 1 : null;
            $array['curPage'] = $this->getCurrPage();
            $array['nextPage'] = ($this->getCurrPage() + 1 <= $this->getCountPages()) ? $this->getCurrPage() + 1 : null;
            $array['pages'] = $this->getPages();
            $array['lastPage'] = (end($this->getPages()) == $this->getCountPages()) ? null : $this->getCountPages();
            $array['firstPage'] = (reset($this->getPages()) == 1) ? null : 1;
        }

        return $array;

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
