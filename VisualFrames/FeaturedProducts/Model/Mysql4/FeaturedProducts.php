<?php

class VisualFrames_FeaturedProducts_Model_Mysql4_FeaturedProducts extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the featuredproducts_id refers to the key field in your database table.
        $this->_init('featuredproducts/featuredproducts', 'featuredproducts_id');
    }
}