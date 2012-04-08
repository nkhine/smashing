<?php
class VisualFrames_FeaturedProducts_Block_FeaturedProducts extends Mage_Core_Block_Template
{
    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('featuredproducts/featuredproducts.phtml');
    }
}