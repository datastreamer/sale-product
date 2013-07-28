<?php
// autogenerated file 22.03.2013 08:43
// $Id: $
// $Log: $
//
require_once 'EbatNs_FacetType.php';

/**
 * Enumerated type that contains all possible reasons why the buyer's payment 
 * forthe order is being held by PayPal instead of being distributed to the 
 * seller'saccount. A seller's funds for an order can be held by PayPal for as 
 * little asthree days after the buyer receives the order, but the hold can be up 
 * to 21 days based on the scenario, and in some cases, the seller's lack of action 
 * in helping to expedite the release of funds. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/PaymentHoldReasonCodeType.html
 *
 * @property string NewSeller
 * @property string BelowStandardSeller
 * @property string EbpCaseOpen
 * @property string ReinstatementAfterSuspension
 * @property string CasualSeller
 * @property string NewPaypalAccountAdded
 * @property string NotAvailable
 * @property string SellerIsOnBlackList
 * @property string Other
 * @property string None
 * @property string CustomCode
 */
class PaymentHoldReasonCodeType extends EbatNs_FacetType
{
	const CodeType_NewSeller = 'NewSeller';
	const CodeType_BelowStandardSeller = 'BelowStandardSeller';
	const CodeType_EbpCaseOpen = 'EbpCaseOpen';
	const CodeType_ReinstatementAfterSuspension = 'ReinstatementAfterSuspension';
	const CodeType_CasualSeller = 'CasualSeller';
	const CodeType_NewPaypalAccountAdded = 'NewPaypalAccountAdded';
	const CodeType_NotAvailable = 'NotAvailable';
	const CodeType_SellerIsOnBlackList = 'SellerIsOnBlackList';
	const CodeType_Other = 'Other';
	const CodeType_None = 'None';
	const CodeType_CustomCode = 'CustomCode';

	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('PaymentHoldReasonCodeType', 'urn:ebay:apis:eBLBaseComponents');

	}
}

$Facet_PaymentHoldReasonCodeType = new PaymentHoldReasonCodeType();

?>
