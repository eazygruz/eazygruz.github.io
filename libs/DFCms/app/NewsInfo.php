<?php
class DFCms_app_NewsInfo
{
    protected $_SQL_TABLE;
    protected $_news;
    protected $_select;
    protected $_flang = null;
    protected $_rubricFlag;
    protected $_tagFlag;
    protected $_imageFlag;
    protected $_authorFlag = false;
    protected $_authorImageFlag = false;
    protected $_titleFlag = false;
    protected $_commentFlag = false;
    protected $_mainRubricFlag = false;
    protected $_mainBlockFlag = false;

    public function __construct($news)
    {
        $this->_SQL_TABLE = (object) Zend_Registry::get('_SQL_TABLE');
        $this->setNews($news);
        if($this->_flang == null)
        {
            $this->setFlang('_' . Zend_Registry::get('Config')->SiteLanguage);
        }
        $this->_select = DFCms_Db_Select::factory()
            ->from(array('n' => $this->_SQL_TABLE->news), array('news_id'))
            ->join(array('a' => $this->_SQL_TABLE->author), 'a.author_id = n.author_id', array())
            ->where('a.active = 1')
            ->where('n.news_id IN(?)', $news);

    }

    static function factory($news)
    {
        return new self($news);
    }

    public function getTitle()
    {
        $this->setTitleFlag(true);
//        echo $this->getSelect()->__toString() . '<br>';
        return $this;
    }

    public function getAutor()
    {
        $this->setAuthorFlag(true);
        return $this;
    }

    public function getComment()
    {
        $this->setCommentFlag(true);
        return $this;

    }

    public function getDescription()
    {
        $this->getTitle()->getAutor();
        $this->getSelect()->columns('ni.description' . $this->getFlang(). ' AS description');
        return $this;
    }
    public function getSmallDescription()
    {
        $this->getTitle()->getAutor();
        $this->getSelect()
            ->columns('ni.description_small' . $this->getFlang(). ' AS description')
            ->where('ni.description_small' . $this->getFlang(). ' IS NOT NULL');
        return $this;
    }

    public function getMeta()
    {
        $this->getSelect()
            ->joinLeft(array('nm' => $this->_SQL_TABLE->news_meta), 'n.news_id = nm.news_id', array(
                'meta_title' => 'meta_title' . $this->getFlang(),
                'meta_description' => 'meta_description' . $this->getFlang(),
                'meta_keywords' => 'meta_keywords' . $this->getFlang()
            ));
        return $this;
    }

    public function getBody()
    {
        $this->getTitle()->getMeta()->setTagFlag(true)->setRubricFlag(true)->setImageFlag(true)->getAutor()->getComment();
        $this->getSelect()
            ->joinLeft(array('nv' => $this->_SQL_TABLE->news_vote), 'nv.news_id=n.news_id', array())
            ->joinLeft(array('nvw' => $this->_SQL_TABLE->news_view), 'nvw.news_id=n.news_id', array())
            ->columns(array('ni.text' . $this->getFlang(). ' AS text', 'nv.y', 'nv.n', 'views' => 'nvw.count'));
        return $this;
    }

    public function getRssBody()
    {
        $this->getTitle();
        $this->getSelect()
            ->columns('ni.text' . $this->getFlang(). ' AS text');
        return $this;
    }

