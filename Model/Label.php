<?php

namespace Tai\ProductLabel\Model;

class Label extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init('Tai\ProductLabel\Model\ResourceModel\Label');
    }
}