<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_FacetType.php';

class MarkUpMarkDownEventTypeCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $MarkUp
	var $MarkUp = 'MarkUp';
	// @var string $MarkDown
	var $MarkDown = 'MarkDown';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function MarkUpMarkDownEventTypeCodeType()
	{
		$this->EbatNs_FacetType('MarkUpMarkDownEventTypeCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_MarkUpMarkDownEventTypeCodeType = new MarkUpMarkDownEventTypeCodeType();

?>
