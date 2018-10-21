<?php
class DFCms_Controller_Action extends Zend_Controller_Action
{
    public function __call($methodName, $args)
    {
        if(substr($methodName, 0, 6) == 'action')
        {
          throw new DFCms_Exception('Page not found', 404);
        }
        parent::__call($methodName, $args);
    }
    public function initView()
    {
        if (!$this->getInvokeArg('noViewRenderer') && $this->_helper->hasHelper('viewRenderer')) {
            return $this->view;
        }

        require_once 'Zend/View/Interface.php';
        if (isset($this->view) && ($this->view instanceof Zend_View_Interface)) {
            return $this->view;
        }

        $baseDir = __CFG_CORE_PATH . 'views';

        require_once 'Zend/View.php';
        $this->view = new Zend_View(array('basePath' => $baseDir));

        return $this->view;
    }
    public function getViewScript($action = null, $noController = null)
    {
//        if (!$this->getInvokeArg('noViewRenderer') && $this->_helper->hasHelper('viewRenderer')) {
//            $viewRenderer = $this->_helper->getHelper('viewRenderer');
//            if (null !== $noController) {
//                $viewRenderer->setNoController($noController);
//            }
//            return $viewRenderer->getViewScript($action);
//        }
//
//        $request = $this->getRequest();
//        if (null === $action) {
//            $action = $request->getActionName();
//        } elseif (!is_string($action)) {
//            require_once 'Zend/Controller/Exception.php';
//            throw new Zend_Controller_Exception('Invalid action specifier for view render');
//        }
//
//        if (null === $this->_delimiters) {
//            $dispatcher = Zend_Controller_Front::getInstance()->getDispatcher();
//            $wordDelimiters = $dispatcher->getWordDelimiter();
//            $pathDelimiters = $dispatcher->getPathDelimiter();
//            $this->_delimiters = array_unique(array_merge($wordDelimiters, (array) $pathDelimiters));
//        }
//
//        $action = str_replace($this->_delimiters, '-', $action);
        $script =  $action . '.' . $this->viewSuffix;
//
//        if (!$noController) {
//            $controller = $request->getControllerName();
//            $controller = str_replace($this->_delimiters, '-', $controller);
//            $script = $controller . DIRECTORY_SEPARATOR . $script;
//        }

        return $script;
    }
}
