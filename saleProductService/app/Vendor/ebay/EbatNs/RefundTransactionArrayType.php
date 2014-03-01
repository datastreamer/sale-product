<?php
// autogenerated file 22.03.2013 08:43
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';
require_once 'RefundTransactionType.php';

/**
 * A container consisting of one or more RefundTransaction containers. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/RefundTransactionArrayType.html
 *
 */
class RefundTransactionArrayType extends EbatNs_ComplexType
{
	/**
	 * @var RefundTransactionType
	 */
	protected $RefundTransaction;

	/**
	 * @return RefundTransactionType
	 * @param integer $index 
	 */
	function getRefundTransaction($index = null)
	{
		if ($index !== null) {
			return $this->RefundTransaction[$index];
		} else {
			return $this->RefundTransaction;
		}
	}
	/**
	 * @return void
	 * @param RefundTransactionType $value 
	 * @param  $index 
	 */
	function setRefundTransaction($value, $index = null)
	{
		if ($index !== null) {
			$this->RefundTransaction[$index] = $value;
		} else {
			$this->RefundTransaction = $value;
		}
	}
	/**
	 * @return void
	 * @param RefundTransactionType $value 
	 */
	function addRefundTransaction($value)
	{
		$this->RefundTransaction[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('RefundTransactionArrayType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'RefundTransaction' =>
					array(
						'required' => false,
						'type' => 'RefundTransactionType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>