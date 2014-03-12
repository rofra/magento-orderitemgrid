<?php
/**
 * @category    Graphic Sourcecode
 * @package     Rofra_Salesorderitemgrid
 * @license     http://opensource.org/licenses/OSL-3.0
 * @author      Rodolphe Franceschi <rodolphe.franceschi@gmail.com>
 */
class Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_InputInline
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Input
{
    public function render(Varien_Object $row)
    {
        $html = '<input type="text" ';
        $html .= 'name="' . $this->getColumn()->getId() . '" ';
        $html .= 'value="' . $this->htmlEscape($row->getData($this->getColumn()->getIndex())) . '" ';
        $html .= 'class="input-text ' . $this->getColumn()->getInlineCss() . '" onchange="updateTextualField(this, '. $row->getId() .'); return false;"/>';

//         $html = parent::render($row);
//         $html .= '<button onclick="updateField(this, '. $row->getId() .'); return false">' . Mage::helper('salesorderitemgrid')->__('Update field') . '</button>';

        return $html;
    }
}