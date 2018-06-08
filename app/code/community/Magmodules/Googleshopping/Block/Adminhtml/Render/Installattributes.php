<?php
/**
 * Magmodules.eu - http://www.magmodules.eu - info@magmodules.eu
 * =============================================================
 * NOTICE OF LICENSE [Single domain license]
 * This source file is subject to the EULA that is
 * available through the world-wide-web at:
 * http://www.magmodules.eu/license-agreement/
 * =============================================================
 * @category    Magmodules
 * @package     Magmodules_Googleshopping
 * @author      Magmodules <info@magmodules.eu>
 * @copyright   Copyright (c) 2015 (http://www.magmodules.eu)
 * @license     http://www.magmodules.eu/license-agreement/  
 * =============================================================
 */
 
class Magmodules_Googleshopping_Block_Adminhtml_Render_Installattributes extends Mage_Adminhtml_Block_System_Config_Form_Field {
 
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
		$url = $this->getUrl('*/attribute/installAttributes');
		$button_title = 'Install Attributes';
        $this->setElement($element);
        $html = $this->getLayout()->createBlock('adminhtml/widget_button')
                    ->setType('button')
                    ->setClass('scalable')
                    ->setLabel($button_title)
                    ->setOnClick("setLocation('$url')")
                    ->toHtml();

        return $html;
    }
    
}