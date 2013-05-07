<?php

/**
 * @category    Qsolutions
 * @package     Magemlm
 * @copyright   Copyright (c) 2013 Qsolutions Studio
 * @author		Jakub Winkler
 */
 
class Qsolutions_Magemlm_Model_Observer {

    public function __construct () {
        
    } // public function __construct () {
    
    public function registerPartner(Varien_Event_Observer $observer) {
        
        $affiliateId     = Mage::getSingleton('core/session')->getAffiliateId();
        if ($affiliateId == NULL ) { 
            Mage::getSingleton('core/session')->setAffiliateId('some value') ; 
        }
    
    } // public function registerPartner($observer) {
    
    public function saveCustomerMlmData(Varien_Event_Observer $observer) {
        
		$customer   = $observer->getEvent()->getCustomer();
        $customerId = $customer->getId();
        $referrerId = Mage::app()->getRequest()->getPost('magemlm_referrer');
        
        // load magemlm / customer model
        $customerMagemlm   = Mage::getModel('magemlm/customer')->load($customerId , 'customer_id');
        
        if(isset($_FILES['magemlm_customer_picture']['name']) and (file_exists($_FILES['magemlm_customer_picture']['tmp_name']))) {
            try {
                
                $ext = pathinfo($_FILES['magemlm_customer_picture']['name'], PATHINFO_EXTENSION);
                
                $uploader = new Varien_File_Uploader('magemlm_customer_picture');
                $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png')); // or pdf or anything

                $uploader->setAllowRenameFiles(false);
                $uploader->setFilesDispersion(false);

                $path = Mage::getBaseDir('media') . DS . 'magemlm' . DS;

                $fileName = $customer->getId() . '_' . date('Ymdhis') . '.' . $ext;
                $uploader->save($path, $fileName); // save file
                
                $customerMagemlm->setCustomerId($customerId);
                $customerMagemlm->setReffererId($referrerId);
                $customerMagemlm->setMagemlmImage($fileName);
                $customerMagemlm->save();

            	} catch(Exception $e) {
        	} 
       } else {
          	$customerMagemlm->setCustomerId($customerId);
          	$customerMagemlm->setReferrerId($referrerId);
          	$customerMagemlm->save();   
      	}
        
        // $event          = $observer->getEvent();
    } // public function registerPartner($observer) {
    
    
    public function getCustomer() {
        return Mage::registry('customer');
    } // public function getCustomer() {
    
}