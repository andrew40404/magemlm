<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Collectin
 *
 * @author altasar
 */

class Qsolutions_Magemlm_Model_Resource_Customer_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {
    //put your code here
    
    public function _construct()
    {
        parent::_construct();
        $this->_init('magemlm/customer');
    }
    
}

?>
