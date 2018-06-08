<?php
class Biztech_Auspost_Model_Config_Source_Eparcel_Import extends Mage_Core_Model_Config_Data
{
    public function _afterSave()
    {
        Mage::getResourceModel('auspost/eparcel')->uploadAndImport($this);
    }
}
