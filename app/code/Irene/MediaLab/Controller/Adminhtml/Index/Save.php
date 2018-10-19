<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Irene\MediaLab\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{

    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Irene_MediaLab::page';
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var BlockFactory
     */
    private $studentFactory;


    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param DataPersistorInterface $dataPersistor
     * @param BlockFactory|null $blockFactory
     * @param BlockRepositoryInterface|null $blockRepository
     */
    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        \Irene\MediaLab\Model\StudentFactory $studentFactory
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->studentFactory = $studentFactory;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            if (isset($data['is_active']) && $data['is_active'] === 'true') {
                $data['is_active'] = 1;
            }
            if (empty($data['student_idf'])) {
                $data['student_id'] = null;
            }

            /** @var \Magento\Cms\Model\Block $model */
            $model = $this->studentFactory->create();

            $id = $this->getRequest()->getParam('student_id');
            if ($id) {
                    //$model = $this->blockRepository->getById($id);
                $model->load($id);
                if (!$model->getId()) {
                    $this->messageManager->addErrorMessage(__('This student no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }

            $model->setData($data);

            try {
                //$this->blockRepository->save($model);
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the student.'));
                $this->dataPersistor->clear('irmedialab_student');
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['student_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the student.'));
            }

            $this->dataPersistor->set('irmedialab_student', $data);
            return $resultRedirect->setPath('*/*/edit', ['student_id' => $this->getRequest()->getParam('student_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
