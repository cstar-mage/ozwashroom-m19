<?php
class Biztech_Auspost_Model_Shipping_Config_Weightunits
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        $helper = Mage::helper('adminhtml');
        return array(
            array(
                'value' => 1000,
                'label' => $helper->__('Kilograms (kg)')
            ),
            array(
                'value' => 1,
                'label' => $helper->__('Grams (g)')
            ),
            array(
                'value' => 453.59,
                'label' => $helper->__('Pounds (lb)')
            ),
            array(
                'value' => 28.35,
                'label' => $helper->__('Ounces (oz)')
            ),
        );
    }
}
