<?php

namespace Tai\ProductLabel\Controller\Adminhtml\Label;

class Edit extends \Tai\ProductLabel\Controller\Adminhtml\Label
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create(\Tai\ProductLabel\Model\Label::class);

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This Label no longer exists'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $resultPage = $this->__initPage();
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getLabelName() : __('New Label'));
        return $resultPage;
    }
}