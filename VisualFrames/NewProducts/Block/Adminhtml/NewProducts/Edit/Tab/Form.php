<?php

class VisualFrames_NewProducts_Block_Adminhtml_NewProducts_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('newproducts_form', array('legend'=>Mage::helper('newproducts')->__('Item information')));
     
      $fieldset->addField('title', 'text', array(
          'label'     => Mage::helper('newproducts')->__('Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'title',
      ));

      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('newproducts')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('newproducts')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('newproducts')->__('Disabled'),
              ),
          ),
      ));
     
      $fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('newproducts')->__('Content'),
          'title'     => Mage::helper('newproducts')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));
     
      if ( Mage::getSingleton('adminhtml/session')->getNewProductsData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getNewProductsData());
          Mage::getSingleton('adminhtml/session')->setNewProductsData(null);
      } elseif ( Mage::registry('newproducts_data') ) {
          $form->setValues(Mage::registry('newproducts_data')->getData());
      }
      return parent::_prepareForm();
  }
}