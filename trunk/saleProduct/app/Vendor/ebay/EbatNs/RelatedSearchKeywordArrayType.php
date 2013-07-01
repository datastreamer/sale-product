<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_ComplexType.php';

class RelatedSearchKeywordArrayType extends EbatNs_ComplexType
{
	// start props
	// @var string $Keyword
	var $Keyword;
	// end props

/**
 *

 * @return string
 * @param  $index 
 */
	function getKeyword($index = null)
	{
		if ($index) {
		return $this->Keyword[$index];
	} else {
		return $this->Keyword;
	}

	}
/**
 *

 * @return void
 * @param  $value 
 * @param  $index 
 */
	function setKeyword($value, $index = null)
	{
		if ($index) {
	$this->Keyword[$index] = $value;
	} else {
	$this->Keyword = $value;
	}

	}
/**
 *

 * @return 
 */
	function RelatedSearchKeywordArrayType()
	{
		$this->EbatNs_ComplexType('RelatedSearchKeywordArrayType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'Keyword' =>
				array(
					'required' => false,
					'type' => 'string',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => true,
					'cardinality' => '0..*'
				)
			));

	}
}
?>
