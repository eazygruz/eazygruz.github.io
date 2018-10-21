<?php
class DFCms_Pagination
{
    protected $_currPage;
    protected $_range;
    protected $_countPages;
    protected $_pages;

    public function __construct($currPage, $countPages, $range, $paginationType = 'Standart')
    {
        $temp =
        $this->setCurrPage($currPage)->setRange($range)->setCountPages($countPages)->{'getPagesStandart'}();
        print_r((array) $this);
    }

    public function getPagesStandart()
    {
        $arr = array();
        $arr[] = $this->getCurrPage();
        for($i = 0; $i < $this->getRange(); $i++)
        {
            if($this->getCurrPage() - ($i+1) >= 1)
            {
                $arr = array_merge(array($this->getCurrPage() - ($i+1)), $arr) ;
            }
            else
            {
                break;
            }
        }
        $countArray = count($arr);
        for($i = 0; $i < ($this->getRange() * 2 + 1 - $countArray); $i++)
        {
            if((end($arr) + 1) > $this->getCountPages())
            {
                if((reset($arr) - 1) > 0)
                {
                    $arr = array_merge(array(reset($arr) - 1), $arr);
                }
                else
                {
                    break;
                }
            }
            else
            {
                $arr[] = end($arr) + 1;
            }
        }
        $this->setPages($arr);
        return $this;

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
