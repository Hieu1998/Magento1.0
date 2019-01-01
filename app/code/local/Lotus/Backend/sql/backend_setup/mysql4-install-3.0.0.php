<?php

$installer = $this;

$installer->startSetup();

$installer->run("
DROP TABLE IF EXISTS {$this->getTable('shop_tiki')};
CREATE TABLE {$this->getTable('shop_tiki')} (
`id` int(11) unsigned NOT NULL auto_increment,
`sku` varchar(255) NOT NULL default '',
`email` varchar(255) NOT NULL default '',
`quantity` int(11) NOT NULL default 0,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `{$this->getTable('shop_tiki')}` VALUES ('D0001','hieuducnguyen.it@gmail.com',100);
");
$installer->endSetup();