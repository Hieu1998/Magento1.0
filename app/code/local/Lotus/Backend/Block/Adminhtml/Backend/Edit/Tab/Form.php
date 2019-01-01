<?php
class Lotus_Backend_Block_Adminhtml_Backend_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{  
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('backend_form',array('legend'=>'Information form'));
        $fieldset->addField('sku', 'text',
            array(
                'label' => 'Sku',
                'class' => 'required-entry',
                'required' => true,
                'name' => 'sku',
        ));
        $fieldset->addField('email', 'text',
            array(
                'label' => 'Email',
                'class' => 'required-entry',
                'required' => true,
                'name' => 'email',
        ));
        $fieldset->addField('quantity', 'text',
            array(
                'label' => 'Quantity',
                'class' => 'required-entry',
                'required' => true,
                'name' => 'quantity',
        ));

    if ( Mage::registry('backend_data') )
    {
        $form->setValues(Mage::registry('backend_data')->getData());
    }
    
    return parent::_prepareForm();
    }
}
