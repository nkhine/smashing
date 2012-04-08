<?php

class VisualFrames_NewProducts_Block_Adminhtml_NewProducts_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('newproducts_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('newproducts')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('newproducts')->__('Item Information'),
          'title'     => Mage::helper('newproducts')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('newproducts/adminhtml_newproducts_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}