<?php 
 /**
 * Setubridge Technolabs
 * http://www.setubridge.com/
 * @author SetuBridge
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 **/
class SetuBridge_Googlecustomerreviews_Model_System_Config_Source_Googleallowlang
{
    /**
    * Options getter
    *
    * @return array
    */
    public function toOptionArray()
    {  
       $googleAllowLang = array(
            array('value' => 'cs', 'label' => Mage::helper('googlecustomerreviews')->__('Czech')),
            array('value' => 'da', 'label' => Mage::helper('googlecustomerreviews')->__('Danish')),
            array('value' => 'de', 'label' => Mage::helper('googlecustomerreviews')->__('German')),
            array('value' => 'en_AU', 'label' => Mage::helper('googlecustomerreviews')->__('English (Australia)')),
            array('value' => 'en_GB', 'label' => Mage::helper('googlecustomerreviews')->__('English (United Kingdom)')),
            array('value' => 'en_US', 'label' => Mage::helper('googlecustomerreviews')->__('English (United States)')),
            array('value' => 'es', 'label' => Mage::helper('googlecustomerreviews')->__('Spanish')),
            array('value' => 'fr', 'label' => Mage::helper('googlecustomerreviews')->__('French')),
            array('value' => 'it', 'label' => Mage::helper('googlecustomerreviews')->__('Italian')),
            array('value' => 'ja', 'label' => Mage::helper('googlecustomerreviews')->__('Japanese')),
            array('value' => 'nl', 'label' => Mage::helper('googlecustomerreviews')->__('Dutch')),
            array('value' => 'no', 'label' => Mage::helper('googlecustomerreviews')->__('Norwegian')),
            array('value' => 'pl', 'label' => Mage::helper('googlecustomerreviews')->__('Polish')),
            array('value' => 'pt_BR', 'label' => Mage::helper('googlecustomerreviews')->__('Bottom')),
            array('value' => 'ru', 'label' => Mage::helper('googlecustomerreviews')->__('Russian')),
            array('value' => 'sv', 'label' => Mage::helper('googlecustomerreviews')->__('Swedish')),
            array('value' => 'tr', 'label' => Mage::helper('googlecustomerreviews')->__('Turkish')),
            
            );

    return $googleAllowLang;
    }
}
