<?php
// autogenerated file 22.03.2013 08:43
// $Id: $
// $Log: $
//
//
require_once 'EbatNs_ComplexType.php';

/**
 * This type contains fields to specify the shipping rate tables that are to be 
 * applied to a listing. Shipping rate tables enable sellers to tailor the flat 
 * shipping rates offered for an item to fit the shipping destination. They can 
 * specify a base rate for a large region, then define alternative rates or 
 * surcharges for shipping to other (extended) regions within the larger region. 
 * <br><br>Prerequisites for applying shipping rate tables:<ul><li>The shipping 
 * type for the listing must be Flat. </li><li>The seller must have previously 
 * configured a shipping rate table in My eBay site preferences. </li></ul> This 
 * container is returned from the GetItem family of calls only for the seller who 
 * listed the item. <br><br>You can find more information about using shipping rate 
 * tables in the Shipping chapter of the Trading API User's Guide. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/RateTableDetailsType.html
 *
 */
class RateTableDetailsType extends EbatNs_ComplexType
{
	/**
	 * @var string
	 */
	protected $DomesticRateTable;
	/**
	 * @var string
	 */
	protected $InternationalRateTable;

	/**
	 * @return string
	 */
	function getDomesticRateTable()
	{
		return $this->DomesticRateTable;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setDomesticRateTable($value)
	{
		$this->DomesticRateTable = $value;
	}
	/**
	 * @return string
	 */
	function getInternationalRateTable()
	{
		return $this->InternationalRateTable;
	}
	/**
	 * @return void
	 * @param string $value 
	 */
	function setInternationalRateTable($value)
	{
		$this->InternationalRateTable = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('RateTableDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'DomesticRateTable' =>
					array(
						'required' => false,
						'type' => 'string',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'InternationalRateTable' =>
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
