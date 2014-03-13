<?php
/**
 * @category    Graphic Sourcecode
 * @package     Rofra_Salesorderitemgrid
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 * @author      Rodolphe Franceschi <rodolphe.franceschi@gmail.com>
 */

/* @var $installer Mage_Sales_Model_Resource_Setup */
$installer = new Mage_Sales_Model_Resource_Setup('core_setup');
/**
 * Add 'custom_attribute' attribute for entities
*/
$entities = array(
        'order_item'
);

// Add VARCHAR attributes
$options = array(
        'type'     => Varien_Db_Ddl_Table::TYPE_VARCHAR,
        'visible'  => true,
        'required' => false
);

foreach ($entities as $entity) {
    $installer->addAttribute($entity, Rofra_Salesorderitemgrid_Helper_Attributes::COLUMN1, $options);
    $installer->addAttribute($entity, Rofra_Salesorderitemgrid_Helper_Attributes::COLUMN2, $options);
    $installer->addAttribute($entity, Rofra_Salesorderitemgrid_Helper_Attributes::COLUMN3, $options);
}


$installer->endSetup();
