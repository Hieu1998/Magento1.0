<?php

class Lotus_Backend_Model_Mysql4_Backend_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        //parent::_construct();
        $this->_init('backend/backend');
    }
}
