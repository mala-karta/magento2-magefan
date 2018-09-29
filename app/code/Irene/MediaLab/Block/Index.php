<?php
namespace Irene\MediaLab\Block;

use Magento\Framework\View\Element\Template as BlockTemplate;

class Index extends BlockTemplate
{
    public function getHelloMessage()
    {
        return 'Hello World in Block!';
    }

    public function getWelcomeText()
    {
        return 'Hello World (welcome Text) in Block!';
    }
}