<?php

/*
 *  Qsolutions_SnowExporter_Adminhtml_ExportController
 *
 * 	Controller responsible for handling the grid actions
 *  @author Qsolutions
 */

class Qsolutions_Chartreports_Adminhtml_ProductsController extends Mage_Adminhtml_Controller_Action {
    
    
    protected function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    
    
    public function getproductsAction () {
        $this->_initAction()
                ->renderLayout();
    }
    

    protected function _initAction()
    {
        $this->loadLayout()
                ->_setActiveMenu('report');
        return $this;
    }

    public function indexAction()
    {
        $this->loadLayout();
        
        $head = Mage::app()->getLayout()->getBlock('head');
        $head->addItem('skin_css', 'css/additional.css');
        $this->_initAction()
                ->renderLayout();
    }

    
    public function chartAction () {
        
        $this->_initAction()
                ->renderLayout();
        
    }

    protected function _isAllowed()
    {
        return true;
    }

}
