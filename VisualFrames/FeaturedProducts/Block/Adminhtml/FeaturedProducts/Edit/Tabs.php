<?php

class VisualFrames_FeaturedProducts_Block_Adminhtml_FeaturedProducts_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('featuredproducts_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('featuredproducts')->__('Item Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('featuredproducts')->__('Item Information'),
          'title'     => Mage::helper('featuredproducts')->__('Item Information'),
          'content'   => $this->getLayout()->createBlock('featuredproducts/adminhtml_featuredproducts_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}