<?php

namespace Tai\ProductLabel\Model\Label;

use Magento\Framework\UrlInterface;
use Magento\Store\Model\StoreManagerInterface;
use Tai\ProductLabel\Model\ResourceModel\Label\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;

    protected $loadedData;

    protected $storeManager;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $labelCollectionFactory,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $labelCollectionFactory->create();
        $this->storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $label) {
            if ($label->getImage()) {
                $image[0]['name'] = $label->getImage();
                $image[0]['url'] = $this->getMediaUrl() . $label->getImage();
                $label['image'] = $image;
            }
            $this->loadedData[$label->getId()] = $label->getData();
        }
        return $this->loadedData;
    }

    public function getMediaUrl()
    {
        return $this->storeManager->getStore()->getBaseUrl(
            UrlInterface::URL_TYPE_MEDIA
        ) . 'catalog/tmp/label/';
    }
}
