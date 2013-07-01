<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_ComplexType.php';
require_once 'CharityIDType.php';

class CharityAffiliationsType extends EbatNs_ComplexType
{
	// start props
	// @var CharityIDType $CharityID
	var $CharityID;
	// end props

/**
 *

 * @return CharityIDType
 * @param  $index 
 */
	function getCharityID($index = null)
	{
		if ($index) {
		return $this->CharityID[$index];
	} else {
		return $this->CharityID;
	}

	}
/**
 *

 * @return void
 * @param  $value 
 * @param  $index 
 */
	function setCharityID($value, $index = null)
	{
		if ($index) {
	$this->CharityID[$index] = $value;
	} else {
	$this->CharityID = $value;
	}

	}
/**
 *

 * @return 
 */
	function CharityAffiliationsType()
	{
		$this->EbatNs_ComplexType('CharityAffiliationsType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'CharityID' =>
				array(
					'required' => false,
					'type' => 'CharityIDType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => true,
					'cardinality' => '0..*'
				)
			));

	}
}
?>
