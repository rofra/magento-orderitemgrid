<?php
/**
 * @category    Graphic Sourcecode
 * @package     Rofra_Salesorderitemgrid
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 * @author      Rodolphe Franceschi <rodolphe.franceschi@gmail.com>
 */
class Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_TextareaInline
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Input
{
    public function render(Varien_Object $row)
    {
        $html = '<textarea rows="4" ';
        $html .= 'name="' . $this->getColumn()->getId() . '" ';
        $html .= 'class="' . $this->getColumn()->getInlineCss() . '" onchange="updateTextualField(this, '. $row->getId() .'); return false;">' . $this->htmlEscape($row->getData($this->getColumn()->getIndex()))  . '</textarea> ';
        return $html;
    }
}