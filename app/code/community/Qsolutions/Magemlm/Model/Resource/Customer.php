<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Redirect
 *
 * @author altasar
 */
class Qsolutions_Magemlm_Model_Resource_Customer extends Mage_Core_Model_Resource_Db_Abstract {
    //put your code here
    
    protected function _construct()
    {
        $this->_init('magemlm/customer' , 'magemlm_id');
    }
}

?>
