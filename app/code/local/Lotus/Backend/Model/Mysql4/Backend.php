<?php

class Lotus_Backend_Model_Mysql4_Backend extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        /* id is primary of shop_tiki table */
        $this->_init('backend/backend', 'id');
    }
}