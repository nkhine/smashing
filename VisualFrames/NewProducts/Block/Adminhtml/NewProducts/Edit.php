<?php

class VisualFrames_NewProducts_Block_Adminhtml_NewProducts_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'newproducts';
        $this->_controller = 'adminhtml_newproducts';
        
        $this->_updateButton('save', 'label', Mage::helper('newproducts')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('newproducts')->__('Delete Item'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('newproducts_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'newproducts_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'newproducts_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('newproducts_data') && Mage::registry('newproducts_data')->getId() ) {
            return Mage::helper('newproducts')->__("Edit Item '%s'", $this->htmlEscape(Mage::registry('newproducts_data')->getTitle()));
        } else {
            return Mage::helper('newproducts')->__('Add Item');
        }
    }
}