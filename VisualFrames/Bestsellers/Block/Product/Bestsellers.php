<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @copyright  Copyright (c) 2004-2007 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * New products block
 *
 * @category   Mage
 * @package    Mage_Catalog
 */
class VisualFrames_Bestsellers_Block_Product_Bestsellers extends Mage_Catalog_Block_Product_Abstract
{
    public function __construct()
    {
        parent::__construct();


		$productSize = 5; //  No Of Products Display in Frontend 
		
		
		$storeId    = Mage::app()->getStore()->getId();
		$sql = "SELECT f.product_id, f.qty_ordered  FROM sales_flat_order_item as f, sales_order as s WHERE s.entity_id = f.order_id and s.store_id = $storeId and f.parent_item_id is NULL";
		$data = Mage::getSingleton('core/resource') ->getConnection('core_read')->fetchAll($sql);
		$output = array();
		foreach($data as $d)
		{
			if(isset($output[$d['product_id']]))
				$output[$d['product_id']] += $d['qty_ordered'];
			else
				$output[$d['product_id']] = $d['qty_ordered'];		
		}
		arsort($output);
		$final = array_slice(array_keys($output),0,$productSize);
		$products = Mage::getModel('catalog/product')->getCollection();
		$products->addAttributeToSelect('*');
		$products->addAttributeToFilter('entity_id', array('in'=> $final));
		$products->load();
		
		Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);
		
		$this->setProductCollection($products);

    }
	
} 