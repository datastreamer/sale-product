<?php
// autogenerated file 30.08.2007 09:37
// $Id$
// $Log$
//
require_once 'EbatNs_ComplexType.php';

class CharityAffiliationType extends EbatNs_ComplexType
{
	// start props
	// end props

/**
 *

 * @return 
 */
	function CharityAffiliationType()
	{
		$this->EbatNs_ComplexType('CharityAffiliationType', 'urn:ebay:apis:eBLBaseComponents');
	$this->_attributes = array_merge($this->_attributes,
		array(
			'id' =>
			array(
				'name' => 'id',
				'type' => 'string',
				'use' => 'required'
			),
			'type' =>
			array(
				'name' => 'type',
				'type' => 'CharityAffiliationTypeCodeType',
				'use' => 'required'
			)
		));

	}
}
?>
