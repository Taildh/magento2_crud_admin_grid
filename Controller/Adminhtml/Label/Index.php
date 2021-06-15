<?php

namespace Tai\ProductLabel\Controller\Adminhtml\Label;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Tai\ProductLabel\Controller\Adminhtml\Label
{
    public function execute()
    {
        $resultPage =  $this->__initPage();
        $resultPage->getConfig()->getTitle()->prepend(__('Product Label'));
        return $resultPage;
    }
}
