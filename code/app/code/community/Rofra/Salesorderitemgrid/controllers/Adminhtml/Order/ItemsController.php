<?php
/**
 * @category    Graphic Sourcecode
 * @package     Rofra_Salesorderitemgrid
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 * @author      Rodolphe Franceschi <rodolphe.franceschi@gmail.com>
 */
class Rofra_Salesorderitemgrid_Adminhtml_Order_ItemsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('sales/order_items');
        $this->_addContent($this->getLayout()->createBlock('salesorderitemgrid/adminhtml_order_items', 'order.item.grid'));
        $this->getLayout()->getBlock('head')->setTitle($this->__('Order Items'));
        $this->renderLayout();
    }

    public function ajaxUpdateFieldAction()
    {
        $fieldId = (int) $this->getRequest()->getParam('id');
        $title = $this->getRequest()->getParam('title');
        $attributeName = $this->getRequest()->getParam('attr');
        if ($fieldId && $attributeName) {
            $model = Mage::getModel('sales/order_item')->load($fieldId);
            $model->setData($attributeName, $title);
            $model->save();
        }
    }


    /**
     * Export product grid to CSV format
     */
    public function exportCsvAction()
    {
        $fileName   = 'sales_order_items.csv';
        $content    = $this->getLayout()->createBlock('salesorderitemgrid/adminhtml_order_items_grid')->getCsv();

        $this->_sendUploadResponse($fileName, $content);
    }

    /**
     * Export product grid to XML format
     */
    public function exportXmlAction()
    {
        $fileName   = 'sales_order_items.xml';
        $content    = $this->getLayout()->createBlock('salesorderitemgrid/adminhtml_order_items_grid')->getXml();

        $this->_sendUploadResponse($fileName, $content);
    }


    protected function _sendUploadResponse($fileName, $content, $contentType='application/octet-stream')
    {
        $response = $this->getResponse();
        $response->setHeader('HTTP/1.1 200 OK','');

        $response->setHeader('Pragma', 'public', true);
        $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true);

        $response->setHeader('Content-Disposition', 'attachment; filename='.$fileName);
        $response->setHeader('Last-Modified', date('r'));
        $response->setHeader('Accept-Ranges', 'bytes');
        $response->setHeader('Content-Length', strlen($content));
        $response->setHeader('Content-type', $contentType);
        $response->setBody($content);
    }
}
