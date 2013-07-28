<?php
// autogenerated file 22.03.2013 08:43
// $Id: $
// $Log: $
//
//
require_once 'VeROReportItemType.php';
require_once 'EbatNs_ComplexType.php';

/**
 * Type defining the <b>ReportItems</b> container in the <b>VeROReportItems</b> 
 * request. The <b>ReportItems</b> container consists of an array of items which, 
 * according to the seller, are infringing upon theseller's copyright, trademark, 
 * or intellectual property rights (according to the seller). 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/VeROReportItemsType.html
 *
 */
class VeROReportItemsType extends EbatNs_ComplexType
{
	/**
	 * @var VeROReportItemType
	 */
	protected $ReportItem;

	/**
	 * @return VeROReportItemType
	 * @param integer $index 
	 */
	function getReportItem($index = null)
	{
		if ($index !== null) {
			return $this->ReportItem[$index];
		} else {
			return $this->ReportItem;
		}
	}
	/**
	 * @return void
	 * @param VeROReportItemType $value 
	 * @param  $index 
	 */
	function setReportItem($value, $index = null)
	{
		if ($index !== null) {
			$this->ReportItem[$index] = $value;
		} else {
			$this->ReportItem = $value;
		}
	}
	/**
	 * @return void
	 * @param VeROReportItemType $value 
	 */
	function addReportItem($value)
	{
		$this->ReportItem[] = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('VeROReportItemsType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'ReportItem' =>
					array(
						'required' => false,
						'type' => 'VeROReportItemType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => true,
						'cardinality' => '0..*'
					)
				));
	}
}
?>
