<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_ComplexType.php';

class StorefrontType extends EbatNs_ComplexType
{
	// start props
	// @var long $StoreCategoryID
	var $StoreCategoryID;
	// @var long $StoreCategory2ID
	var $StoreCategory2ID;
	// @var anyURI $StoreURL
	var $StoreURL;
	// @var string $StoreName
	var $StoreName;
	// end props

/**
 *

 * @return long
 */
	function getStoreCategoryID()
	{
		return $this->StoreCategoryID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setStoreCategoryID($value)
	{
		$this->StoreCategoryID = $value;
	}
/**
 *

 * @return long
 */
	function getStoreCategory2ID()
	{
		return $this->StoreCategory2ID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setStoreCategory2ID($value)
	{
		$this->StoreCategory2ID = $value;
	}
/**
 *

 * @return anyURI
 */
	function getStoreURL()
	{
		return $this->StoreURL;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setStoreURL($value)
	{
		$this->StoreURL = $value;
	}
/**
 *

 * @return string
 */
	function getStoreName()
	{
		return $this->StoreName;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setStoreName($value)
	{
		$this->StoreName = $value;
	}
/**
 *

 * @return 
 */
	function StorefrontType()
	{
		$this->EbatNs_ComplexType('StorefrontType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'StoreCategoryID' =>
				array(
					'required' => true,
					'type' => 'long',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '1..1'
				),
				'StoreCategory2ID' =>
				array(
					'required' => true,
					'type' => 'long',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '1..1'
				),
				'StoreURL' =>
				array(
					'required' => false,
					'type' => 'anyURI',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'StoreName' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>