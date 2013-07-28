<?php
// autogenerated file 22.03.2013 08:43
// $Id: $
// $Log: $
//
//
require_once 'TaskStatusCodeType.php';
require_once 'StoreCustomCategoryArrayType.php';
require_once 'AbstractResponseType.php';

/**
 * Returns the status of the processing progress for changes to the 
 * categorystructure for a store. 
 *
 * @link http://developer.ebay.com/DevZone/XML/docs/Reference/eBay/types/SetStoreCategoriesResponseType.html
 *
 */
class SetStoreCategoriesResponseType extends AbstractResponseType
{
	/**
	 * @var long
	 */
	protected $TaskID;
	/**
	 * @var TaskStatusCodeType
	 */
	protected $Status;
	/**
	 * @var StoreCustomCategoryArrayType
	 */
	protected $CustomCategory;

	/**
	 * @return long
	 */
	function getTaskID()
	{
		return $this->TaskID;
	}
	/**
	 * @return void
	 * @param long $value 
	 */
	function setTaskID($value)
	{
		$this->TaskID = $value;
	}
	/**
	 * @return TaskStatusCodeType
	 */
	function getStatus()
	{
		return $this->Status;
	}
	/**
	 * @return void
	 * @param TaskStatusCodeType $value 
	 */
	function setStatus($value)
	{
		$this->Status = $value;
	}
	/**
	 * @return StoreCustomCategoryArrayType
	 */
	function getCustomCategory()
	{
		return $this->CustomCategory;
	}
	/**
	 * @return void
	 * @param StoreCustomCategoryArrayType $value 
	 */
	function setCustomCategory($value)
	{
		$this->CustomCategory = $value;
	}
	/**
	 * @return 
	 */
	function __construct()
	{
		parent::__construct('SetStoreCategoriesResponseType', 'urn:ebay:apis:eBLBaseComponents');
		if (!isset(self::$_elements[__CLASS__]))
				self::$_elements[__CLASS__] = array_merge(self::$_elements[get_parent_class()],
				array(
					'TaskID' =>
					array(
						'required' => false,
						'type' => 'long',
						'nsURI' => 'http://www.w3.org/2001/XMLSchema',
						'array' => false,
						'cardinality' => '0..1'
					),
					'Status' =>
					array(
						'required' => false,
						'type' => 'TaskStatusCodeType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					),
					'CustomCategory' =>
					array(
						'required' => false,
						'type' => 'StoreCustomCategoryArrayType',
						'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
						'array' => false,
						'cardinality' => '0..1'
					)
				));
	}
}
?>
