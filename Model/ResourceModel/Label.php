<?php

namespace Tai\ProductLabel\Model\ResourceModel;

class Label extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('product_label', 'id');
    }
}