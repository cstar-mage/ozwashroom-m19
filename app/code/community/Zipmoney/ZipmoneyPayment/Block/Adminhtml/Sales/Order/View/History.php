
<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright   Copyright (c) 2013 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Order history block
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Zipmoney_ZipmoneyPayment_Block_Adminhtml_Sales_Order_View_History extends Mage_Adminhtml_Block_Template
{
    protected function _prepareLayout()
    {
        $onclick = "submitAndReloadArea($('order_history_block').parentNode, '".$this->getSubmitUrl()."')";
        $button = $this->getLayout()->createBlock('adminhtml/widget_button')
            ->setData(array(
                'label'   => Mage::helper('sales')->__('Submit Comment'),
                'class'   => 'save',
                'onclick' => $onclick
            ));
        $this->setChild('submit_button', $button);
        return parent::_prepareLayout();
    }

    public function getStatuses()
    {
	
		$arry_status_zip = array(
		Zipmoney_ZipmoneyPayment_Model_Config::STATUS_MAGENTO_NEW,
		Zipmoney_ZipmoneyPayment_Model_Config::STATUS_MAGENTO_AUTHORIZED,
		Zipmoney_ZipmoneyPayment_Model_Config::STATUS_MAGENTO_PROCESSING,
		Zipmoney_ZipmoneyPayment_Model_Config::STATUS_MAGENTO_CANCELLED,
		Zipmoney_ZipmoneyPayment_Model_Config::STATUS_MAGENTO_REFUND,
		Zipmoney_ZipmoneyPayment_Model_Config::STATUS_MAGENTO_AUTHORIZED_REVIEW,
		Zipmoney_ZipmoneyPayment_Model_Config::STATUS_MAGENTO_ORDER_CANCELLED,
		Zipmoney_ZipmoneyPayment_Model_Config::STATUS_MAGENTO_ORDER_DECLINED		
		);
        $state = $this->getOrder()->getState();
        $statuses = $this->getOrder()->getConfig()->getStateStatuses($state);
		if($this->getOrder()->getPayment()->getMethodInstance()->getCode()!="zipmoneypayment")
		{
			foreach($statuses as  $key=>$value)
			{
				if(in_array($key,$arry_status_zip))	
					{
					unset($statuses[$key]);
					}
			}
		}
	
        return $statuses;
    }

    public function canSendCommentEmail()
    {
        return Mage::helper('sales')->canSendOrderCommentEmail($this->getOrder()->getStore()->getId());
    }

    /**
     * Retrieve order model
     *
     * @return Mage_Sales_Model_Order
     */
    public function getOrder()
    {
        return Mage::registry('sales_order');
    }

    public function canAddComment()
    {
        return Mage::getSingleton('admin/session')->isAllowed('sales/order/actions/comment') &&
               $this->getOrder()->canComment();
    }

    public function getSubmitUrl()
    {
        return $this->getUrl('*/*/addComment', array('order_id'=>$this->getOrder()->getId()));
    }

    /**
     * Customer Notification Applicable check method
     *
     * @param  Mage_Sales_Model_Order_Status_History $history
     * @return boolean
     */
    public function isCustomerNotificationNotApplicable(Mage_Sales_Model_Order_Status_History $history)
    {
        return $history->isCustomerNotificationNotApplicable();
    }
}
