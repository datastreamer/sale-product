<?php
// autogenerated file 23.02.2007 11:57
// $Id$
// $Log$
//
require_once 'EbatNs_ComplexType.php';

class EbatNsCsSetExt_MessageType extends EbatNs_ComplexType
{
	// start props
	// end props

/**
 *

 * @return 
 */
	function EbatNsCsSetExt_MessageType()
	{
		$this->EbatNs_ComplexType('EbatNsCsSetExt_MessageType', 'http://www.intradesys.com/Schemas/ebay/AttributeData_Extension.xsd');
	$this->_attributes = array_merge($this->_attributes,
		array(
			'color' =>
			array(
				'name' => 'color',
				'type' => 'string',
				'use' => 'required'
			),
			'face' =>
			array(
				'name' => 'face',
				'type' => 'string',
				'use' => 'required'
			),
			'size' =>
			array(
				'name' => 'size',
				'type' => 'string',
				'use' => 'required'
			)
		));

	}
}
?>