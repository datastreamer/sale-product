<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_FacetType.php';

class ItemConditionCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $New
	var $New = 'New';
	// @var string $Used
	var $Used = 'Used';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function ItemConditionCodeType()
	{
		$this->EbatNs_FacetType('ItemConditionCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_ItemConditionCodeType = new ItemConditionCodeType();

?>
