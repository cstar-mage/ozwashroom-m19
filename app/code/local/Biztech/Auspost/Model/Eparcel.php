<?php

class Biztech_Auspost_Model_Eparcel extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('auspost/eparcel');
    }
}