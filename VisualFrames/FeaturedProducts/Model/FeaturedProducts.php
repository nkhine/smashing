<?php

class VisualFrames_FeaturedProducts_Model_FeaturedProducts extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('featuredproducts/featuredproducts');
    }
}