<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Orders
 *
 * @author altasar
 */
class Qsolutions_Magemlm_Block_Adminhtml_Unilevel extends Mage_Adminhtml_Block_Template {
    
    protected $_addButtonLabel = 'Create new Unilevel Compensation Plan';

    public function __construct() {        
        parent::__construct();
		$this->setTemplate('magemlm/unilevel/view.phtml');        
    }

}

