<?php
class VisualFrames_NewProducts_Block_NewProducts extends Mage_Core_Block_Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('newproducts/newproducts.phtml');
    }
}