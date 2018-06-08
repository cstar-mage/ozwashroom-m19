<?php

class Zipmoney_ZipmoneyPayment_Block_Checkout_Cart_RepaymentCalculator extends Mage_Catalog_Block_Product_Abstract
{
 

    public function _prepareLayout()
    {		
    	if( Mage::getStoreConfig(Zipmoney_ZipmoneyPayment_Model_Config::PAYMENT_WIDGET_CONFIGURATION_REP_CALC_ACTIVE_CART) )
    		$this->setTemplate('zipmoney/zipmoneypayment/catalog/product/view/rep-calculator.phtml');
        
    }


    public function getRepayments()
    {	
    	
    	if($quote = Mage::getModel('checkout/cart')->getQuote()) 
    		$amount = $quote->getGrandTotal();
    	    		
    	return Mage::helper('zipmoneypayment')->getRepayments($amount);
    }
    
}
