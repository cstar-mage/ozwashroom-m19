<?php
class SetuBridge_Googlecustomerreviews_Model_Observer
{
   public function lMcheck(Varien_Event_Observer $observer){
        if( Mage::helper('googlecustomerreviews')->isUpdated() ){
            $res=$this->isValidApikey();
        }
         if(isset($res)){
            if(isset($res->status)){
                if($res->status == false){
                    $coreConfigData = new Mage_Core_Model_Config();
                    $coreConfigData ->saveConfig('googlecustomerreviews_section/googlecustomerreviewsgeneral_group/enable_select', '0', 'default', 0);
                    $ev=$observer->getEvent()->getName();
                    $eMsg=isset($res->msg) ? $res->msg : ' ';
                    if($ev=="admin_session_user_login_success"){
                        Mage::getSingleton('adminhtml/session')->addWarning(Mage::helper('googlecustomerreviews')->__("<strong class='label'>Googletrustedstore</strong>:".$eMsg.". Please Update <a href='".Mage::helper('adminhtml')->getUrl("adminhtml/system_config/edit/section/googlecustomerreviews_section")."'> Licence Key </a>"));
                    }
                    else{
                        Mage::getSingleton('core/session')->addError(Mage::helper('googlecustomerreviews')->__($eMsg));
                    } 
                }
            }
        if(isset($res->validto)) Mage::getSingleton('adminhtml/session')->addWarning(Mage::helper('googlecustomerreviews')->__("<strong class='label'>Googletrustedstore</strong>:".$res->validto));
        if( isset($res->status) ){
            Mage::helper('googlecustomerreviews')->lmWrite($res->status);
         }
         else{
            Mage::helper('googlecustomerreviews')->lmWrite();
         }
        }
       
    }
   protected function isValidApikey(){
        $ch = curl_init();
        $timeout=5;
        curl_setopt($ch, CURLOPT_URL,Mage::helper('googlecustomerreviews')->getApiUrl());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_POSTFIELDS, Mage::helper('googlecustomerreviews')->getApiParams());
        $res = curl_exec($ch);
        return json_decode($res);
    }
    protected function get_domain($url)
    {
        $host = @parse_url($url, PHP_URL_HOST);
        if (!$host)
        $host = $url;
        if (substr($host, 0, 4) == "www.")
        $host = substr($host, 4);
        return $host; 
    }
		
}
