<?php

class Lotus_Backend_Block_Adminhtml_Backend extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_backend';
        $this->_blockGroup = 'backend';
        $this->_headerText = Mage::helper('backend')->__('Item Manager');
        $this->_addButtonLabel = Mage::helper('backend')->__('Add Item');
        parent::__construct();
    }
}