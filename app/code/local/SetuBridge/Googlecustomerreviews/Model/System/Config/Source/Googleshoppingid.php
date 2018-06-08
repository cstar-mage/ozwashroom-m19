<?php 
 /**
 * Setubridge Technolabs
 * http://www.setubridge.com/
 * @author SetuBridge
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 **/
class SetuBridge_Googlecustomerreviews_Model_System_Config_Source_Googleshoppingid
{
    /**
    * Options getter
    *
    * @return array
    */
    public function toOptionArray()
    {     
        $googleShoppingIds = array(
           array('value' => 'sku', 'label' => Mage::helper('googlecustomerreviews')->__('SKU')),
           array('value' => 'id', 'label' => Mage::helper('googlecustomerreviews')->__('ID')),
           array('value' => 'USER_DEFINED', 'label' => Mage::helper('googlecustomerreviews')->__('USER DEFINED')),
       );
 
    return $googleShoppingIds;
    }
}
