<?php

class VisualFrames_FeaturedProducts_Block_Adminhtml_FeaturedProducts_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('featuredproducts_form', array('legend'=>Mage::helper('featuredproducts')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('featuredproducts')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('featuredproducts')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('featuredproducts')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('featuredproducts')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('featuredproducts')->__('Content'),
          'title'     => Mage::helper('featuredproducts')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getFeaturedProductsData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getFeaturedProductsData());
          Mage::getSingleton('adminhtml/session')->setFeaturedProductsData(null);
      } elseif ( Mage::registry('featuredproducts_data') ) {
          $form->setValues(Mage::registry('featuredproducts_data')->getData());
      }
      return parent::_prepareForm();
  }
}