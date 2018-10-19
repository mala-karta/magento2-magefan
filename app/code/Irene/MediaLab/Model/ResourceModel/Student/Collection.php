<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Irene\MediaLab\Model\ResourceModel\Student;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;


/**
 * CMS Block Collection
 */
class Collection extends AbstractCollection
{

    protected function _construct()
    {
        $this->_init(\Irene\MediaLab\Model\Student::class, \Irene\MediaLab\Model\ResourceModel\Student::class);
    }


}
