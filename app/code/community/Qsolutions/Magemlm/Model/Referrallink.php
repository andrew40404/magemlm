<?php

/**
 * @category    Qsolutions
 * @package     Magemlm
 * @copyright   Copyright (c) 2013 Qsolutions Studio
 */
 
 class Qsolutions_Magemlm_Model_Referrallink extends Mage_Core_Model_Abstract {

    protected function _construct()
    {
        $this->_init('magemlm/referrallink');
    }
	
	
	public function link ($customerId) {
		return Mage::getBaseUrl() . '?refId=' . $customerId;
	}
	
	
	public function setLink ($link) {
		Mage::getSingleton('core/session')->setLink($link);
	}
	
    
 }
