<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_ComplexType.php';

class StoreColorType extends EbatNs_ComplexType
{
	// start props
	// @var string $Primary
	var $Primary;
	// @var string $Secondary
	var $Secondary;
	// @var string $Accent
	var $Accent;
	// end props

/**
 *

 * @return string
 */
	function getPrimary()
	{
		return $this->Primary;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setPrimary($value)
	{
		$this->Primary = $value;
	}
/**
 *

 * @return string
 */
	function getSecondary()
	{
		return $this->Secondary;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setSecondary($value)
	{
		$this->Secondary = $value;
	}
/**
 *

 * @return string
 */
	function getAccent()
	{
		return $this->Accent;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setAccent($value)
	{
		$this->Accent = $value;
	}
/**
 *

 * @return 
 */
	function StoreColorType()
	{
		$this->EbatNs_ComplexType('StoreColorType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'Primary' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'Secondary' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'Accent' =>
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