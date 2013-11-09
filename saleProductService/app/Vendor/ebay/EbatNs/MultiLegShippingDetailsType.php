<?php
// autogenerated file 22.03.2013 08:43
// $Id: $
// $Log: $
//
//
require_once 'MultiLegShipmentType.php';
require_once 'EbatNs_ComplexType.php';

/**
 * This type provides information about the domestic leg of a Global Shipping 
 * Program shipment.<br/><br/><span class="tablenote"><strong>Note:</strong> The 
 * <strong>LogisticsProviderShipmentToBuyer</strong> field is reserved for the 
 * exclusive use of the international shipping provider.</span> 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/MultiLegShippingDetailsType.html
 *
 */
class MultiLegShippingDetailsType extends EbatNs_ComplexType
{
	/**
	 * @var MultiLegShipmentType
	 */
	protected $SellerShipmentToLogisticsProvider;
	/**
	 * @var MultiLegShipmentType
	 */
	protected $LogisticsProviderShipmentToBuyer;

	/**
	 * @return MultiLegShipmentType
	 */
	function getSellerShipmentToLogisticsProvider()
	{
		return $this->SellerShipmentToLogisticsProvider;
	}
	/**
	 * @return void
	 * @param MultiLegShipmentType $value 
	 */
	function setSellerShipmentToLogisticsProvider($value)
	{
		$this->SellerShipmentToLogisticsProvider = $value;
	}
	/**
	 * @return MultiLegShipmentType
	 */
	function getLogisticsProviderShipmentToBuyer()
	{
		return $this->LogisticsProviderShipmentToBuyer;
	}
	/**
	 * @return void
	 * @param MultiLegShipmentType $value 
	 */
	function setLogisticsProviderShipmentToBuyer($value)
	{
		$this->LogisticsProviderShipmentToBuyer = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('MultiLegShippingDetailsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'SellerShipmentToLogisticsProvider' =>
					array(
						'required' => false,
						'type' => 'MultiLegShipmentType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'LogisticsProviderShipmentToBuyer' =>
					array(
						'required' => false,
						'type' => 'MultiLegShipmentType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>