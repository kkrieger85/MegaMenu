<?php

class TheExtensionLab_MegaMenu_Adminhtml_Menu_Catalog_Product_WidgetController
    extends Mage_Adminhtml_Controller_Action
{
    public function chooserAction()
    {
        $this->loadLayout();

        $this->getLayout()->getBlock('root')->append($this->_initGrid());

        $serializer = $this->getLayout()->createBlock('adminhtml/widget_grid_serializer', 'megamenu_featured_products_grid_serializer')
            ->setTemplate('theextensionlab/megamenu/widget/grid/json/serializer.phtml')
        ;
        $serializer->initSerializerBlock(
            'adminhtml.megamenu.catalog.product.widget.grid',
            'getSelectedProducts',
            'megamenu_featured_products',
            'selected_products'
        );
        $serializer->addColumnInputName(
            array(
                'in_products',
                'position'
            )
        );

        $this->getLayout()->getBlock('root')->append($serializer);

        $this->renderLayout();
    }

    public function chooserGridOnlyAction()
    {
        $this->loadLayout();
        $this->getLayout()->getBlock('root')->append($this->_initGrid());
        $this->renderLayout();
    }

    private function _initGrid()
    {
        $uniqId = $this->getRequest()->getParam('uniq_id');
        $prevValue = $this->getRequest()->getParam('prev_value');

        $grid = $this->getLayout()->createBlock(
            'theextensionlab_megamenu/adminhtml_catalog_product_widget_chooser',
            'adminhtml.megamenu.catalog.product.widget.grid', array(
                'id'         => $uniqId,
                'prev_value' => $prevValue
            )
        );

        return $grid;
    }
}