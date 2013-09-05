<?php
// autogenerated file 22.03.2013 08:43
// $Id: $
// $Log: $
//
//
require_once 'DisputeIDType.php';
require_once 'DisputeExplanationCodeType.php';
require_once 'TradingRoleCodeType.php';
require_once 'EbatNs_ComplexType.php';
require_once 'UserIDType.php';
require_once 'ItemType.php';
require_once 'DisputeStateCodeType.php';
require_once 'DisputeResolutionType.php';
require_once 'DisputeCreditEligibilityCodeType.php';
require_once 'DisputeReasonCodeType.php';
require_once 'DisputeMessageType.php';
require_once 'DisputeRecordTypeCodeType.php';
require_once 'DisputeStatusCodeType.php';

/**
 * Contains all information describing a dispute. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/DisputeType.html
 *
 */
class DisputeType extends EbatNs_ComplexType
{
	/**
	 * @var DisputeIDType
	 */
	protected $DisputeID;
	/**
	 * @var DisputeRecordTypeCodeType
	 */
	protected $DisputeRecordType;
	/**
	 * @var DisputeStateCodeType
	 */
	protected $DisputeState;
	/**
	 * @var DisputeStatusCodeType
	 */
	protected $DisputeStatus;
	/**
	 * @var TradingRoleCodeType
	 */
	protected $OtherPartyRole;
	/**
	 * @var string
	 */
	protected $OtherPartyName;
	/**
	 * @var TradingRoleCodeType
	 */
	protected $UserRole;
	/**
	 * @var UserIDType
	 */
	protected $BuyerUserID;
	/**
	 * @var UserIDType
	 */
	protected $SellerUserID;
	/**
	 * @var string
	 */
	protected $TransactionID;
	/**
	 * @var ItemType
	 */
	protected $Item;
	/**
	 * @var DisputeReasonCodeType
	 */
	protected $DisputeReason;
	/**
	 * @var DisputeExplanationCodeType
	 */
	protected $DisputeExplanation;
	/**
	 * @var DisputeCreditEligibilityCodeType
	 */
	protected $DisputeCreditEligibility;
	/**
	 * @var dateTime
	 */
	protected $DisputeCreatedTime;
	/**
	 * @var dateTime
	 */
	protected $DisputeModifiedTime;
	/**
	 * @var DisputeResolutionType
	 */
	protected $DisputeResolution;
	/**
	 * @var DisputeMessageType
	 */
	protected $DisputeMessage;
	/**
	 * @var boolean
	 */
	protected $Escalation;
	/**
	 * @var boolean
	 */
	protected $PurchaseProtection;
	/**
	 * @var string
	 */
	protected $OrderLineItemID;

