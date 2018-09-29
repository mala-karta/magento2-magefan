<?php

namespace Irene\MediaLab\ViewModel;

class Index implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    public function getHelloMessage()
    {

        return '<b>Hello</b> World in ViewModel!';
    }
}