    public function fetchAll()
    {
        if($this->getAuthorFlag() === true)
        {
            $this->getSelect()
                ->join(array('ai' => $this->_SQL_TABLE->author_info), 'ai.author_id =n.author_id', array(
                    new Zend_Db_Expr(' CONCAT( ai.name' .$this->getFlang(). ', " ", ai.lastname' .$this->getFlang(). ') AS author'),
                    new Zend_Db_Expr(' CONCAT(ai.linkname, "-", ai.author_id) as author_link')
                ));
            if($this->getAuthorImageFlag() == true)
            {
                $this->getSelect()
                    ->joinLeft(array('aim' => $this->_SQL_TABLE->author_image), 'aim.author_id=n.author_id', array())
                    ->joinLeft(array('ii' => $this->_SQL_TABLE->image_info), 'ii.image_id=aim.image_id', array('authorImg' => 'ii.orig_path'))
                ;
            }
        }

        if($this->setTitleFlag() == true)
        {
            $this->getAutor()->getSelect()
                ->join(array('ni' => $this->_SQL_TABLE->news_info), 'ni.news_id = n.news_id', array())
                ->columns(array(
                    'ni.title' . $this->getFlang() . ' AS title',
                    new Zend_Db_Expr('CONCAT(FROM_UNIXTIME(p_date, "%Y-%m-%d"), "--", ni.linkname) AS news_link'),
                    'n.p_date',
                    'ni.linkname'
                ));
        }
       if($this->getMainRubricFlag() == true)
       {
           $this->getSelect()->order('n.main_in_rubric DESC');
       }

        if($this->getMainBlockFlag() == true)
        {
            $this->getSelect()->order('n.main_in_block DESC');
        }
        if($this->_news !== null)
        {
//            echo $this->getSelect()->order('n.p_date DESC')->__toString();
            foreach($this->getSelect()->order('n.p_date DESC')->fetchAll() as $val)
            {
                $result[$val['news_id']] = $val;
            }
        }
//        print_r($result);
        if(count($result) !== 0)
        {
            if($this->getCommentFlag() === true)
            {
                $commeNt = DFCms_Db_Select::factory()
                    ->from(array('nc' => $this->_SQL_TABLE->news_comment))
                    ->join(array('c' => $this->_SQL_TABLE->comment), 'c.comment_id=nc.comment_id')
                    ->join(array('ui' => $this->_SQL_TABLE->user_info), 'ui.user_id=c.user_id' , array(new Zend_Db_Expr('CONCAT(ui.name, " ", ui.lastname) as name')))
                    ->where('nc.news_id IN(?)', array_keys($result))
                    ->where('c.status=2')
                    ->order('date DESC')
                    ->fetchAll();
                foreach($commeNt as $val)
                {
                    $result[$val['news_id']]['comment'][] = $val;
                }
            }
            if($this->getImageFlag() === true)
            {
                $images = DFCms_Db_Select::factory()
                    ->from(array('n' => $this->_SQL_TABLE->news), array('ii.orig_path', 'n.news_id'))
                    ->join(array('ni' => $this->_SQL_TABLE->news_image), 'ni.news_id = n.news_id', array())
                    ->join(array('ii' => $this->_SQL_TABLE->image_info), 'ii.image_id = ni.image_id', array())
                    ->where('n.news_id IN(?)', array_keys($result))
                    ->fetchAll();
                foreach($images as $val)
                {
                    $result[$val['news_id']]['images'][] = $val['orig_path'];
                }
            }
            if($this->getRubricFlag() === true)
            {
                $rubrics = DFCms_Db_Select::factory()
                    ->from(array('n' => $this->_SQL_TABLE->news), array('n.news_id', 'ri.title' . $this->getFlang() . ' AS title', 'ri.rubric_id', 'ri.linkname'), array())
                    ->where('n.news_id IN(?)', $this->getNews())
                    ->joinInner(array('nr' => $this->_SQL_TABLE->news_rubric), 'n.news_id = nr.news_id', array())
                    ->joinInner(array('ri' => $this->_SQL_TABLE->rubric_info), 'nr.rubric_id = ri.rubric_id', array())
                    ->where('n.news_id IN(?)', array_keys($result))
                    ->fetchAll();
                foreach($rubrics as $val)
                {
                    $result[$val['news_id']]['rubric'][] = $val;
                }
            }
            if($this->getTagFlag() === true)
            {
                $tags = DFCms_Db_Select::factory()
                    ->from(array('n' => $this->_SQL_TABLE->news), array('n.news_id', 'ki.title' . $this->getFlang() . ' AS title', 'ki.keyword_id', 'ki.linkname'), array())
                    ->where('n.news_id IN(?)', array_keys($result))
                    ->joinInner(array('nk' => $this->_SQL_TABLE->news_keyword), 'nk.news_id = n.news_id', array())
                    ->joinInner(array('ki' => $this->_SQL_TABLE->keyword_info), 'ki.keyword_id = nk.keyword_id ', array())
                    ->fetchAll();
                foreach($tags as $val)
                {
                    $result[$val['news_id']]['keywords'][] = $val;
                }
            }
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
