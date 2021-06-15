<?php

namespace Tai\ProductLabel\Controller\Adminhtml\Label;

use Magento\Backend\App\Action;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Tai\ProductLabel\Controller\Adminhtml\Label
{
    protected $labelFactory;

    public function __construct(
        \Tai\ProductLabel\Model\LabelFactory $labelFactory,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory,
        Action\Context $context
    )
    {
        $this->labelFactory = $labelFactory;
        parent::__construct($pageFactory, $forwardFactory, $context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if ($data) {
            $model = $this->labelFactory->create();
            $id = $this->getRequest()->getParam('id');

            if ($id) {
                try {
                    $model = $model->load($id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This label no longer exists'));
                    return $resultRedirect->setPath('*/*/');
                }
            }
            $data = $this->filterFoodData($data);
            $model->setLabelName($data['label_name'])
                ->setStatus($data['status'])
                ->setImage($data['image']);

            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the label'));
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Some thing went wrong while saving the label'));
            }
            return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    public function filterFoodData(array $rawData)
    {
        $data = $rawData;
        if (isset($data['image'][0]['name'])) {
            $data['image'] = $data['image'][0]['name'];
        } else {
            $data['image'] = null;
        }
        return $data;
    }
}
