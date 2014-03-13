<?php
/**
 * @category    Graphic Sourcecode
 * @package     Rofra_Salesorderitemgrid
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 * @author      Rodolphe Franceschi <rodolphe.franceschi@gmail.com>
 */
class Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'salesorderitemgrid';
        $this->_controller = 'adminhtml_order_items';
        $this->_headerText = Mage::helper('salesorderitemgrid')->__('Order Items');

        parent::__construct();
        $this->_removeButton('add');
    }
}