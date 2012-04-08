<?php

class VisualFrames_FeaturedProducts_Model_Mysql4_FeaturedProducts_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('featuredproducts/featuredproducts');
    }
}