<?php 
 /**
 * Setubridge Technolabs
 * http://www.setubridge.com/
 * @author SetuBridge
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 **/
class SetuBridge_Googlecustomerreviews_Model_System_Config_Source_DialogBox
{

    /**
    * Options getter
    *
    * @return array
    */
    public function toOptionArray()
    {     
        $dialogbox = array(
           array('value' => 'CENTER_DIALOG', 'label' => Mage::helper('googlecustomerreviews')->__('Center')),
           array('value' => 'BOTTOM_RIGHT_DIALOG', 'label' => Mage::helper('googlecustomerreviews')->__('Bottom Right')),
           array('value' => 'BOTTOM_LEFT_DIALOG', 'label' => Mage::helper('googlecustomerreviews')->__('Bottom Left')),
		   array('value' => 'TOP_RIGHT_DIALOG', 'label' => Mage::helper('googlecustomerreviews')->__('Top Right')),
           array('value' => 'TOP_LEFT_DIALOG', 'label' => Mage::helper('googlecustomerreviews')->__('Top Left')),
		   array('value' => 'BOTTOM_TRAY', 'label' => Mage::helper('googlecustomerreviews')->__('Bottom')),
		   
       );
 
    return $dialogbox;
    }
}
