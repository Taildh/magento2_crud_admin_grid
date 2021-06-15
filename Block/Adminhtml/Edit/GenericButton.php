<?php

namespace Tai\ProductLabel\Block\Adminhtml\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Tai\ProductLabel\Model\LabelFactory;

class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var LabelFactory
     */
    protected $labelFactory;

    /**
     * @param Context $context
     * @param LabelFactory $labelFactory
     */
    public function __construct(
        Context $context,
        LabelFactory $labelFactory
    ) {
        $this->context = $context;
        $this->labelFactory = $labelFactory;
    }

    /**
     * Return Label ID
     *
     * @return int|null
     */
    public function getLabelId()
    {
        try {
            return $this->context->getRequest()->getParam('id');
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
