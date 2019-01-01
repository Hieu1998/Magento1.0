<?php
class Lotus_Backend_Model_Observer
{
    public function cartProductAddAfter($observer)
    {
        $event = $observer->getEvent();  //Gets the event
        $product = $event->getProduct();    //Gets the product
        $quoteItem = $observer->getQuoteItem();
        $qty = $quoteItem->getQty();
        $parent = Mage::getModel('catalog/product')->load($product->getParentProductId());
        //get email now
        Mage::getSingleton('core/session', array('name' => 'frontend'));
        $customer_email = Mage::getSingleton('customer/session')->getCustomer()->getEmail();
        //get collection
        $collection = Mage::getModel('backend/backend')
            ->getCollection()
            ->addFilter('email',$customer_email);
//            ->addFilter('sku',$product->getSku());
        $collection = $collection->getFirstItem();
        //get quantity in table
        $quota = $collection->getQuantity();
        //check
        if($qty > $quota){
            //in thong bao loi
            Mage::throwException(Mage::helper('backend')->__('Mua chi nhiều vậy mua được '.$quota.' cái thôi nhé!'));
        }
    }
}