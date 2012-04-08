<?php

class VisualFrames_NewProducts_Model_Mysql4_NewProducts_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('newproducts/newproducts');
    }
}