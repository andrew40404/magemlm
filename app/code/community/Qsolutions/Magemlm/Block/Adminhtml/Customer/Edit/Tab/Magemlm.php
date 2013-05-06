<?php 
 
/**
 * Adminhtml customer action tab
 *
 */
class Qsolutions_Magemlm_Block_Adminhtml_Customer_Edit_Tab_Magemlm
    extends Mage_Adminhtml_Block_Template
        implements Mage_Adminhtml_Block_Widget_Tab_Interface {
    
    
    protected $_customer;
    
    
    public function getCustomer()
    {
        if (!$this->_customer) {
            $this->_customer = Mage::registry('current_customer');
        }
        return $this->_customer;
    }
    
    
    
    public function __construct()
    {
        $this->setTemplate('magemlm/customer.phtml');
        $this->_customer  = $this->getCustomer();
 
    }
 
 
    /**
     * Return Tab label
     *
     * @return string
     */
    public function getTabLabel()
    {
        return $this->__('Customer MLM Profile');
    }
 
    /**
     * Return Tab title
     *
     * @return string
     */
    public function getTabTitle()
    {
        return $this->__('Multilevel Customer Data');
    }
 
    /**
     * Can show tab in tabs
     *
     * @return boolean
     */
    public function canShowTab()
    {
        $customer = Mage::registry('current_customer');
        return (bool)$customer->getId();
    }
 
    /**
     * Tab is hidden
     *
     * @return boolean
     */
    public function isHidden()
    {
        return false;
    }
 
     /**
     * Defines after which tab, this tab should be rendered
     *
     * @return string
     */
    public function getAfter()
    {
        return 'tags';
    }
 
}
?>