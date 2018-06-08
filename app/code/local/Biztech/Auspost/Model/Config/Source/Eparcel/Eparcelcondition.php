<?php

class Biztech_Auspost_Model_Config_Source_Eparcel_Eparcelcondition
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 'package_weight', 'label' => Mage::helper('adminhtml')->__('Weight vs Destination')),
        );
    }
}
