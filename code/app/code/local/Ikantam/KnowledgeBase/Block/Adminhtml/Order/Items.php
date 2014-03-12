<?php
/**
 * @category    Graphic Sourcecode
 * @package     Ikantam_KnowledgeBase
 * @license     http://opensource.org/licenses/OSL-3.0
 * @author      Rodolphe Franceschi <rodolphe.franceschi@gmail.com>
 */
class Ikantam_KnowledgeBase_Block_Adminhtml_Order_Items extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'ikantamknowledgebase';
        $this->_controller = 'adminhtml_order_items';
        $this->_headerText = Mage::helper('ikantamknowledgebase')->__('Order Items');

        parent::__construct();
        $this->_removeButton('add');
    }
}