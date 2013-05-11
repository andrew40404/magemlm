<?php

/**
 * @category    Qsolutions
 * @package     Magemlm
 * @copyright   Copyright (c) 2013 Qsolutions Studio
 */
 
class Qsolutions_Magemlm_Model_Commissions extends Mage_Core_Model_Abstract {

    protected function _construct()
    {
        $this->_init('magemlm/commissions');
    }
	
	
	
	public function calculateCommissions ($customerId , $orderId, $orderSum) {
		// get all commision levels in revert order
		$uniLevelCommision 		= Mage::getModel('magemlm/unilevel')->getCollection()->setOrder('unilevel_id' , 'desc');
		$customerStructure 		= Mage::getModel('magemlm/commissions')->getCustomerStructure($customerId); // get array of customers up to store view
		$structureCount			= count($customerStructure);
		$commissionStructure 	= Mage::getModel('magemlm/commissions')->getCommissionStructure();
		
		$i = 0 ;
		foreach ($customerStructure as $customer) {
			// check if there is commission for this level
			if (isset($commissionStructure[$i])) {
				$commissionValue 	=  	$orderSum * $commissionStructure[$i] / 100; // remeber we save commission levels in %
				
				/// set data and save our commission - this is cool :-)
				$commission 		= Mage::getModel('magemlm/commissions');
				$commission ->setCustomerId($customer)
							->setOrderId   ($orderId)
							->setCommissionValue ($commissionValue)
							->setCreatedAt(date('Y-m-d H:i:s'))
							->setCommissionLevel(Mage::helper('magemlm')->getCustomerLevel($customerId))
							->save();	
			} else {
				break;
			}
			// go to next item
			$i++;
		}
	}
	
	
	/**
	 * getting customer structure
	 * @param customerId - customer id
	 * @return array of customer id's
	 */
	public function getCustomerStructure($customerId) {
		
		Mage::helper('magemlm')->getCustomerReferralId($customerId);
		$customerArray = array ();
		
		while (Mage::helper('magemlm')->getCustomerReferralId($customerId) || strpos($customerId , "store") ) {
			$customerId = Mage::helper('magemlm')->getCustomerReferralId($customerId);
			
			$pos = strpos($customerId, 'store');
			if ($pos !== false)  {
				break ; 
			}
			$customerArray[] = $customerId; // . " " . Mage::helper('magemlm')->getCustomerName($customerId).  "<br/>";
		}
		return $customerArray; 
	}
	
	
	/**
	 * getting commission structure
	 * @return array of commission values
	 */
	public function getCommissionStructure() {
		
		$commissionArray	= array ();
		$uniLevelCommision 	= Mage::getModel ('magemlm/unilevel')->getCollection()->setOrder('unilevel_id' , 'asc');

		foreach ($uniLevelCommision as $level) {
			$commissionArray[] = $level->getLevelCommission();
		}
		
		return $commissionArray;
	}


	public function getCommissionSummary ($customerId) {
		$resource 		= Mage::getSingleton('core/resource');
		$readConnection = $resource->getConnection('core_read');
        $query 			= 'select SUM(commission_value) as sum from magemlm_commissions where customer_id = "'. $customerId . '" ';
        $result 		= $readConnection->fetchOne($query);
		return $result;
	}
    
}
