<?php

class VisualFrames_NewProducts_Model_Mysql4_NewProducts extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the newproducts_id refers to the key field in your database table.
        $this->_init('newproducts/newproducts', 'newproducts_id');
    }
}