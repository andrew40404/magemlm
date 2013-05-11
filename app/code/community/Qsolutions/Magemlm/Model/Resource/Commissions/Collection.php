<?php

/**
 * @category    Qsolutions
 * @package     Magemlm
 * @copyright   Copyright (c) 2013 Qsolutions Studio
 * @author		Jakub Winkler
 */

class Qsolutions_Magemlm_Model_Resource_Commissions_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {
	
    public function _construct()
    {
        parent::_construct();
        $this->_init('magemlm/commissions');
    }
	
}

?>
