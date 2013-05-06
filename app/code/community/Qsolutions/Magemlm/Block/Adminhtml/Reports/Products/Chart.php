<?php 


class Qsolutions_Chartreports_Block_Adminhtml_Reports_Products_Chart extends Mage_Adminhtml_Block_Template {  
    
    public function __construct() {  
        parent::__construct();  
           $this->setFormAction(Mage::getUrl('*/*/chart'));  
      }  
    }  
    
?>