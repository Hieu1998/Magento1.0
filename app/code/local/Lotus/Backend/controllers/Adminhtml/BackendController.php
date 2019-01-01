<?php
class Lotus_Backend_Adminhtml_BackendController extends Mage_Adminhtml_Controller_Action
{
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('backend');
    }
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('backend/backend')
            ->_addBreadcrumb(
                Mage::helper('backend')->__('Items Manager'),
                Mage::helper('backend')->__('Item Manager')
            );
        return $this;
    }
    public function indexAction()
    {
        //echo Mage::app()->getFrontController()->getAction()->getFullActionName();exit;
        $this->_initAction()
        ->renderLayout();
    }
    public function newAction(){
        $this->_forward('edit');
    }
    public function editAction() {
        $filmsId = $this->getRequest()->getParam('id');
        $filmsModel = Mage::getModel('backend/backend')->load($filmsId);

        if ($filmsModel->getId() || $filmsId == 0)
        {
            Mage::register('backend_data', $filmsModel);
            $this->loadLayout();
            $this->_setActiveMenu('backend/backend');
            $this->_addBreadcrumb('backend Manager', 'backend Manager');
            $this->_addBreadcrumb('backend Description', 'backend Description');
            $this->getLayout()->getBlock('head')
                ->setCanLoadExtJs(true);
            $this->_addContent($this->getLayout()
                ->createBlock('backend/adminhtml_backend_edit'))
                ->_addLeft($this->getLayout()
                    ->createBlock('backend/adminhtml_backend_edit_tabs')
                );
            $this->renderLayout();
        }
        else
        {
            Mage::getSingleton('adminhtml/session')->addError('backend does not exist');
            $this->_redirect('*/*/');
        }
    }
    public function saveAction() {
        if ($this->getRequest()->getPost())
        {
            try {
                $postData = $this->getRequest()->getPost();
                $filmsModel = Mage::getModel('backend/backend');

                if( $this->getRequest()->getParam('id') != 0 ) {
                    $filmsModel->setCreatedTime( Mage::getSingleton('core/date')->gmtDate() );
                    $filmsModel
                        ->addData($postData)
                        ->setUpdateTime( Mage::getSingleton('core/date')->gmtDate())
                        ->setId($this->getRequest()->getParam('id'))
                        ->save();

                    Mage::getSingleton('adminhtml/session')->addSuccess('successfully saved');
                    Mage::getSingleton('adminhtml/session')->setfilmsData(false);
                    $this->_redirect('*/*/');
                    return;
                }else{
                    $filmsModel->setCreatedTime( Mage::getSingleton('core/date')->gmtDate() );
                    $filmsModel
                        ->addData($postData)
                        ->setUpdateTime( Mage::getSingleton('core/date')->gmtDate())
                        ->setId($this->getRequest()->getParam('id'))
                        ->save();

                    Mage::getSingleton('adminhtml/session')->addSuccess('successfully saved');
                    Mage::getSingleton('adminhtml/session')->setfilmsData(false);
                    $this->_redirect('*/*/');
                }

            } catch (Exception $e) {

                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setfilmsData($this->getRequest()->getPost());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }

            $this->_redirect('*/*/');
        }
    }
    public function deleteAction() {
        if($this->getRequest()->getParam('id') > 0)
        {
            try
            {
                $filmsModel = Mage::getModel('backend/backend');
                $filmsModel->setId($this->getRequest()->getParam('id'))->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess('successfully deleted');
                $this->_redirect('*/*/');
            }
            catch (Exception $e)
            {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }
}