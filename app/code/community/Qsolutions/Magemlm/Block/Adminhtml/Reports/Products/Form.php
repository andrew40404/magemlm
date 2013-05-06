<?php 


class Qsolutions_Magemlm_Block_Adminhtml_Reports_Products_Form extends Mage_Adminhtml_Block_Template {  
    public function __construct() {  
        parent::__construct();  
        
        $this->setFormAction(Mage::getUrl('*/*/new'));  
      }  
    }  
    
?>