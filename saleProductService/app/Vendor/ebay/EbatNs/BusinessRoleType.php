<?php
// autogenerated file 22.03.2013 08:43
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Enumerated type that defines the eBay user's account type. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/BusinessRoleType.html
 *
 * @property string Shopper
 * @property string FullMarketPlaceParticipant
 */
class BusinessRoleType extends EbatNs_FacetType
{
	const CodeType_Shopper = 'Shopper';
	const CodeType_FullMarketPlaceParticipant = 'FullMarketPlaceParticipant';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('BusinessRoleType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_BusinessRoleType = new BusinessRoleType();

?>
