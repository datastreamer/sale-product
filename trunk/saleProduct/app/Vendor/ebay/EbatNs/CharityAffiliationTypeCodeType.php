<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_FacetType.php';

class CharityAffiliationTypeCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $Community
	var $Community = 'Community';
	// @var string $Direct
	var $Direct = 'Direct';
	// @var string $Remove
	var $Remove = 'Remove';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function CharityAffiliationTypeCodeType()
	{
		$this->EbatNs_FacetType('CharityAffiliationTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_CharityAffiliationTypeCodeType = new CharityAffiliationTypeCodeType();

?>