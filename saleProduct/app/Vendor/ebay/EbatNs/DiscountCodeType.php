<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_FacetType.php';

class DiscountCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $Percentage
	var $Percentage = 'Percentage';
	// @var string $Price
	var $Price = 'Price';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function DiscountCodeType()
	{
		$this->EbatNs_FacetType('DiscountCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_DiscountCodeType = new DiscountCodeType();

?>