	/**
	 * @return DisputeIDType
	 */
	function getDisputeID()
	{
		return $this->DisputeID;
	}
	/**
	 * @return void
	 * @param DisputeIDType $value 
	 */
	function setDisputeID($value)
	{
		$this->DisputeID = $value;
	}
	/**
	 * @return DisputeRecordTypeCodeType
	 */
	function getDisputeRecordType()
	{
		return $this->DisputeRecordType;
	}
	/**
	 * @return void
	 * @param DisputeRecordTypeCodeType $value 
	 */
	function setDisputeRecordType($value)
	{
		$this->DisputeRecordType = $value;
	}
	/**
	 * @return DisputeStateCodeType
	 */
	function getDisputeState()
	{
		return $this->DisputeState;
	}
	/**
	 * @return void
	 * @param DisputeStateCodeType $value 
	 */
	function setDisputeState($value)
	{
		$this->DisputeState = $value;
	}
	/**
	 * @return DisputeStatusCodeType
	 */
	function getDisputeStatus()
	{
		return $this->DisputeStatus;
	}
	/**
	 * @return void
	 * @param DisputeStatusCodeType $value 
	 */
	function setDisputeStatus($value)
	{
		$this->DisputeStatus = $value;
	}
	/**
	 * @return TradingRoleCodeType
	 */
	function getOtherPartyRole()
	{
		return $this->OtherPartyRole;
	}
	/**
	 * @return void
	 * @param TradingRoleCodeType $value 
	 */
	function setOtherPartyRole($value)
	{
		$this->OtherPartyRole = $value;
	}
	/**
	 * @return string
	 */
	function getOtherPartyName()
	{
		return $this->OtherPartyName;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setOtherPartyName($value)
	{
		$this->OtherPartyName = $value;
	}
	/**
	 * @return TradingRoleCodeType
	 */
	function getUserRole()
	{
		return $this->UserRole;
	}
	/**
	 * @return void
	 * @param TradingRoleCodeType $value 
	 */
	function setUserRole($value)
	{
		$this->UserRole = $value;
	}
	/**
	 * @return UserIDType
	 */
	function getBuyerUserID()
	{
		return $this->BuyerUserID;
	}
	/**
	 * @return void
	 * @param UserIDType $value 
	 */
	function setBuyerUserID($value)
	{
		$this->BuyerUserID = $value;
	}
	/**
	 * @return UserIDType
	 */
	function getSellerUserID()
	{
		return $this->SellerUserID;
	}
	/**
	 * @return void
	 * @param UserIDType $value 
	 */
	function setSellerUserID($value)
	{
		$this->SellerUserID = $value;
	}
	/**
	 * @return string
	 */
	function getTransactionID()
	{
		return $this->TransactionID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setTransactionID($value)
	{
		$this->TransactionID = $value;
	}
	/**
	 * @return ItemType
	 */
	function getItem()
	{
		return $this->Item;
	}
	/**
	 * @return void
	 * @param ItemType $value 
	 */
	function setItem($value)
	{
		$this->Item = $value;
	}
	/**
	 * @return DisputeReasonCodeType
	 */
	function getDisputeReason()
	{
		return $this->DisputeReason;
	}
	/**
	 * @return void
	 * @param DisputeReasonCodeType $value 
	 */
	function setDisputeReason($value)
	{
		$this->DisputeReason = $value;
	}
	/**
	 * @return DisputeExplanationCodeType
	 */
	function getDisputeExplanation()
	{
		return $this->DisputeExplanation;
	}
	/**
	 * @return void
	 * @param DisputeExplanationCodeType $value 
	 */
	function setDisputeExplanation($value)
	{
		$this->DisputeExplanation = $value;
	}
	/**
	 * @return DisputeCreditEligibilityCodeType
	 */
	function getDisputeCreditEligibility()
	{
		return $this->DisputeCreditEligibility;
	}
	/**
	 * @return void
	 * @param DisputeCreditEligibilityCodeType $value 
	 */
	function setDisputeCreditEligibility($value)
	{
		$this->DisputeCreditEligibility = $value;
	}
	/**
	 * @return dateTime
	 */
	function getDisputeCreatedTime()
	{
		return $this->DisputeCreatedTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setDisputeCreatedTime($value)
	{
		$this->DisputeCreatedTime = $value;
	}
	/**
	 * @return dateTime
	 */
	function getDisputeModifiedTime()
	{
		return $this->DisputeModifiedTime;
	}
	/**
	 * @return void
	 * @param dateTime $value 
	 */
	function setDisputeModifiedTime($value)
	{
		$this->DisputeModifiedTime = $value;
	}
	/**
	 * @return DisputeResolutionType
	 * @param integer $index 
	 */
	function getDisputeResolution($index = null)
	{
		if ($index !== null) {
			return $this->DisputeResolution[$index];
		} else {
			return $this->DisputeResolution;
		}
	}
	/**
	 * @return void
	 * @param DisputeResolutionType $value 
	 * @param  $index 
	 */
	function setDisputeResolution($value, $index = null)
	{
		if ($index !== null) {
			$this->DisputeResolution[$index] = $value;
		} else {
			$this->DisputeResolution = $value;
		}
	}
	/**
	 * @return void
	 * @param DisputeResolutionType $value 
	 */
	function addDisputeResolution($value)
	{
		$this->DisputeResolution[] = $value;
	}
	/**
	 * @return DisputeMessageType
	 * @param integer $index 
	 */
	function getDisputeMessage($index = null)
	{
		if ($index !== null) {
			return $this->DisputeMessage[$index];
		} else {
			return $this->DisputeMessage;
		}
	}
	/**
	 * @return void
	 * @param DisputeMessageType $value 
	 * @param  $index 
	 */
	function setDisputeMessage($value, $index = null)
	{
		if ($index !== null) {
			$this->DisputeMessage[$index] = $value;
		} else {
			$this->DisputeMessage = $value;
		}
	}
	/**
	 * @return void
	 * @param DisputeMessageType $value 
	 */
	function addDisputeMessage($value)
	{
		$this->DisputeMessage[] = $value;
	}
	/**
	 * @return boolean
	 */
	function getEscalation()
	{
		return $this->Escalation;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setEscalation($value)
	{
		$this->Escalation = $value;
	}
	/**
	 * @return boolean
	 */
	function getPurchaseProtection()
	{
		return $this->PurchaseProtection;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setPurchaseProtection($value)
	{
		$this->PurchaseProtection = $value;
	}
	/**
	 * @return string
	 */
	function getOrderLineItemID()
	{
		return $this->OrderLineItemID;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setOrderLineItemID($value)
	{
		$this->OrderLineItemID = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('DisputeType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'DisputeID' =>
					array(
						'required' => false,
						'type' => 'DisputeIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DisputeRecordType' =>
					array(
						'required' => false,
						'type' => 'DisputeRecordTypeCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DisputeState' =>
					array(
						'required' => false,
						'type' => 'DisputeStateCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DisputeStatus' =>
					array(
						'required' => false,
						'type' => 'DisputeStatusCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'OtherPartyRole' =>
					array(
						'required' => false,
						'type' => 'TradingRoleCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'OtherPartyName' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'UserRole' =>
					array(
						'required' => false,
						'type' => 'TradingRoleCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'BuyerUserID' =>
					array(
						'required' => false,
						'type' => 'UserIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'SellerUserID' =>
					array(
						'required' => false,
						'type' => 'UserIDType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'TransactionID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Item' =>
					array(
						'required' => false,
						'type' => 'ItemType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DisputeReason' =>
					array(
						'required' => false,
						'type' => 'DisputeReasonCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DisputeExplanation' =>
					array(
						'required' => false,
						'type' => 'DisputeExplanationCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DisputeCreditEligibility' =>
					array(
						'required' => false,
						'type' => 'DisputeCreditEligibilityCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DisputeCreatedTime' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DisputeModifiedTime' =>
					array(
						'required' => false,
						'type' => 'dateTime',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DisputeResolution' =>
					array(
						'required' => false,
						'type' => 'DisputeResolutionType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					),
					'DisputeMessage' =>
					array(
						'required' => false,
						'type' => 'DisputeMessageType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					),
					'Escalation' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PurchaseProtection' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'OrderLineItemID' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>