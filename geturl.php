<?php

// Load the Magento core

require_once 'app/Mage.php';
umask(0);
Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
$userModel = Mage::getModel('admin/user');
$userModel->setUserId(0);

// Load the product collection

$collection = Mage::getModel('catalog/product')
 ->getCollection()
 ->addAttributeToSelect('*') //Select everything from the table
 ->addUrlRewrite(); //Generate nice URLs

/*
 For this example I am generating a CSV file,
 but you can change this to suit your needs.
*/

//echo "name,sku,id,url\n" ."<br>";

//echo "sku\t,url\n" ."<br>";
header('Content-Description: File Transfer');
header('Content-Type: application/force-download');
header('Content-Disposition: attachment; filename=allproduct.csv');
//header("Pragma: no-cache");
//header("Expires: 0");
$file = fopen("product.csv","w");
echo "Sku,Url\n\r";
foreach($collection as $product) {
 //Load the product categories
 $categories = $product->getCategoryIds();
 //Select the last category in the list
 $categoryId = end($categories);
 //Load that category
 $category = Mage::getModel('catalog/category')->load($categoryId);

 //echo '"'.$product->getName().'","';
 $sku = $product->getSku();
 $url = str_replace('geturl.php/','',Mage::getBaseUrl()).$product->getUrlPath($category);

 echo '"'.$sku.'",'.'"'.$url.'"'."\n\r";
  
}




