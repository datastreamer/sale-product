<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_FacetType.php';

class AckCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $Success
	var $Success = 'Success';
	// @var string $Failure
	var $Failure = 'Failure';
	// @var string $Warning
	var $Warning = 'Warning';
	// @var string $PartialFailure
	var $PartialFailure = 'PartialFailure';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function AckCodeType()
	{
		$this->EbatNs_FacetType('AckCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_AckCodeType = new AckCodeType();

?>