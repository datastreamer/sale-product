<?php
// autogenerated file 22.03.2013 08:43
// $Id: $
// $Log: $
//
require_once 'EbatNs_SimpleType.php';

/**
 * Type that represents the unique identifier for a single item listing. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ItemIDType.html
 *
 */
class ItemIDType extends EbatNs_SimpleType
{

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ItemIDType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_ItemIDType = new ItemIDType();

?>