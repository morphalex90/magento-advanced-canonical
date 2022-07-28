<?php

class Brand_Canonical_Helper_Data extends Mage_Core_Helper_Abstract {

	public function getHeadProductCanonicalUrl(){
		
		$base_url = Mage::getBaseUrl(); // base url
		$product_id =  Mage::app()->getRequest()->getParam('id'); // get the product id
		$_product = Mage::getModel('catalog/product')->load($product_id); // load the product
		
		$categoryIds = $_product->getCategoryIds(); // load all categories
        if (isset($categoryIds[0])){ // if at least 1 category exist
            $category = Mage::getModel('catalog/category')->load($categoryIds[0]); // load the first category
            $url = str_replace('.html','',$category->getUrlPath()).'/'.$_product->getUrlPath(); // generate the url with the category url
        } else {
            $url = $_product->getUrlPath(); // the product has no category, generate the url without product category
        }
		
        return $base_url.$url;
	}
	
	public function getFullProductUrl($_product){
		
		$base_url = Mage::getBaseUrl(); // base url
		
		$categoryIds = $_product->getCategoryIds(); // load all categories
        if (isset($categoryIds[0])){ // if at least 1 category exist
            $category = Mage::getModel('catalog/category')->load($categoryIds[0]); // load the first category
            $url = str_replace('.html','',$category->getUrlPath()).'/'.$_product->getUrlPath(); // generate the url with the category url
        } else {
            $url = $_product->getUrlPath(); // the product has no category, generate the url without product category
        }
		
        return $base_url.$url;
	}
}