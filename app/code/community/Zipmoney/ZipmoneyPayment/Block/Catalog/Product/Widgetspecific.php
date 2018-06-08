<?php

class Zipmoney_ZipmoneyPayment_Block_Catalog_Product_Widgetspecific extends Zipmoney_ZipmoneyPayment_Block_Catalog_Product_Abstract
{
    protected $_design      = 'specific';
    protected $_position    = 'price';

    public function __construct()
    {
        parent::__construct();
        $this->_asset_type = Zipmoney_ZipmoneyPayment_Helper_Widget::WIDGET_ASSET_TYPE_PRODUCT;

        if ($this->_isZipMoneyPaymentActive()) {
            if ($this->_isShowExpressButton($this->_design, $this->_position)) {
                if ($this->_isAllowedToCheckout()) {
                    $this->setTemplate('zipmoney/zipmoneypayment/catalog/product/view/expresspayment.phtml');
                } else {
                    $this->setTemplate('zipmoney/zipmoneypayment/widget/productgeneral.phtml');
                }
            } else if ($this->_isWidgetProductActive()){
                $this->setTemplate('zipmoney/zipmoneypayment/widget/productgeneral.phtml');
            }
        }
    }

    public function isShow()
    {
        return $this->isShowBasedOnConditions($this->_design, $this->_position);
    }
}
