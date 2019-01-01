<?php
class Lotus_Backend_Block_Adminhtml_Backend_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        
        $this->_objectId = 'id';
        $this->_blockGroup = 'backend';
        $this->_controller = 'adminhtml_backend';
        
        $this->_updateButton('save', 'label','Save');
        $this->_updateButton('delete', 'label', 'Delete');

        $this->_addButton('saveandcontinue', array(
            'label' => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
            ), -100);
    }    

    public function getHeaderText()
    {
        if( Mage::registry('backend_data') && Mage::registry('backend_data')->getId() )
         {
              return 'Edit form '.$this->htmlEscape( Mage::registry('backend_data')->getTitle() );
         }
         else
         {
             return 'Add new';
         }
    }
}