<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_FacetType.php';

class ShippingFeatureCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $DeliveryConfirmation
	var $DeliveryConfirmation = 'DeliveryConfirmation';
	// @var string $SignatureConfirmation
	var $SignatureConfirmation = 'SignatureConfirmation';
	// @var string $StealthPostage
	var $StealthPostage = 'StealthPostage';
	// @var string $SaturdayDelivery
	var $SaturdayDelivery = 'SaturdayDelivery';
	// @var string $Other
	var $Other = 'Other';
	// @var string $NotDefined
	var $NotDefined = 'NotDefined';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function ShippingFeatureCodeType()
	{
		$this->EbatNs_FacetType('ShippingFeatureCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_ShippingFeatureCodeType = new ShippingFeatureCodeType();

?>