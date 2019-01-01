<?php

class Lotus_Backend_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * hello action
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}