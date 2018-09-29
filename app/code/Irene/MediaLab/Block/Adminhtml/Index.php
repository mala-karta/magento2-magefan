<?php
namespace Irene\MediaLab\Block\Adminhtml;

use Magento\Backend\Block\Template as BlockTemplate;
use Magento\Store\Model\ScopeInterface;

class Index extends BlockTemplate
{
    public function isEnabled()
    {
        return $this->_scopeConfig->getValue(
            'irmedialab/fields_masks/sku',
            ScopeInterface::SCOPE_STORE

        );
    }


}