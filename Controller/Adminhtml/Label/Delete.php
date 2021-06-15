<?php

namespace Tai\ProductLabel\Controller\Adminhtml\Label;

class Delete extends \Tai\ProductLabel\Controller\Adminhtml\Label
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        // check label exist or not
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Tai\ProductLabel\Model\Label::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the label'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message and back to edit form
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        // display error message and back to grid
        $this->messageManager->addErrorMessage(__('We can\'t find a label to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
