<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_ComplexType.php';

class ThemeGroupType extends EbatNs_ComplexType
{
	// start props
	// @var int $GroupID
	var $GroupID;
	// @var string $GroupName
	var $GroupName;
	// @var int $ThemeID
	var $ThemeID;
	// @var int $ThemeTotal
	var $ThemeTotal;
	// end props

/**
 *

 * @return int
 */
	function getGroupID()
	{
		return $this->GroupID;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setGroupID($value)
	{
		$this->GroupID = $value;
	}
/**
 *

 * @return string
 */
	function getGroupName()
	{
		return $this->GroupName;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setGroupName($value)
	{
		$this->GroupName = $value;
	}
/**
 *

 * @return int
 * @param  $index 
 */
	function getThemeID($index = null)
	{
		if ($index) {
		return $this->ThemeID[$index];
	} else {
		return $this->ThemeID;
	}

	}
/**
 *

 * @return void
 * @param  $value 
 * @param  $index 
 */
	function setThemeID($value, $index = null)
	{
		if ($index) {
	$this->ThemeID[$index] = $value;
	} else {
	$this->ThemeID = $value;
	}

	}
/**
 *

 * @return int
 */
	function getThemeTotal()
	{
		return $this->ThemeTotal;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setThemeTotal($value)
	{
		$this->ThemeTotal = $value;
	}
/**
 *

 * @return 
 */
	function ThemeGroupType()
	{
		$this->EbatNs_ComplexType('ThemeGroupType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'GroupID' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'GroupName' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'ThemeID' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => true,
					'cardinality' => '0..*'
				),
				'ThemeTotal' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
