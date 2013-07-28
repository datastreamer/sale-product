<?php
// autogenerated file 22.03.2013 08:43
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Applicable to sites that support the Detailed Seller Ratings feature.The 
 * FeedbackRatingDetailCodeType is the list of areas for detailed seller ratings. 
 * When buyers leave an overall Feedback rating (positive, neutral, or negative) 
 * for a seller, they also can leave ratings in four areas: item as described, 
 * communication, shipping time, and charges for shipping and handling. Users 
 * retrieve detailed ratings as averages of the ratings left by buyers. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/FeedbackRatingDetailCodeType.html
 *
 * @property string ItemAsDescribed
 * @property string Communication
 * @property string ShippingTime
 * @property string ShippingAndHandlingCharges
 * @property string CustomCode
 */
class FeedbackRatingDetailCodeType extends EbatNs_FacetType
{
	const CodeType_ItemAsDescribed = 'ItemAsDescribed';
	const CodeType_Communication = 'Communication';
	const CodeType_ShippingTime = 'ShippingTime';
	const CodeType_ShippingAndHandlingCharges = 'ShippingAndHandlingCharges';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('FeedbackRatingDetailCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_FeedbackRatingDetailCodeType = new FeedbackRatingDetailCodeType();

?>
