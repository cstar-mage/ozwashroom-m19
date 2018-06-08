<?php
class Netsolutions_Offlineordertrack_Model_System_Config_Source_View 
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 1, 'label' => Mage::helper('adminhtml')->__('Email Address')),
            array('value' => 2, 'label' => Mage::helper('adminhtml')->__('Zipcode')),
            array('value' => 3, 'label' => Mage::helper('adminhtml')->__('Phone Number')),
        );
    } 
}
