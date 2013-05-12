<?php

/**
 * @category    Qsolutions
 * @package     Magemlm
 * @copyright   Copyright (c) 2013 Qsolutions Studio
 * @author		Jakub Winkler
 */
 
class Qsolutions_Magemlm_Model_Resource_Commissions extends Mage_Core_Model_Resource_Db_Abstract {
    //put your code here
    
    protected function _construct()
    {
        $this->_init('magemlm/commissions' , 'commission_id');
    }
}

?>