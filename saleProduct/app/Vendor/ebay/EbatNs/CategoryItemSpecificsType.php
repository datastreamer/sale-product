<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_ComplexType.php';
require_once 'NameValueListArrayType.php';

class CategoryItemSpecificsType extends EbatNs_ComplexType
{
	// start props
	// @var string $CategoryID
	var $CategoryID;
	// @var boolean $Updated
	var $Updated;
	// @var NameValueListArrayType $ItemSpecifics
	var $ItemSpecifics;
	// end props

/**
 *

 * @return string
 */
	function getCategoryID()
	{
		return $this->CategoryID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setCategoryID($value)
	{
		$this->CategoryID = $value;
	}
/**
 *

 * @return boolean
 */
	function getUpdated()
	{
		return $this->Updated;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setUpdated($value)
	{
		$this->Updated = $value;
	}
/**
 *

 * @return NameValueListArrayType
 */
	function getItemSpecifics()
	{
		return $this->ItemSpecifics;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setItemSpecifics($value)
	{
		$this->ItemSpecifics = $value;
	}
/**
 *

 * @return 
 */
	function CategoryItemSpecificsType()
	{
		$this->EbatNs_ComplexType('CategoryItemSpecificsType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'CategoryID' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'Updated' =>
				array(
					'required' => false,
					'type' => 'boolean',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'ItemSpecifics' =>
				array(
					'required' => false,
					'type' => 'NameValueListArrayType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>