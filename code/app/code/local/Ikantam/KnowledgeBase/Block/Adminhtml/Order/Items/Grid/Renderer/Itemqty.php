<?php
/**
 * @category    Graphic Sourcecode
 * @package     Ikantam_KnowledgeBase
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 * @author      Rodolphe Franceschi <rodolphe.franceschi@gmail.com>
 */
class Ikantam_KnowledgeBase_Block_Adminhtml_Order_Items_Grid_Renderer_Itemqty
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $value =  $row->getData($this->getColumn()->getIndex());

        if ((float) $value) {
            $html = $value*1;
        } else {
            $html = $value;
        }

        $html = strval(intval($value));
        return $html;
    }
}