<?php 
 /**
 * Setubridge Technolabs
 * http://www.setubridge.com/
 * @author SetuBridge
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 **/
class SetuBridge_Googlecustomerreviews_Model_System_Config_Source_Badge
{

    /**
    * Options getter
    *
    * @return array
    */
    public function toOptionArray()
    {     
        $badge = array(
           array('value' => 'BOTTOM_RIGHT', 'label' => Mage::helper('googlecustomerreviews')->__('Bottom Right')),
           array('value' => 'BOTTOM_LEFT', 'label' => Mage::helper('googlecustomerreviews')->__('Bottom left')),
           array('value' => 'INLINE', 'label' => Mage::helper('googlecustomerreviews')->__('Inline')),
       );
 
    return $badge;
    }
}
