<?php

/*
 *  Qsolutions_SnowExporter_Adminhtml_ExportController
 *
 * 	Controller responsible for handling the grid actions
 *  @author Qsolutions
 */

class Qsolutions_Magemlm_Adminhtml_StructureController extends Mage_Adminhtml_Controller_Action {
    
    
    protected function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    

    protected function _initAction()
    {
        $this->loadLayout()
                ->_setActiveMenu('multilevel');
        return $this;
    }

    public function indexAction()
    {
        $this->loadLayout();
        
        $this->_initAction()
                ->renderLayout();
    }


    protected function _isAllowed()
    {
        return true;
    }

}
