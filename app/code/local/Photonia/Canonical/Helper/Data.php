<?php

class Photonia_Canonical_Helper_Data extends Mage_Core_Helper_Abstract {

	public function getHeadProductCanonicalUrl(){
		
		$base_url = Mage::getBaseUrl(); // url del sito
		$product_id =  Mage::app()->getRequest()->getParam('id'); // mi faccio dare l'id del prodotto
		$_product = Mage::getModel('catalog/product')->load($product_id); // carico il prodotto
		
		$categoryIds = $_product->getCategoryIds(); // mi faccio dare tutti gli id delle categorie
        if (isset($categoryIds[0])){ // se ha almeno 1 categoria
            $category = Mage::getModel('catalog/category')->load($categoryIds[0]); // carico la cateogria
            $url = str_replace('.html','',$category->getUrlPath()).'/'.$_product->getUrlPath(); // genero l'url con categoria/prodotto
        } else {
            $url = $_product->getUrlPath(); // se il prodotto non ha categorie allora generlo l'url con solo il prodotto
        }
		
        return $base_url.$url;
	}
}