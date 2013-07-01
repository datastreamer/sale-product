<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_ComplexType.php';
require_once 'PromotionItemPriceTypeCodeType.php';
require_once 'AmountType.php';

class PromotionDetailsType extends EbatNs_ComplexType
{
	// start props
	// @var AmountType $PromotionPrice
	var $PromotionPrice;
	// @var PromotionItemPriceTypeCodeType $PromotionPriceType
	var $PromotionPriceType;
	// @var int $BidCount
	var $BidCount;
	// @var AmountType $ConvertedPromotionPrice
	var $ConvertedPromotionPrice;
	// end props

/**
 *

 * @return AmountType
 */
	function getPromotionPrice()
	{
		return $this->PromotionPrice;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setPromotionPrice($value)
	{
		$this->PromotionPrice = $value;
	}
/**
 *

 * @return PromotionItemPriceTypeCodeType
 */
	function getPromotionPriceType()
	{
		return $this->PromotionPriceType;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setPromotionPriceType($value)
	{
		$this->PromotionPriceType = $value;
	}
/**
 *

 * @return int
 */
	function getBidCount()
	{
		return $this->BidCount;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setBidCount($value)
	{
		$this->BidCount = $value;
	}
/**
 *

 * @return AmountType
 */
	function getConvertedPromotionPrice()
	{
		return $this->ConvertedPromotionPrice;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setConvertedPromotionPrice($value)
	{
		$this->ConvertedPromotionPrice = $value;
	}
/**
 *

 * @return 
 */
	function PromotionDetailsType()
	{
		$this->EbatNs_ComplexType('PromotionDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'PromotionPrice' =>
				array(
					'required' => false,
					'type' => 'AmountType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'PromotionPriceType' =>
				array(
					'required' => false,
					'type' => 'PromotionItemPriceTypeCodeType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				),
				'BidCount' =>
				array(
					'required' => false,
					'type' => 'int',
					'nsURI' => 'http://www.w3.org/2001/XMLSchema',
					'array' => false,
					'cardinality' => '0..1'
				),
				'ConvertedPromotionPrice' =>
				array(
					'required' => false,
					'type' => 'AmountType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>
