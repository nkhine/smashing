<?php

class VisualFrames_NewProducts_Block_Adminhtml_NewProducts_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('newproductsGrid');
      $this->setDefaultSort('newproducts_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('newproducts/newproducts')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('newproducts_id', array(
          'header'    => Mage::helper('newproducts')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'newproducts_id',
      ));

      $this->addColumn('title', array(
          'header'    => Mage::helper('newproducts')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('newproducts')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

	  $this->addColumn('created_time', array(
			'header'    => Mage::helper('newproducts')->__('Creation Time'),
			'align'     => 'left',
			'width'     => '120px',
			'type'      => 'date',
			'default'   => '--',
			'index'     => 'created_time',
	  ));

	  $this->addColumn('update_time', array(
			'header'    => Mage::helper('newproducts')->__('Update Time'),
			'align'     => 'left',
			'width'     => '120px',
			'type'      => 'date',
			'default'   => '--',
			'index'     => 'update_time',
	  ));

      $this->addColumn('status', array(
          'header'    => Mage::helper('newproducts')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('newproducts')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('newproducts')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('newproducts')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('newproducts')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('newproducts_id');
        $this->getMassactionBlock()->setFormFieldName('newproducts');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('newproducts')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('newproducts')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('newproducts/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('newproducts')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('newproducts')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}