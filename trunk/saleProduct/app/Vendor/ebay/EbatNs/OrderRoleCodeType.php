<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_FacetType.php';

class OrderRoleCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $Buyer
	var $Buyer = 'Buyer';
	// @var string $Seller
	var $Seller = 'Seller';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function OrderRoleCodeType()
	{
		$this->EbatNs_FacetType('OrderRoleCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_OrderRoleCodeType = new OrderRoleCodeType();

?>
