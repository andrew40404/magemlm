<?php 
 
/**
 * Adminhtml customer action tab
 *
 */
class Qsolutions_Magemlm_Block_Customer_Commissions extends Mage_Core_Block_Template {
	  
    public function __construct() {  
        parent::__construct();
		$this->setTemplate("magemlm/commissions.phtml") ;
      }  
}