<?php
/**
 * @category    Graphic Sourcecode
 * @package     Rofra_Salesorderitemgrid
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 * @author      Rodolphe Franceschi <rodolphe.franceschi@gmail.com>
 */

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$setup->startSetup();

// Change the flags to filter / sort (for flat index)
$setup->run("
UPDATE sales_flat_order_item SET column1 = '';
UPDATE sales_flat_order_item SET column2 = '';
UPDATE sales_flat_order_item SET column3 = '';
");

$setup->endSetup();
