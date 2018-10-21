<?php
class DFCms_Pagination_Standart extends DFCms_Pagination_Abstract
{
    static function factory($currPage, $countPages, $range)
    {
        $self = new self($currPage, $countPages, $range);
        return $self->getPaginationArray();
    }
    public function getPagesList()
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
}
