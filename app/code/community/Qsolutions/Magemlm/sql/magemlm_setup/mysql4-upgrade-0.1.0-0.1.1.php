<?php
/**
     * Qsolutions MageMLM extension
     *
     * @package    MageMLM
     * @author     Jakub Winkler <office@qsolutions.com.pl>
     */

$installer = $this;
$installer->startSetup();

$conn   = $installer->getConnection();
$conn->addColumn($this->getTable('customer_entity'), 'magemlm_image', 'varchar(255) not null');
   

$installer->endSetup(); 