<?php

namespace Tai\ProductLabel\Model\ResourceModel\Label;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init('Tai\ProductLabel\Model\Label', 'Tai\ProductLabel\Model\ResourceModel\Label');
    }
}