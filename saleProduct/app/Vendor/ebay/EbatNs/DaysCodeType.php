<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_FacetType.php';

class DaysCodeType extends EbatNs_FacetType
{
	// start props
	// @var string $None
	var $None = 'None';
	// @var string $EveryDay
	var $EveryDay = 'EveryDay';
	// @var string $Weekdays
	var $Weekdays = 'Weekdays';
	// @var string $Weekends
	var $Weekends = 'Weekends';
	// @var string $CustomCode
	var $CustomCode = 'CustomCode';
	// end props

/**
 *

 * @return 
 */
	function DaysCodeType()
	{
		$this->EbatNs_FacetType('DaysCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_DaysCodeType = new DaysCodeType();

?>
