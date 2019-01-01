<?php

class Lotus_Backend_Model_Backend extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        //parent::_construct();
        $this->_init('backend/backend');
    }
}