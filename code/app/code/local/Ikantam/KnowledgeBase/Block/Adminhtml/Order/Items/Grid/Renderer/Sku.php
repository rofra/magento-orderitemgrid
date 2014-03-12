<?php
/**
 * @category    Graphic Sourcecode
 * @package     Ikantam_KnowledgeBase
 * @license     http://opensource.org/licenses/OSL-3.0
 * @author      Rodolphe Franceschi <rodolphe.franceschi@gmail.com>
 */
class Ikantam_KnowledgeBase_Block_Adminhtml_Order_Items_Grid_Renderer_Sku
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $value = $row->getData('product_id');
        $html ='<a href="' . $this->getUrl('adminhtml/catalog_product/edit', array('id' => $value, 'key' => $this->getCacheKey())) . '" target="_blank" title="' . $value . '" > ' . $row->getData('sku') . ' </a>';
        return $html;
    }
}