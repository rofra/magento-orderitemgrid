<?php
/**
 * @category    Graphic Sourcecode
 * @package     Rofra_Salesorderitemgrid
 * @license     http://www.apache.org/licenses/LICENSE-2.0
 * @author      Rodolphe Franceschi <rodolphe.franceschi@gmail.com>
 */
class Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('order_items');
        $this->setDefaultSort('item_id');
        $this->prepareDefaults();
    }

    protected function prepareDefaults()
    {
        $this->setDefaultLimit( Mage::getStoreConfig( 'salesorderitemgrid/defaults/limit' ) );
        $this->setDefaultPage( Mage::getStoreConfig( 'salesorderitemgrid/defaults/page' ) );
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('sales/order_item')->getCollection();
        $collection->join(array('og' =>'sales/order_grid'), 'main_table.order_id = og.entity_id', array('billing_name', 'shipping_name', 'increment_id', 'status', 'og_created_at' =>'og.created_at') );

        // One line per entry (configurable / simple management)
        $collection->addAttributeToFilter('parent_item_id', array('is' => new Zend_Db_Expr('null')));

        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }


    protected function _prepareColumns()
    {
        $this->addColumn('item_id', array(
                'header' => Mage::helper('salesorderitemgrid')->__('ID'),
                'sortable' => true,
                'width' => '60',
                'index' => 'item_id'
        ));

        $this->addColumn('incremental_id', array(
                'header' => Mage::helper('sales')->__('Order #'),
                'sortable' => true,
                'width' => '60',
                'index' => 'increment_id',
                'renderer' => 'Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_Order',
        ));

        if (Mage::getStoreConfig('salesorderitemgrid/columns/showsstatus')) {
            $this->addColumn('status', array(
                    'header' => Mage::helper('sales')->__('Order Status'),
                    'index' => 'status',
                    'filter_index' => 'status',
                    'type'  => 'options',
                    'width' => '70px',
                    'options' => Mage::getSingleton('sales/order_config')->getStatuses(),
            ));
        }

        $this->addColumn('created_at', array(
                'header' => Mage::helper('sales')->__('Purchased On'),
                'sortable' => true,
                'width' => '60',
                'index' => 'og_created_at',
                'filter_index' => 'og.created_at',
                'type'  => 'datetime'
        ));

        if (Mage::getStoreConfig('salesorderitemgrid/columns/showbillingname')) {
            $this->addColumn('billing_name', array(
                    'header' => Mage::helper('sales')->__('Bill to Name'),
                    'sortable' => true,
                    'index' => 'billing_name'
            ));
        }

        if (Mage::getStoreConfig('salesorderitemgrid/columns/showshippingname')) {
            $this->addColumn('shipping_name', array(
                    'header' => Mage::helper('sales')->__('Ship to Name'),
                    'sortable' => true,
                    'index' => 'shipping_name'
            ));
        }

        $this->addColumn('sku', array(
                'header' => Mage::helper('salesorderitemgrid')->__('SKU'),
                'sortable' => true,
                'index' => 'sku',
                'renderer' => 'Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_Sku',
        ));

        $this->addColumn('name', array(
                'header' => Mage::helper('catalog')->__('Name'),
                'sortable' => true,
                'index' => 'name'
        ));

        if (Mage::getStoreConfig('salesorderitemgrid/columns/showqtyordered')) {
            $this->addColumn('qty_ordered', array(
                    'header'   => Mage::helper('salesorderitemgrid')->__('Qty Ordered'),
                    'sortable' => true,
                    'index'    => 'qty_ordered',
                    'type'     => 'currency',
                    'renderer' => 'Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_Itemqty',
            ));
        }

        if (Mage::getStoreConfig('salesorderitemgrid/columns/showqtylive')) {
            $this->addColumn('si_qty', array(
                    'header'   => Mage::helper('salesorderitemgrid')->__('Qty Live'),
                    'sortable' => true,
                    'index'    => 'si_qty',
                    'type'     => 'currency',
                    'renderer' => 'Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_Itemqty',
            ));
        }

        if (Mage::getStoreConfig('salesorderitemgrid/columns/showqtycancelled')) {
            $this->addColumn('qty_canceled', array(
                    'header'   => Mage::helper('salesorderitemgrid')->__('Qty Cancelled'),
                    'sortable' => true,
                    'index'    => 'qty_canceled',
                    'type'     => 'currency',
                    'renderer' => 'Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_Itemqty',
            ));
        }

        if (Mage::getStoreConfig('salesorderitemgrid/columns/showqtyshipped')) {
            $this->addColumn('qty_shipped', array(
                    'header'   => Mage::helper('salesorderitemgrid')->__('Qty Shipped'),
                    'sortable' => true,
                    'index'    => 'qty_shipped',
                    'type'     => 'currency',
                    'renderer' => 'Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_Itemqty',
            ));
        }

        if (Mage::getStoreConfig('salesorderitemgrid/columns/showqtyrefounded')) {
            $this->addColumn('qty_refunded', array(
                    'header'   => Mage::helper('salesorderitemgrid')->__('Qty Refunded'),
                    'sortable' => true,
                    'index'    => 'qty_refunded',
                    'type'     => 'currency',
                    'renderer' => 'Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_Itemqty',
            ));
        }

        if (Mage::getStoreConfig('salesorderitemgrid/columns/showqtybackordered')) {
            $this->addColumn('qty_backordered', array(
                    'header'   => Mage::helper('salesorderitemgrid')->__('Qty Backordered'),
                    'sortable' => true,
                    'index'    => 'qty_backordered',
                    'type'     => 'currency',
                    'renderer' => 'Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_Itemqty',
            ));
        }

        if (Mage::getStoreConfig('salesorderitemgrid/extracolumns/showextracolumn1')) {
            $this->addColumn('column1', array(
                    'header'    => Mage::helper('salesorderitemgrid')->__('Column 1'),
                    'align'     => 'center',
                    'sortable'  => true,
                    'renderer'  => 'Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_InputInline',
                    'index'     => 'column1',
            ));
        }

        if (Mage::getStoreConfig('salesorderitemgrid/extracolumns/showextracolumn2')) {
            $this->addColumn('column2', array(
                    'header'     => Mage::helper('salesorderitemgrid')->__('Column 2'),
                    'align'      => 'center',
                    'sortable'   => true,
                    'renderer'   => 'Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_InputInline',
                    'index'      => 'column2'
            ));
        }

        if (Mage::getStoreConfig('salesorderitemgrid/extracolumns/showextracolumn3')) {
            $this->addColumn('column3', array(
                    'header'   => Mage::helper('salesorderitemgrid')->__('Column 3'),
                    'align'    => 'center',
                    'sortable' => true,
                    'renderer' => 'Rofra_Salesorderitemgrid_Block_Adminhtml_Order_Items_Grid_Renderer_TextareaInline',
                    'index'    => 'column3'
            ));
        }


        // SPECIAL COLUMNS
        $this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV'));
        $this->addExportType('*/*/exportXml', Mage::helper('sales')->__('XML'));

        return parent::_prepareColumns();
    }


}