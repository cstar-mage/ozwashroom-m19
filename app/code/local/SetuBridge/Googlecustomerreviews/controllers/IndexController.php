<?php 
 /**
 * Setubridge Technolabs
 * http://www.setubridge.com/
 * @author SetuBridge
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
**/
class SetuBridge_Googlecustomerreviews_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
		$this->loadLayout();     
		$this->renderLayout();
    }
}