<?php
/**
     * Qsolutions MageMLM extension
     *
     * @package    MageMLM
     * @author     Jakub Winkler <office@qsolutions.com.pl>
     */

$installer = $this;
$installer->startSetup();
/*
$installer->run("

    DROP TABLE IF EXISTS {$this->getTable('magemlm_company')};
    CREATE TABLE {$this->getTable('magemlm_company')} (
      `redirect_id`     int(11) unsigned NOT NULL auto_increment,
      `website_id`        int(11) NOT NULL ,
      `product_id`      int(11) NOT NULL ,
      `user_id`         int(11) NOT NULL ,
      `status`          smallint(6) NOT NULL default '0',
      `redirect_date`   datetime NULL,
      `ip_address`      varchar(255) NOT NULL,
      `created_time`    datetime NULL,
      `update_time`     datetime NULL,
      PRIMARY KEY (`redirect_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");
 * 
 */

$conn   = $installer->getConnection();
$conn->addColumn($this->getTable('customer_entity'), 'referral_id', 'bigint unsigned not null');

    

$installer->endSetup(); 