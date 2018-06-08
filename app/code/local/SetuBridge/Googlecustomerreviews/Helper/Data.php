<?php 
/**
* Setubridge Technolabs
* http://www.setubridge.com/
* @author SetuBridge
* @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
**/
class SetuBridge_Googlecustomerreviews_Helper_Data extends Mage_Core_Helper_Abstract
{
    protected $_storeId=null;
    public function getGoogleStoreId(){
        return Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgooglesetting_group/googlecustomerreviewsgaccountid_input',$this->getStoreId());
    }
    public function isActive(){
        return (bool) Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgeneral_group/enable_select',$this->getStoreId());
    }
    public function getGoogleBasePosition(){
        $basePos=Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgooglesetting_group/badge',$this->getStoreId());
        if($basePos=='INLINE'):
            $gBadgeContainer=Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgooglesetting_group/badge_textarea',$this->getStoreId());
            return array('basePos'=>$basePos,'base_container'=>$gBadgeContainer);
            else:
            return array('basePos'=>$basePos);
            endif;
    }
    public function getGoogleDialogboxPosition(){
        $dialogPos=Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgoogleorderpagesetting_group/dialogbox',$this->getStoreId());
        return array('basePos'=>$dialogPos);

    }

    public function getGoogleMerchantId(){
        return Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgooglesetting_group/googlecustomerreviewsgmerchantid_input',$this->getStoreId());
    }
    public function getMerchantLang(){
        return Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgooglesetting_group/code',$this->getStoreId());
    }
    public function getMerchantCountry(){
        return Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgooglesetting_group/merchant_country',$this->getStoreId());
    }
    public function getGoogleShoppingType(){
        $gId=Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgooglesetting_group/google_shopping_id_dropdown',$this->getStoreId());
        if($gId=='USER_DEFINED'){
            return Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgooglesetting_group/googlecustomerreviewsuserdefinedgshoppingid_input',$this->getStoreId());
        }
        return $gId;
    }
    public function getShipDays($orderDate,$backorder=0){
        $shipDays=intval(trim(Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgoogleorderpagesetting_group/googlecustomerreviewsshipmentday_input',$this->getStoreId())));   
        if(Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgoogleorderpagesetting_group/allow_backorder',$this->getStoreId()) && $backorder=='Y'){
            $shipDays=intval(trim(Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgoogleorderpagesetting_group/gtsbackordershipmentday',$this->getStoreId())));    
        }
        $shipDayDate=explode(" ",$orderDate);
        if(!$shipDays) $shipDays=0;
        $shipDate=date("Y-m-d", strtotime($shipDayDate[0] ." + $shipDays Day") );
        return $shipDate;
    }
    public function getDeliveryDays($orderDate,$backorder=0){
        $deliveryDays=intval(trim(Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgoogleorderpagesetting_group/googlecustomerreviewsdeliveryday_input',$this->getStoreId())));   
        if(Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgoogleorderpagesetting_group/allow_backorder',$this->getStoreId()) && $backorder=='Y'){
            $deliveryDays=intval(trim(Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgoogleorderpagesetting_group/gtsbackorderdeliveryday',$this->getStoreId())));   
        }
        $delDayDate=explode(" ",$orderDate);
        if(!$deliveryDays) $deliveryDays=0;
        $deliveryDate=date("Y-m-d", strtotime($delDayDate[0] ." + $deliveryDays Day") );
        return $deliveryDate;
    }
    public function getRoutsName(){
        $onepageUrl=Mage::getStoreConfig('googlecustomerreviews_section/googlecustomerreviewsgeneral_group/googlecustomerreviewsgonepageurl_input',$this->getStoreId());
        $onepageAction1=array("checkout","onepage","onestepcheckout");
        if($onepageUrl){
            $onepageAction=explode('/',parse_url($onepageUrl,PHP_URL_PATH));
            if (($key = array_search('index.php', $onepageAction)) !== false) {
                unset($onepageAction[$key]);
            }
            unset($onepageAction[0]);
            if($onepageAction!=null){
                return array_values(array_unique(array_merge($onepageAction,$onepageAction1))); 
            }
        }
        return $onepageAction1;

    }
    public function getApiUrl(){
        return "http://store.setubridge.com/licence_api.php/api/checklicence";
    }
    public function getApiParams(){
        $licenceKey=Mage::getStoreConfig('googlecustomerreviews_section/sbridge_licence_manager_group/licence_key',$this->getStoreId());
        $frontName=json_decode(json_encode(Mage::getConfig()->getNode('frontend/routers/googlecustomerreviews/args')->frontName),TRUE);
        if(isset($frontName)) $ext=$frontName[0];
        $version=json_decode(json_encode(Mage::getConfig()->getNode('default/googlecustomerreviews_section/sbridge_licence_manager_group')->version),TRUE);
        $domain=Mage::helper('googlecustomerreviews')->getParsUrl($_SERVER['SERVER_NAME']);
        $params=array("domain"=>$domain,"key"=>$licenceKey,"cur_uri"=>$_SERVER['HTTP_REFERER'],"requested_ext"=>$ext,"version"=>$version[0]);
        return $params;
    }
    public function lmWrite($res){
        $values=array();
        if(!$res) $res='0';
        $values['lm_status']=$res;
        $values['last_update']=date('Y-m-d');
        $config=Mage::getModel('core/config');
        try{
            $config->saveConfig('lm/set/flag/',serialize($values),'default', '0');
        }
        catch(Exception $e){
            Mage::logException($e);
        }
    }
    public function isUpdated(){
        $values=Mage::getStoreConfig('lm/set/flag');
        if(isset($values)){
            $result=unserialize($values);
            if($lastUp=$result['last_update']) {
                if($lastUp > date('Y-m-d') || $lastUp < date('Y-m-d')){
                    return true;
                }
                else if($result['lm_status']==0){
                    return true;
                }
                else{
                    return false;
                }  
            } 
        }
        else{
            return true;
        } 

    }
    public function isValidLicence(){
        $values = Mage::getStoreConfig('lm/set/flag');
        $result=unserialize($values);
        if(count($result) > 0){
            if($result['lm_status']) return $result['lm_status'];
        }
        return false;
    }
    public function getParsUrl($url){
        $host = @parse_url($url, PHP_URL_HOST);
        if (!$host)
            $host = $url;
        if (substr($host, 0, 4) == "www.")
            $host = substr($host, 4);
        return $host; 
    }
    protected function getStoreId(){
        if(is_null($this->_storeId)){
            $this->_storeId=Mage::app()->getStore()->getStoreId();
        }
        return $this->_storeId;
    }
}