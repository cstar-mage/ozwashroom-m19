<?php

class Zipmoney_ZipmoneyPayment_Block_Catalog_Product_RepaymentCalculator extends Mage_Catalog_Block_Product_Abstract
{
 
    public function _prepareLayout()
    {		
    	if( Mage::getStoreConfig(Zipmoney_ZipmoneyPayment_Model_Config::PAYMENT_WIDGET_CONFIGURATION_REP_CALC_ACTIVE_PRODUCT) )
    		$this->setTemplate('zipmoney/zipmoneypayment/catalog/product/view/rep-calculator.phtml');
        
    }

    public function getRepayments()
    {	
    	
    	if($product = $this->getProduct())
    		$amount = (float)$this->getProduct()->getFinalPrice();

    	return Mage::helper('zipmoneypayment')->getRepayments($amount);
    }
    
}
