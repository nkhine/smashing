<?php
class VisualFrames_NewProducts_Block_Adminhtml_NewProducts extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_newproducts';
    $this->_blockGroup = 'newproducts';
    $this->_headerText = Mage::helper('newproducts')->__('Item Manager');
    $this->_addButtonLabel = Mage::helper('newproducts')->__('Add Item');
    parent::__construct();
  }
}