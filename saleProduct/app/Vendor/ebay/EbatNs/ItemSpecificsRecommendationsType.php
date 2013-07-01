<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_ComplexType.php';
require_once 'NameValueListArrayType.php';

class ItemSpecificsRecommendationsType extends EbatNs_ComplexType
{
	// start props
	// @var NameValueListArrayType $ItemSpecifics
	var $ItemSpecifics;
	// end props

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
	function ItemSpecificsRecommendationsType()
	{
		$this->EbatNs_ComplexType('ItemSpecificsRecommendationsType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
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
