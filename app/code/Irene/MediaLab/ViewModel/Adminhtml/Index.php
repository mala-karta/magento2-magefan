<?php

namespace Irene\MediaLab\ViewModel\Adminhtml;

use \Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Index implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function isEnabled()
    {
        return $this->scopeConfig->getValue(
            'irmedialab/fields_masks/sku',
            ScopeInterface::SCOPE_STORE

        );
        return '<b>Hello</b> World in Admin Html ViewModel!';
    }


}