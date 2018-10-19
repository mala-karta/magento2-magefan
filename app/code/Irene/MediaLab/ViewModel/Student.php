<?php

namespace Irene\MediaLab\ViewModel;

use Magento\Framework\Registry;

class Student implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /** @var array|null  */
    protected $students;

    /** @var  \Irene\MediaLab\Model\ResourceModel\Student\CollectionFactory */
    protected $collectionFactory;

    /** @var Registry */
    protected $registry;

    /**
     * Student constructor.
     * @param \Irene\MediaLab\Model\ResourceModel\Student\CollectionFactory $collectionFactory
     */
    public function __construct(
        \Irene\MediaLab\Model\ResourceModel\Student\CollectionFactory  $collectionFactory
    )
    {
        $this->collectionFactory = $collectionFactory;
//        $this->registry = $registry;
    }


    public function getStudents()
    {
        if (null === $this->students) {

            $this->students = $this->collectionFactory->create()
                ->addFieldToFilter('is_active', 1);
        }

        return $this->students;

    }




}