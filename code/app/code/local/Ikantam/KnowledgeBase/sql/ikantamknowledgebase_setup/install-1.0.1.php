<?php
/**
 * @category    Graphic Sourcecode
 * @package     Ikantam_KnowledgeBase
 * @license     http://opensource.org/licenses/OSL-3.0
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
    $installer->addAttribute($entity, Ikantam_KnowledgeBase_Helper_Attributes::COLUMN1, $options);
    $installer->addAttribute($entity, Ikantam_KnowledgeBase_Helper_Attributes::COLUMN2, $options);
    $installer->addAttribute($entity, Ikantam_KnowledgeBase_Helper_Attributes::COLUMN3, $options);
}


$installer->endSetup();
