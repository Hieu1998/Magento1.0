<?php 
class Lotus_Backend_Block_Adminhtml_Backend_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{  
    public function __construct()
     {
          parent::__construct();
          $this->setId('backend_tabs');
          $this->setDestElementId('edit_form');
          $this->setTitle('Information form');
      }

      protected function _beforeToHtml()
      {
          $this->addTab('form_section', array(
                   'label' => 'About the form',
                   'title' => 'About the form',
                   'content' => $this->getLayout()
                                     ->createBlock('backend/adminhtml_backend_edit_tab_form')
                                     ->toHtml()
        ));
        
        return parent::_beforeToHtml();
    }
}