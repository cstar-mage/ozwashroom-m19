<?php
class Biztech_Auspost_Model_Carrier_Eparcel
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{
    /**
     * @var string
     */
    protected $_code = 'eparcel';

    /**
     * @var string
     */
    protected $_default_condition_name = 'package_weight';

    protected $_conditionNames = array();

    public function __construct()
    {
        parent::__construct();
        foreach ($this->getCode('condition_name') as $k=>$v) {
            $this->_conditionNames[] = $k;
        }
    }
    
    public function getFinalWeight($request){
        $deadWeight = $request->getPackageWeight();
        if($request['dest_country_id']=="AU"){
            $items = $request->getAllItems();
            $volumetricWeight = 0;
            foreach($items as $_item){
                $l= $_item->getProduct()->getLength();
                $h= $_item->getProduct()->getHeight();
                $w = $_item->getProduct()->getWidth();
                // Convert Dimentional attribte from cm - m
                $volumeInMeter = ($l * $h * $w)/1000000;
                
                //Get Volumetric weight
                $volumetricWeight =  $volumeInMeter * 250;
            }
            
            if($volumetricWeight > $deadWeight){
                return $volumetricWeight;
            }
        }
        return $deadWeight;
        
    }
    
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }

        if (!$request->getConditionName()) {
            $request->setConditionName($this->getConfigData('condition_name') ? $this->getConfigData('condition_name') : $this->_default_condition_name);
        }
        
        $weight = $this->getFinalWeight($request);
        
        $request->setPackageWeight($weight);

        $result = Mage::getModel('shipping/rate_result');
        $rates = $this->getRate($request);

        if (is_array($rates)) {
            foreach ($rates as $rate) {
                if (!empty($rate) && $rate['price'] >= 0) {
                    /** @var Mage_Shipping_Model_Rate_Result_Method $method */
                    $method = Mage::getModel('shipping/rate_result_method');

                    $method->setCarrier('eparcel');
                    $method->setCarrierTitle($this->getConfigData('title'));
                    
                   /* if ($this->_getChargeCode($rate)) {
                        $_method = strtolower(str_replace(' ', '_', $this->_getChargeCode($rate)));
                    } else {
                        $_method = strtolower(str_replace(' ', '_', $rate['delivery_type']));
                    }*/
                    
                    $_method = strtolower(str_replace(' ', '_', $rate['delivery_type']));
                    $method->setMethod($_method);
                    if ($this->getConfigData('carriers/eparcel/name')) {
                        $method->setMethodTitle($this->getConfigData('carriers/eparcel/name'));
                    } else {
                        $method->setMethodTitle($rate['delivery_type']);
                    }

                    /*$method->setMethodChargeCodeIndividual($rate['charge_code_individual']);
                    $method->setMethodChargeCodeBusiness($rate['charge_code_business']);*/

                    $shippingPrice = $this->getFinalPriceWithHandlingFee($rate['price']);

                    $method->setPrice($shippingPrice);
                    $method->setCost($rate['cost']);
                    $method->setDeliveryType($rate['delivery_type']);

                    $result->append($method);
                }
            }
        } else {
            if (!empty($rates) && $rates['price'] >= 0) {
                $method = Mage::getModel('shipping/rate_result_method');

                $method->setCarrier('eparcel');
                $method->setCarrierTitle($this->getConfigData('title'));

                $method->setMethod('bestway');
                $method->setMethodTitle($this->getConfigData('name'));

                /*$method->setMethodChargeCodeIndividual($rates['charge_code_individual']);
                $method->setMethodChargeCodeBusiness($rates['charge_code_business']);*/

                $shippingPrice = $this->getFinalPriceWithHandlingFee($rates['price']);

                $method->setPrice($shippingPrice);
                $method->setCost($rates['cost']);
                $method->setDeliveryType($rates['delivery_type']);

                $result->append($method);
            }
        }

        return $result;
    }

    

    public function getRate(Mage_Shipping_Model_Rate_Request $request)
    {
        return Mage::getResourceModel('auspost/eparcel')->getRate($request);
    }

    public function getCode($type, $code = '')
    {
        $helper = Mage::helper('shipping');
        $codes = array(
            'condition_name' => array(
                'package_weight' => $helper->__('Weight vs. Destination'),
                'package_value'  => $helper->__('Price vs. Destination'),
                'package_qty'    => $helper->__('# of Items vs. Destination'),
            ),
            'condition_name_short' => array(
                'package_weight' => $helper->__('Weight (and above)'),
                'package_value'  => $helper->__('Order Subtotal (and above)'),
                'package_qty'    => $helper->__('# of Items (and above)'),
            ),
        );

        if (!isset($codes[$type])) {
            throw Mage::exception('Mage_Shipping', $helper->__('Invalid Table Rate code type: %s', $type));
        }

        if ('' === $code) {
            return $codes[$type];
        }

        if (!isset($codes[$type][$code])) {
            throw Mage::exception('Mage_Shipping', $helper->__('Invalid Table Rate code for type %s: %s', $type, $code));
        }
        
        return $codes[$type][$code];
    }

    /**
     * Get allowed shipping methods
     *
     * @return array
     */
    public function getAllowedMethods()
    {
        return array('bestway' => $this->getConfigData('name'));
    }
}
