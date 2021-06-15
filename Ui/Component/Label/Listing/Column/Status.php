<?php

namespace Tai\ProductLabel\Ui\Component\Label\Listing\Column;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            [
                'label' => __('Enable'), 'value' => 1,
            ],
            [
                'label' => __('Disable'), 'value' => 0,
            ],
        ];
    }
}