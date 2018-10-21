<?php

class DFCms_app_NewsList
{
    protected $_select;
    protected $_SQL_TABLE;
    protected $arhiveFlag = false;
    protected $_allNewsFlag = false;
    protected $paging = false;
    protected $_countPages;
    protected $_countNews;
    protected $_currPage;
    protected $_onPage;
    protected $_mainInBlock = null;
//    protected $_pagination = array();

    public function __construct()
    {
        $this->_SQL_TABLE = (object) Zend_Registry::get('_SQL_TABLE');
        $this->_select = DFCms_Db_Select::factory()
            ->from(array('n' => $this->_SQL_TABLE->news))
            ->join(array('a' => $this->_SQL_TABLE->author), 'n.author_id = a.author_id')
            ->where('n.p_date < ?', time())
            ->where('a.active = 1');
    }

    public function getArhiveArray()
    {
        $arr = $this
            ->getSelect()
            ->reset(Zend_Db_Select::COLUMNS)
            ->columns(array(
                new Zend_Db_Expr('FROM_UNIXTIME(n.p_date, "%Y") AS year'),
                new Zend_Db_Expr('FROM_UNIXTIME(n.p_date, "%m") AS month'),
                'n.news_id'
            ))
            ->where('n.a_date < ?', time())
            ->group('year')
            ->group('month')
            ->fetchAll();

        $result = array();
        foreach($arr as $val)
        {
            $result[$val['year']][] = $val['month'];
        }
        foreach($result as $key => $val)
            $result[$key] = array_reverse($result[$key]);
        return $result;
    }
    public  function getNewsByRubric(array $categories)
    {
        $this->_select
            ->joinInner(array('nr' => $this->_SQL_TABLE->news_rubric), 'nr.news_id = n.news_id', array())
            ->order('main_in_rubric DESC')
            ->where('rubric_id IN(?)', $categories);
        return $this;
    }

    public  function getNewsByKeyword(array $keyword)
    {
        $this->_select
            ->joinInner(array('nk' => $this->_SQL_TABLE->news_keyword), 'nk.news_id = n.news_id', array())
            ->where('keyword_id IN(?)', $keyword);
        return $this;
    }

    public function getNewsByDate($dateFrom, $dateTo = null)
    {
        $roundDateFrom = roundUnixTime($dateFrom);
        $this->getSelect()
            ->where('n.p_date <= ?', time())
            ->where('n.p_date >= ?', $roundDateFrom)
            ->where('n.p_date <= ?', ($dateTo) ?  roundUnixTime($dateTo) + 86400: roundUnixTime(time()) + 86400);
        return $this;

    }

    public function getNewsByAuthor($authorId)
    {
       $this->_select->where('n.author_id = ?', $authorId);
        return $this;
    }

    public function getNewsByBlock($blockId)
    {
        $this->getSelect()
            ->join(array('nfb' => $this->_SQL_TABLE->news_front_block), 'nfb.news_id=n.news_id')
            ->where('nfb.front_block_id = ?', $blockId);
        return $this;
    }

    public function fromArhive()
    {
        $this->arhiveFlag = true;
        return $this;
    }

    public function pagination($page = 1, $onPage = 10)
    {
        $this->paging = true;
        $this->_select->calcFoundRows()->limitPage($page, $onPage);
        $this->setCurrPage($page);
        $this->setOnPage($onPage);
        return $this;
    }

    public function getPagination()
    {
        return DFCms_Pagination_Standart::factory($this->getCurrPage(), $this->getCountPages(), 2);
    }

    public function fetchAll()
    {
        if($this->getAllNewsFlag() !== true)
        {
            if($this->arhiveFlag == true)
            {
                $this->_select->where('n.a_date < ?', time());
            }
            else
            {
                $this->_select->where('n.a_date > ?', time());
            }
        }
        if($this->getMainInBlock() == true)
        {
            $this->_select->order('n.main_in_block DESC');
        }
        $this->_select->where('n.active = 1');
        $this->_select->order('n.p_date DESC');
//        echo $this->_select->__toString();
        $result = $this->_select->fetchCol();
//        echo '(((((---' . $this->_select->__toString() . '---)))))))))';
        if(($this->paging == true) && (!empty($result)))
        {
            $this->setCountNews($this->_select->foundRows());
            $this->setCountPages(ceil($this->getCountNews() / $this->getOnPage()));
        }
        if(!empty($result))
        {
            return $result;
        }
        else
        {
            return null;
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
