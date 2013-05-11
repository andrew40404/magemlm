<?php

/**
 * @category    Qsolutions
 * @package     Magemlm
 * @copyright   Copyright (c) 2013 Qsolutions Studio
 * @author 		Jakub Winkler
 */

class Qsolutions_Magemlm_CustomerController extends Mage_Core_Controller_Front_Action {
    
    
    protected function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    

    protected function _initAction()
    {
        $this->loadLayout();
        return $this;
    }

    public function indexAction()
    {
        $this->_initAction()
                ->renderLayout();
    }
	
	public function viewAction () {
		$this->_initAction()
                ->renderLayout();
	}
	
	public function configAction () {
		$this->_initAction()
                ->renderLayout();
	}
	
	public function commissionsAction () {
		$this->_initAction()
                ->renderLayout();
	}
	
	public function planAction () {
		$this->_initAction()
                ->renderLayout();
	}

}
