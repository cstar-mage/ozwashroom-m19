<?php
// app/code/local/Best4Store/Customshippingmethod/Model
class Best4Store_Customshippingmethod_Model_Demo
extends Mage_Shipping_Model_Carrier_Abstract
implements Mage_Shipping_Model_Carrier_Interface
{
  protected $_code = 'best4store_customshippingmethod';
 
  public function collectRates(Mage_Shipping_Model_Rate_Request $request)
  {
    $result = Mage::getModel('shipping/rate_result');
    $result->append($this->_getDefaultRate());
 
    return $result;
  }
 
  public function getAllowedMethods()
  {
    return array(
      'best4store_customshippingmethod' => $this->getConfigData('name'),
    );
  }
 

  protected function _getDefaultRate()
  {
    $rate = Mage::getModel('shipping/rate_result_method');
     
    $rate->setCarrier($this->_code);
    $rate->setCarrierTitle($this->getConfigData('title'));
    $rate->setMethod($this->_code);
    $rate->setMethodTitle($this->getConfigData('name'));	
    //Get 10% subtotal for shipping cost	
	$totals = Mage::getSingleton('checkout/session')->getQuote()->getTotals();
    $subtotal = $totals["subtotal"]->getValue();

	$plus_10 = $subtotal * 0.1;
    $rate->setPrice(($this->getConfigData('price')) + $plus_10);
    $rate->setCost(0);
     
    return $rate;
  }
}