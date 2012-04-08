<?php

class VisualFrames_NewProducts_Model_NewProducts extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('newproducts/newproducts');
    }
}