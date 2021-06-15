<?php

namespace Tai\ProductLabel\Controller\Adminhtml;

use Magento\Backend\App\Action;

abstract class Label extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    protected $resultForwardFactory;


    public function __construct(
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory,
        Action\Context $context
    ) {
        $this->resultPageFactory = $pageFactory;
        $this->resultForwardFactory = $forwardFactory;
        parent::__construct($context);
    }

    public function __initPage()
    {
        return $this->resultPageFactory->create();
    }
}
