<?php

namespace Irene\MediaLab\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * Student model
 *
 */
class Student extends AbstractModel
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Irene\MediaLab\Model\ResourceModel\Student::class);
    }


    public function getName()
    {
        $name = $this->getFirstname();
        $name .= ' ';
        $name .= $this->getLastname();
        return $this->getFirstname() . ' ' . $this->getLastname();
    }

}
