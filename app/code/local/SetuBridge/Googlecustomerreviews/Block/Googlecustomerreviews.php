<?php 
 /**
 * Setubridge Technolabs
 * http://www.setubridge.com/
 * @author SetuBridge
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
**/
class SetuBridge_Googlecustomerreviews_Block_Googlecustomerreviews extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
		return parent::_prepareLayout();
    }
    
     public function getGooglecustomerreviews()     
     { 
        if (!$this->hasData('googlecustomerreviews')) {
            $this->setData('googlecustomerreviews', Mage::registry('googlecustomerreviews'));
        }
        return $this->getData('googlecustomerreviews');
        
    }
}