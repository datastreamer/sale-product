<?php
// autogenerated file 22.03.2013 08:43
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * The current state of user SMS subscription. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SMSSubscriptionUserStatusCodeType.html
 *
 * @property string Registered
 * @property string Unregistered
 * @property string Pending
 * @property string Failed
 * @property string CustomCode
 */
class SMSSubscriptionUserStatusCodeType extends EbatNs_FacetType
{
	const CodeType_Registered = 'Registered';
	const CodeType_Unregistered = 'Unregistered';
	const CodeType_Pending = 'Pending';
	const CodeType_Failed = 'Failed';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SMSSubscriptionUserStatusCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_SMSSubscriptionUserStatusCodeType = new SMSSubscriptionUserStatusCodeType();

?>
