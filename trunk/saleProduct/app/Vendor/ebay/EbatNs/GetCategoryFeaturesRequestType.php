<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'FeatureIDCodeType.php';
require_once 'AbstractRequestType.php';

class GetCategoryFeaturesRequestType extends AbstractRequestType
{
	// start props
	// @var string $CategoryID
	var $CategoryID;
	// @var int $LevelLimit
	var $LevelLimit;
	// @var boolean $ViewAllNodes
	var $ViewAllNodes;
	// @var FeatureIDCodeType $FeatureID
	var $FeatureID;
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

 * @return int
 */
	function getLevelLimit()
	{
		return $this->LevelLimit;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setLevelLimit($value)
	{
		$this->LevelLimit = $value;
	}
/**
 *

 * @return boolean
 */
	function getViewAllNodes()
	{
		return $this->ViewAllNodes;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setViewAllNodes($value)
	{
		$this->ViewAllNodes = $value;
	}
/**
 *

 * @return FeatureIDCodeType
 * @param  $index 
 */
	function getFeatureID($index = null)
	{
		if ($index) {
		return $this->FeatureID[$index];
	} else {
		return $this->FeatureID;
	}

	}
/**
 *

 * @return void
 * @param  $value 
 * @param  $index 
 */
	function setFeatureID($value, $index = null)
	{
		if ($index) {
	$this->FeatureID[$index] = $value;
	} else {
	$this->FeatureID = $value;
	}

	}
/**
 *

 * @return 
 */
	function GetCategoryFeaturesRequestType()
	{
		$this->AbstractRequestType('GetCategoryFeaturesRequestType', 'urn:ebay:apis:eBLBaseComponents');
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
				'LevelLimit' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'ViewAllNodes' =>
				array(
					'required' => false,
					'type' => 'boolean',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'FeatureID' =>
				array(
					'required' => false,
					'type' => 'FeatureIDCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => true,
					'cardinality' => '0..*'
				)
			));

	}
}
?>