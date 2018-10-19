<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Irene\MediaLab\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;


class View extends \Magento\Framework\App\Action\Action
{

    /** @var PageFactory */
    protected $resultPageFactory;

    /**
     * @var \Magento\Framework\Controller\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param PageFactory $pageFactory
     * @param \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
    ) {
        $this->resultPageFactory = $pageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }


    /**
     * View CMS page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
//        $this->_view->loadLayout();
//        $this->_view->renderLayout();

        $studentId = $this->getRequest()->getParam('student_id');

        if (!$studentId) {

        }

//        $student = $this->studentFactory->create();

        $resultPage = $this->resultPageFactory->create();

        return $resultPage;
    }
}
