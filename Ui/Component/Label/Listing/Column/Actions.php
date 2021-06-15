<?php

namespace Tai\ProductLabel\Ui\Component\Label\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;

class Actions extends \Magento\Ui\Component\Listing\Columns\Column
{
    const URL_DELETE = 'product_label/label/delete';
    const URL_EDIT = 'product_label/label/edit';

    protected $urlBuilder;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item['id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_EDIT,
                                ['id' => $item['id']]
                            ),
                            'label' => __('Edit'),
                        ],
                        'delete' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_DELETE,
                                ['id' => $item['id']]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'message' => __('Are you sure to delete this')
                            ]
                        ]
                    ];
                }
            }
        }
        return $dataSource;
    }
}
