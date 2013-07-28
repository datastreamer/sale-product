<?php
// autogenerated file 22.03.2013 08:43
// $Id: $
// $Log: $
//
//
require_once 'UserIDType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'BidderStatusCodeType.php';
require_once 'AmountType.php';

/**
 * This type is deprecated along with Live Auction listings. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/BidApprovalType.html
 *
 */
class BidApprovalType extends EbatNs_ComplexType
{
	/**
	 * @var UserIDType
	 */
	protected $UserID;
	/**
	 * @var AmountType
	 */
	protected $ApprovedBiddingLimit;
	/**
	 * @var string
	 */
	protected $DeclinedComment;
	/**
	 * @var BidderStatusCodeType
	 */
	protected $Status;

	/**
	 * @return UserIDType
	 */
	function getUserID()
	{
		return $this->UserID;
	}
	/**
	 * @return void
	 * @param UserIDType $value 
	 */
	function setUserID($value)
	{
		$this->UserID = $value;
	}
	/**
	 * @return AmountType
	 */
	function getApprovedBiddingLimit()
	{
		return $this->ApprovedBiddingLimit;
	}
	/**
	 * @return void
	 * @param AmountType $value 
	 */
	function setApprovedBiddingLimit($value)
	{
		$this->ApprovedBiddingLimit = $value;
	}
	/**
	 * @return string
	 */
	function getDeclinedComment()
	{
		return $this->DeclinedComment;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setDeclinedComment($value)
	{
		$this->DeclinedComment = $value;
	}
	/**
	 * @return BidderStatusCodeType
	 */
	function getStatus()
	{
		return $this->Status;
	}
	/**
	 * @return void
	 * @param BidderStatusCodeType $value 
	 */
	function setStatus($value)
	{
		$this->Status = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('BidApprovalType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'UserID' =>
					array(
						'required' => false,
						'type' => 'UserIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ApprovedBiddingLimit' =>
					array(
						'required' => false,
						'type' => 'AmountType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DeclinedComment' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Status' =>
					array(
						'required' => false,
						'type' => 'BidderStatusCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
