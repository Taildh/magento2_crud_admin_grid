<?php

namespace Tai\ProductLabel\Controller\Adminhtml\Label;

class NewAction extends \Tai\ProductLabel\Controller\Adminhtml\Label
{
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}