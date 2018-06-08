<?php
    class Biztech_Auspost_Model_Observer {


        public function checkKey($observer)
        {
            $key = Mage::getStoreConfig('auspost/activation/key');
            Mage::helper('auspost')->checkKey($key);
        }
        
        /*
        * Generate AuPost shipment and save tracking details
        */
        public function createShipmentAndTrackDetails($observer){
            //DebugBreak();
            $shipmentId = $observer->getEvent()->getShipment()->getId();
            $shipment_reference = $shipmentId;
            $shipping_address = $observer->getEvent()->getShipment()->getShippingAddress();
            $customer_reference_1  = $observer->getEvent()->getShipment()->getOrderId();
            $customer_reference_2 = $observer->getEvent()->getShipment()->getOrderId();
            /*$from = '{"name": }';
            $to = '{"name" : "'.$shipping_address->getFirstName().' '.$shipping_address->getLastName().'",
                    "lines":[]
                    }';*/
        }

}