<?php
class Lotus_Backend_Block_Adminhtml_Backend_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('BackendGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('backend/backend')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            array(
                'header' => Mage::helper('backend')->__('ID'),
                'align'  => 'right',
                'width'  => '50px',
                'index'  => 'id',
            )
        );
        $this->addColumn(
            'email',
            array(
                'header' => Mage::helper('backend')->__('Email'),
                'align'  => 'left',
                'index'  => 'email',
            )
        );
        $this->addColumn(
            'sku',
            array(
                'header' => Mage::helper('backend')->__('Sku'),
                'align'  => 'left',
                'index'  => 'sku',
            )
        );
        $this->addColumn(
            'quantity',
            array(
                'header' => Mage::helper('backend')->__('Quantity'),
                'width'  => '150px',
                'index'  => 'quantity',
            )
        );
        //cot edit
        $this->addColumn(
            'action',
            array(
                'header'    => Mage::helper('backend')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption' => Mage::helper('backend')->__('Edit'),
                        'url'     => array('base' => '*/*/edit'),
                        'field'   => 'id',
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
            )
        );
        return parent::_prepareColumns();
    }
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}