<?php
/**
 * @category    Graphic Sourcecode
 * @package     Rofra_Salesorderitemgrid
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 * @author      Rodolphe Franceschi <rodolphe.franceschi@gmail.com>
 */
class Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_Order
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $value = $row->getData($this->getColumn()->getIndex());
        $html ='<a href="' . $this->getUrl('adminhtml/sales_order/view', array('order_id' => $row->getData('order_id'), 'key' => $this->getCacheKey())) . '" target="_blank" title="' . $value . '" >' . $row->getData($this->getColumn()->getIndex()) . '</a>';
        return $html;
    }
}