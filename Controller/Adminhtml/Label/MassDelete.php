<?php

namespace Tai\ProductLabel\Controller\Adminhtml\Label;

class MassDelete extends \Magento\Backend\App\Action
{
    protected $collectionFactory;

    protected $filter;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Ui\Component\MassAction\Filter $filter,
        \Tai\ProductLabel\Model\ResourceModel\Label\CollectionFactory $collectionFactory
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        // get selected label collection and selected label size
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();

        // delete label
        foreach ($collection as $label) {
            $label->delete();
        }

        // display success message and redirect to grid
        $this->messageManager->addSuccessMessage(__('A total of ' . $collectionSize . ' record(s) have been deleted.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/');
    }
}
