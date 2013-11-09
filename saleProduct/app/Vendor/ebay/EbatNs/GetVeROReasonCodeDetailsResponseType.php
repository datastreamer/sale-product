<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'VeROReasonCodeDetailsType.php';
require_once 'AbstractResponseType.php';

class GetVeROReasonCodeDetailsResponseType extends AbstractResponseType
{
	// start props
	// @var VeROReasonCodeDetailsType $VeROReasonCodeDetails
	var $VeROReasonCodeDetails;
	// end props

/**
 *

 * @return VeROReasonCodeDetailsType
 */
	function getVeROReasonCodeDetails()
	{
		return $this->VeROReasonCodeDetails;
	}
/**
 *

 * @return void
 * @param  $value 
 */
	function setVeROReasonCodeDetails($value)
	{
		$this->VeROReasonCodeDetails = $value;
	}
/**
 *

 * @return 
 */
	function GetVeROReasonCodeDetailsResponseType()
	{
		$this->AbstractResponseType('GetVeROReasonCodeDetailsResponseType', 'urn:ebay:apis:eBLBaseComponents');
		$this->_elements = array_merge($this->_elements,
			array(
				'VeROReasonCodeDetails' =>
				array(
					'required' => false,
					'type' => 'VeROReasonCodeDetailsType',
					'nsURI' => 'urn:ebay:apis:eBLBaseComponents',
					'array' => false,
					'cardinality' => '0..1'
				)
			));

	}
}
?>