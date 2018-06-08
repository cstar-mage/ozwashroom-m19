<?php
/**
 * Fontis australia Extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Fontis
 * @package    Fontis_australia
 * @author     Chris Norton
 * @copyright  Copyright (c) 2014 Fontis Pty. Ltd. (http://www.fontis.com.au)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Controller handling order export requests.
 */
class Biztech_Auspost_Adminhtml_EparcelController extends Mage_Adminhtml_Controller_Action
{
    
    /**
     * Export the eParcel table rates as a CSV file.
     */
    public function exportTableratesAction()
    {
        $rates = Mage::getResourceModel('auspost/eparcel_collection');
        $response = array(
            array('Country', 'Region/State', 'Postcodes', 'Weight from', 'Weight to', 'Parcel Cost', 'Cost Per Kg', 'Delivery Type')
        );
        foreach ($rates as $rate) {
            $CompareArray = array();
            
            $countryId = $rate->getData('dest_country_id');
            $countryCode = Mage::getModel('directory/country')->load($countryId)->getIso3Code();
            $regionId = $rate->getData('dest_region_id');
            $regionCode = Mage::getModel('directory/region')->load($regionId)->getCode();
            
            $CompareArray = array(
                $countryCode,
                $regionCode,
                $rate->getData('dest_zip_range'),
                $rate->getData('condition_from_value'),
                $rate->getData('condition_to_value'),
                $rate->getData('price'),
                $rate->getData('price_per_kg'),
                $rate->getData('delivery_type'),
            );
            
            if(!$this->in_array_r($CompareArray,$response)){
               $response[] = array(
                    $countryCode,
                    $regionCode,
                    $rate->getData('dest_zip_range'),
                    $rate->getData('condition_from_value'),
                    $rate->getData('condition_to_value'),
                    $rate->getData('price'),
                    $rate->getData('price_per_kg'),
                    $rate->getData('delivery_type'),
                );
            }
        }

        $csv = new Varien_File_Csv();
        $temp = tmpfile();
        foreach ($response as $responseRow) {
            $csv->fputcsv($temp, $responseRow);
        }
        rewind($temp);
        $contents = stream_get_contents($temp);
        $this->_prepareDownloadResponse('tablerates.csv', $contents);
        fclose($temp);
    }
    
    public function in_array_r($needle, $haystack) {
    $found = false;
    foreach ($haystack as $item) {
    if ($item === $needle) { 
            $found = true; 
            break; 
        } elseif (is_array($item)) {
            $found = $this->in_array_r($needle, $item); 
            if($found) { 
                break; 
            } 
        }    
    }
    return $found;
}
}
