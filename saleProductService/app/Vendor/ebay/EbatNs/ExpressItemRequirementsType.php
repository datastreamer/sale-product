<?php
// autogenerated file 22.03.2013 08:43
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * This type is deprecated as the eBay Express is no longer available. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/ExpressItemRequirementsType.html
 *
 */
class ExpressItemRequirementsType extends EbatNs_ComplexType
{
	/**
	 * @var boolean
	 */
	protected $SellerExpressEligible;
	/**
	 * @var boolean
	 */
	protected $ExpressOptOut;
	/**
	 * @var boolean
	 */
	protected $ExpressApproved;
	/**
	 * @var boolean
	 */
	protected $ExpressEligibleListingType;
	/**
	 * @var boolean
	 */
	protected $ExpressEnabledCategory;
	/**
	 * @var boolean
	 */
	protected $EligiblePayPalAccount;
	/**
	 * @var boolean
	 */
	protected $DomesticShippingCost;
	/**
	 * @var boolean
	 */
	protected $EligibleReturnPolicy;
	/**
	 * @var boolean
	 */
	protected $Picture;
	/**
	 * @var boolean
	 */
	protected $EligibleItemCondition;
	/**
	 * @var boolean
	 */
	protected $PriceAboveMinimum;
	/**
	 * @var boolean
	 */
	protected $PriceBelowMaximum;
	/**
	 * @var boolean
	 */
	protected $EligibleCheckout;
	/**
	 * @var boolean
	 */
	protected $NoPreapprovedBidderList;
	/**
	 * @var boolean
	 */
	protected $NoCharity;
	/**
	 * @var boolean
	 */
	protected $CombinedShippingDiscount;
	/**
	 * @var boolean
	 */
	protected $ShipFromEligibleCountry;
	/**
	 * @var boolean
	 */
	protected $PayPalAccountAcceptsUnconfirmedAddress;

	/**
	 * @return boolean
	 */
	function getSellerExpressEligible()
	{
		return $this->SellerExpressEligible;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setSellerExpressEligible($value)
	{
		$this->SellerExpressEligible = $value;
	}
	/**
	 * @return boolean
	 */
	function getExpressOptOut()
	{
		return $this->ExpressOptOut;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setExpressOptOut($value)
	{
		$this->ExpressOptOut = $value;
	}
	/**
	 * @return boolean
	 */
	function getExpressApproved()
	{
		return $this->ExpressApproved;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setExpressApproved($value)
	{
		$this->ExpressApproved = $value;
	}
	/**
	 * @return boolean
	 */
	function getExpressEligibleListingType()
	{
		return $this->ExpressEligibleListingType;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setExpressEligibleListingType($value)
	{
		$this->ExpressEligibleListingType = $value;
	}
	/**
	 * @return boolean
	 */
	function getExpressEnabledCategory()
	{
		return $this->ExpressEnabledCategory;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setExpressEnabledCategory($value)
	{
		$this->ExpressEnabledCategory = $value;
	}
	/**
	 * @return boolean
	 */
	function getEligiblePayPalAccount()
	{
		return $this->EligiblePayPalAccount;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setEligiblePayPalAccount($value)
	{
		$this->EligiblePayPalAccount = $value;
	}
	/**
	 * @return boolean
	 */
	function getDomesticShippingCost()
	{
		return $this->DomesticShippingCost;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setDomesticShippingCost($value)
	{
		$this->DomesticShippingCost = $value;
	}
	/**
	 * @return boolean
	 */
	function getEligibleReturnPolicy()
	{
		return $this->EligibleReturnPolicy;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setEligibleReturnPolicy($value)
	{
		$this->EligibleReturnPolicy = $value;
	}
	/**
	 * @return boolean
	 */
	function getPicture()
	{
		return $this->Picture;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setPicture($value)
	{
		$this->Picture = $value;
	}
	/**
	 * @return boolean
	 */
	function getEligibleItemCondition()
	{
		return $this->EligibleItemCondition;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setEligibleItemCondition($value)
	{
		$this->EligibleItemCondition = $value;
	}
	/**
	 * @return boolean
	 */
	function getPriceAboveMinimum()
	{
		return $this->PriceAboveMinimum;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setPriceAboveMinimum($value)
	{
		$this->PriceAboveMinimum = $value;
	}
	/**
	 * @return boolean
	 */
	function getPriceBelowMaximum()
	{
		return $this->PriceBelowMaximum;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setPriceBelowMaximum($value)
	{
		$this->PriceBelowMaximum = $value;
	}
	/**
	 * @return boolean
	 */
	function getEligibleCheckout()
	{
		return $this->EligibleCheckout;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setEligibleCheckout($value)
	{
		$this->EligibleCheckout = $value;
	}
	/**
	 * @return boolean
	 */
	function getNoPreapprovedBidderList()
	{
		return $this->NoPreapprovedBidderList;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setNoPreapprovedBidderList($value)
	{
		$this->NoPreapprovedBidderList = $value;
	}
	/**
	 * @return boolean
	 */
	function getNoCharity()
	{
		return $this->NoCharity;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setNoCharity($value)
	{
		$this->NoCharity = $value;
	}
	/**
	 * @return boolean
	 */
	function getCombinedShippingDiscount()
	{
		return $this->CombinedShippingDiscount;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setCombinedShippingDiscount($value)
	{
		$this->CombinedShippingDiscount = $value;
	}
	/**
	 * @return boolean
	 */
	function getShipFromEligibleCountry()
	{
		return $this->ShipFromEligibleCountry;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setShipFromEligibleCountry($value)
	{
		$this->ShipFromEligibleCountry = $value;
	}
	/**
	 * @return boolean
	 */
	function getPayPalAccountAcceptsUnconfirmedAddress()
	{
		return $this->PayPalAccountAcceptsUnconfirmedAddress;
	}
	/**
	 * @return void
	 * @param boolean $value 
	 */
	function setPayPalAccountAcceptsUnconfirmedAddress($value)
	{
		$this->PayPalAccountAcceptsUnconfirmedAddress = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('ExpressItemRequirementsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'SellerExpressEligible' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ExpressOptOut' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ExpressApproved' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ExpressEligibleListingType' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ExpressEnabledCategory' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'EligiblePayPalAccount' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'DomesticShippingCost' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'EligibleReturnPolicy' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Picture' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'EligibleItemCondition' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PriceAboveMinimum' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PriceBelowMaximum' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'EligibleCheckout' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'NoPreapprovedBidderList' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'NoCharity' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'CombinedShippingDiscount' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'ShipFromEligibleCountry' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'PayPalAccountAcceptsUnconfirmedAddress' =>
					array(
						'required' => false,
						'type' => 'boolean',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
