<?php 
 /**
 * Setubridge Technolabs
 * http://www.setubridge.com/
 * @author SetuBridge
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 **/
class SetuBridge_Googlecustomerreviews_Model_System_Config_Source_Googleallowcountry
{
    /**
    * Options getter
    *
    * @return array
    */
    public function toOptionArray()
    {     
        $googleAllowCountry = array(
           array('value' => 'AU', 'label' => Mage::helper('googlecustomerreviews')->__('Australia')),
           array('value' => 'US', 'label' => Mage::helper('googlecustomerreviews')->__('United State')),
           array('value' => 'JP', 'label' => Mage::helper('googlecustomerreviews')->__('Japan')),
           array('value' => 'FR', 'label' => Mage::helper('googlecustomerreviews')->__('France')),
           array('value' => 'DE', 'label' => Mage::helper('googlecustomerreviews')->__('Germany')),
           array('value' => 'GB', 'label' => Mage::helper('googlecustomerreviews')->__('United Kingdom')),
       );
 
    return $googleAllowCountry;
    }
}
