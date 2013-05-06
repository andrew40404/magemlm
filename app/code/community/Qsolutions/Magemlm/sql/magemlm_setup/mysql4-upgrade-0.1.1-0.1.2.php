<?php
/**
     * Qsolutions MageMLM extension
     *
     * @package    MageMLM
     * @author     Jakub Winkler <office@qsolutions.com.pl>
     */

$installer = $this;
$installer->startSetup();


$installer->run("

    DROP TABLE IF EXISTS {$this->getTable('magemlm_customers')};
    CREATE TABLE {$this->getTable('magemlm_customers')} (
      `magemlm_id`      int(11) unsigned NOT NULL auto_increment,
      `customer_id`     int(11) NOT NULL ,
      `refferer_id`     int(11) NOT NULL ,
      `magemlm_image`   varchar(255) NOT NULL ,
      PRIMARY KEY (`magemlm_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

    

$installer->endSetup(); 