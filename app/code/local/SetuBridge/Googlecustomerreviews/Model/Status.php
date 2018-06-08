<?php 
 /**
 * Setubridge Technolabs
 * http://www.setubridge.com/
 * @author SetuBridge
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
**/
class SetuBridge_Googlecustomerreviews_Model_Status extends Varien_Object
{
    const STATUS_ENABLED	= 1;
    const STATUS_DISABLED	= 2;

    static public function getOptionArray()
    {
        return array(
            self::STATUS_ENABLED    => Mage::helper('googlecustomerreviews')->__('Enabled'),
            self::STATUS_DISABLED   => Mage::helper('googlecustomerreviews')->__('Disabled')
        );
    }
}