<?php

/**
 * @category    Qsolutions
 * @package     Magemlm
 * @copyright   Copyright (c) 2013 Qsolutions Studio
 * @author 		Jakub Winkler
 */

class Qsolutions_Magemlm_Adminhtml_UnilevelController extends Mage_Adminhtml_Controller_Action {
    
    
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
	
	public function editAction()
    {
    	$id = $this->getRequest()->getParam('id', null);
        $model = Mage::getModel('magemlm/unilevel');
        if ($id) {
            $model->load((int) $id);
            if ($model->getId()) {
                $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
                if ($data) {
                    $model->setData($data)->setId($id);
                }
            } else {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('magemlm')->__('Example does not exist'));
                $this->_redirect('*/*/');
            }
        }
		
        Mage::register('unilevel_data', $model);
        $this->loadLayout();        
        $this->_initAction()
                ->renderLayout();
    }


    protected function _isAllowed()
    {
        return true;
    }
	
	
	public function deleteAction () {
		
	}
	
	
	public function saveAction () {
		if ($data = $this->getRequest()->getPost())
        {
            $model 	= Mage::getModel('magemlm/unilevel');
            $id 	= $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id , 'unilevel_id');
            }
            $model->setData($data);
			
 
            Mage::getSingleton('adminhtml/session')->setFormData($data);
            try {
                if ($id) {
                    $model->setId($id);
                }
                $model->save();
 
                if (!$model->getId()) {
                    Mage::throwException(Mage::helper('magemlm')->__('Error saving level data'));
                }
 
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magemlm')->__('Example was successfully saved.'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
 
                // The following line decides if it is a "save" or "save and continue"
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
 
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                if ($model && $model->getId()) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                } else {
                    $this->_redirect('*/*/');
                }
            }
 
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('magemlm')->__('No data found to save'));
        $this->_redirect('*/*/');
	}
	

}
